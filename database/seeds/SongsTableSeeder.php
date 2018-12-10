<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'title'         =>'Daylight',
            'author_id'    => 1,
            'album_id'    => 1,
            'created_at'   =>  Carbon::now(),
            'updated_at'   =>  Carbon::now()

        ]);

        DB::table('songs')->insert([
            'title'         =>'Night',
            'author_id'    => 2,
            'album_id'    => 3,
            'created_at'   =>  Carbon::now(),
            'updated_at'   =>  Carbon::now()

        ]);

        DB::table('songs')->insert([
            'title'         =>'LaLALAnd',
            'author_id'    => 3,
            'album_id'    => 1,
            'created_at'   =>  Carbon::now(),
            'updated_at'   =>  Carbon::now()

        ]);

        DB::table('songs')->insert([
            'title'         =>'Best song',
            'author_id'    => 3,
            'album_id'    => 1,
            'created_at'   =>  Carbon::now(),
            'updated_at'   =>  Carbon::now()

        ]);

    }
}
