<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('albums')->insert([
           'name'         =>'Stories',
           'author_id'    => 1,
           'producer'     => 'Tim Bergling',
           'genres'       => 'EDM',
           'type'         =>'studio',
           'amount_songs' =>'14',
           'released'     => '2015',
           'created_at'   =>  Carbon::now(),
           'updated_at'   =>  Carbon::now()

       ]);

       DB::table('albums')->insert([
           'name'         =>'Home',
           'author_id'    => 1,
           'producer'     => 'Rudimental',
           'genres'       => 'Drum and bass',
           'type'         =>'studio',
           'amount_songs' =>'8',
           'released'     => '2013',
           'created_at'   =>  Carbon::now(),
           'updated_at'   =>  Carbon::now()



       ]);

       DB::table('albums')->insert([
           'name'         =>'Endless Forms Most Beautiful',
           'author_id'    => 1,
           'producer'     => 'Tuomas Holopainen',
           'genres'       => 'Symphonic power metal',
           'type'         =>'studio',
           'amount_songs' =>'11',
           'released'     => '2015',
           'created_at'   =>  Carbon::now(),
           'updated_at'   =>  Carbon::now()

       ]);

    }
}
