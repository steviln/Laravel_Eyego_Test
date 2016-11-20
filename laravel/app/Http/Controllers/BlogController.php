<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function visInnlegg(Request $request){
   
        $innlegg = DB::select('SELECT blog.id, blog.overskrift, blog.tekst, blog.bilde, brukere.navn FROM blog, brukere WHERE blog.forfatter = brukere.id');
        return view('blog', [ 'innlegg' => $innlegg]);
       
    }
    
     public function visInnlegget(Request $request){
        $id = $request->route('id');
        $innlegg = DB::select('SELECT blog.id, blog.overskrift, blog.tekst, blog.bilde, brukere.navn FROM blog, brukere WHERE blog.forfatter = brukere.id AND blog.id = :id',['id' => $id] );
        return view('blogen', [ 'innlegg' => $innlegg[0]]);
       
    }   
}
