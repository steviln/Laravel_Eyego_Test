<?php

namespace App\Http\Controllers;

require '../vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Aws\S3\Credentials;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Http\Form;
use Illuminate\Support\Facades\Input;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
   public function login(Request $request){
       $feilbeskjed = "".session()->getId();
       return view('login', [ 'feilbeskjed' => $feilbeskjed]);
   }
   
   public function innlegg(Request $request){
       $logStatus = $this->checkedLoged();
       $feilbeskjed = "";
       if($logStatus == 0){
           $this->maaLogge();
       }
       else{  
           $id = 0;
           $verdier = array('id' => 0, 'overskrift' => '', 'tekst' => '', 'bilde' => '');
           if($request->route('id')){
                $id = $request->route('id');
                $redigerInnlegg = DB::select('SELECT * FROM blog WHERE id = :id',['id' => $id]);
                if($redigerInnlegg){
                   $verdier['id'] = $id; 
                   $verdier['overskrift'] = $redigerInnlegg[0]->overskrift;
                   $verdier['tekst'] = $redigerInnlegg[0]->tekst;
                   //$verdier['bilde'] = $redigerInnlegg[0]->bilde;
                }                
           }
          
           return view('innlegg', [ 'verdier' => $verdier]);
       }
   }
   
   public function innleggText(Request $request){
       $logStatus = $this->checkedLoged();
       $feilbeskjed = "";
       $id = Input::get('id');
       $image = Input::file('bilde');
       $bilde = "";
       if($image){
            $bilde  = $image->getClientOriginalName();
            $image->move('../public/images/',$image->getClientOriginalName());
       }
       if($logStatus == 0){
           $this->maaLogge();
       }
       else if($id == 0){     
           DB::insert('INSERT INTO blog (overskrift, tekst, bilde, forfatter) values (?, ?, ?, ?)', [Input::get('overskrift'),Input::get('innlegg'),$bilde,$logStatus]);
           return $this->adminMeny($request);
       }
       else if($id > 0){     
           DB::insert('UPDATE blog SET overskrift = ?, tekst = ?, bilde = ? WHERE id = ?', [Input::get('overskrift'),Input::get('innlegg'),$bilde,$id]);
           $this->uploadImageToAmazon($bilde);
           return $this->adminMeny($request);
       }      
   } 
   
   public function uploadImageToAmazon($image){
       echo $image;
        $client = S3Client::factory(
            array(
                'version' => '2006-03-01',
                'region' => 'eu-west-1',
                'credentials' => array(
                        'key'    => "AKIAIIZM4SICRIWBDYBQ",
                        'secret' => "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"
                )
            )
        );

        try {
            $client->putObject(array(
                'Bucket'=>'eyegotest',
                'Key' =>  $image,
                'SourceFile' => '../public/images/'.$image,
                'StorageClass' => 'REDUCED_REDUNDANCY'
            ));

        } catch (S3Exception $e) {
                    // Catch an S3 specific exception.
                    echo $e->getMessage();
        }      
       
   }
   
   public function adminMeny(Request $request){
       $logStatus = $this->checkedLoged();
       $feilbeskjed = "";
       if($logStatus == 0){
           return $this->maaLogge();
       }
       else{    
           $innlegg = DB::select('SELECT id, overskrift FROM blog WHERE forfatter = :id', ['id' => $logStatus]);
           return view('admin', [ 'innlegg' => $innlegg]);
       }
   }
   
   public function maaLogge(){
           $sessionID = session()->getId();
           $feilbeskjed = "Du må logge inn for å utføre denne handlingen.";
           return view('login', [ 'feilbeskjed' => $feilbeskjed]);      
       
   }
   
   public function checkedLoged(){
       $sessionID = session()->getId();
       $sql = "SELECT forfatter FROM sesjon WHERE sesjonID = '".$sessionID."'";
       $logg = DB::select($sql);
       if($logg)
           return $logg[0]->forfatter;
       else
           return 0;
       
   }
   
   public function loginText(Request $request){
       $sessionID = session()->getId();
       $feilbeskjed = "";
       $tell = DB::select('SELECT id FROM brukere WHERE navn = :brukernavn and password = :passord',array('brukernavn' => Input::get('brukernavn'), 'passord' => Input::get('passord')));
       if($tell){
           DB::insert('INSERT INTO sesjon (sesjonID, forfatter) values (?, ?)', [$sessionID,$tell[0]->id]);
           return redirect('/admin');
       }
       else{
           $feilbeskjed = "Galt brukernavn og/eller passord.";
           return view('login', [ 'feilbeskjed' => $feilbeskjed]);
       }
   }   
}
