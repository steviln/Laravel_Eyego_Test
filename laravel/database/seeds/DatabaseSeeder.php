<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('brukere')->insert([
            'navn' => "administrator",
            'password' => "abc123pass",
        ]);
        DB::table('brukere')->insert([
            'navn' => "forfatter",
            'password' => "abc123pass",
        ]);   
        
        DB::table('blog')->insert(
                        array(
                                array(
                                        'overskrift' => 'Velkommen til ny blogg',
                                        'tekst' => 'Her kommer det noen korte innlegg bare for test',
                                        'forfatter'  => 2
                                ),
                                array(
                                        'overskrift' => 'Det første virkelig innlegget',
                                        'tekst' => 'Dette er det første av flere spennende innlegg på denne bloggen. Selv om dette innlegget kanskje ikke var så grusomt spennende.',
                                        'forfatter'  => 2
                                ),                            

        ));        

        Model::reguard();
    }
}
