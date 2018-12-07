<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name'         =>'Avicii',
            'description'  => 'Tim Bergling (Swedish: [tɪm ²bærjlɪŋ]; 8 September 1989 – 20 April 2018), better known by his stage name Avicii (/əˈviːtʃi/), was a Swedish musician, DJ, remixer and record producer.[2] ',
            'created_at'  =>  Carbon::now(),
            'updated_at'  =>  Carbon::now()
        ]);

        DB::table('authors')->insert([
            'name'         =>'Rudimental',
            'description'  => 'Rudimental are an English drum and bass band, signed to Asylum Records, Atlantic Records and Black Butter Records. The band consists of Piers Agget, Amir Amor, Kesi Dryden and DJ Locksmith.',
            'created_at'  =>  Carbon::now(),
            'updated_at'  =>  Carbon::now()
        ]);

        DB::table('authors')->insert([
            'name'         =>'Nightwish',
            'description'  => 'Nightwish are a symphonic metal band from Kitee, Finland. The band was formed in 1996 by lead songwriter and keyboardist Tuomas Holopainen, guitarist Emppu Vuorinen, and former lead singer Tarja Turunen. The band soon picked up drummer Jukka Nevalainen, and then bassist Sami Vänskä after the release of their debut album, Angels Fall First (1997). In 2001, Vänskä was replaced by Marco Hietala, who also took over the male vocalist role previously filled by Holopainen or guest singers.[1]',
            'created_at'  =>  Carbon::now(),
            'updated_at'  =>  Carbon::now()
        ]);


    }
}
