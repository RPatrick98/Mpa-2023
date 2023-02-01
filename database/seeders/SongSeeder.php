<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert(['name' => 'Highway to Hell', 'artist' => 'AC/DC', 'lenght' => '3:28', 'genre_id' => '1']);
        DB::table('songs')->insert(['name' => 'Sweet Child o Mine', 'artist' => 'Guns N Roses', 'lenght' => '5:02', 'genre_id' => '1']);
        DB::table('songs')->insert(['name' => 'Born to Be Wild', 'artist' => 'Steppenwolf', 'lenght' => '3:35', 'genre_id' => '1']);
        DB::table('songs')->insert(['name' => 'Baba O Riley', 'artist' => 'The Who', 'lenght' => '5:06', 'genre_id' => '1']);
        DB::table('songs')->insert(['name' => 'Welcome To The Jungle', 'artist' => 'Guns N Roses', 'lenght' => '4:39', 'genre_id' => '1']);

        DB::table('songs')->insert(['name' => 'The Dance', 'artist' => 'Garth Brooks', 'lenght' => '3:15', 'genre_id' => '2']);
        DB::table('songs')->insert(['name' => 'Breathe', 'artist' => 'Faith Hill', 'lenght' => '3:15', 'genre_id' => '2']);
        DB::table('songs')->insert(['name' => 'Highwayman', 'artist' => 'The Highwaymen', 'lenght' => '3:15', 'genre_id' => '2']);
        DB::table('songs')->insert(['name' => 'I Hope You Dance', 'artist' => 'Lee Ann Womack', 'lenght' => '3:15', 'genre_id' => '2']);
        DB::table('songs')->insert(['name' => 'Jolene', 'artist' => 'Dolly Parton', 'lenght' => '3:15', 'genre_id' => '2']);


        DB::table('songs')->insert(['name' => 'As the rush comes', 'artist' => 'Motorcycle', 'lenght' => '3:30', 'genre_id' => '3']);
        DB::table('songs')->insert(['name' => 'Luvstruck [Klubbheads 2005 remix]', 'artist' => 'Southside Spinners', 'lenght' => '3:28', 'genre_id' => '3']);
        DB::table('songs')->insert(['name' => 'Loneliness', 'artist' => 'Tomcraft', 'lenght' => '3:46', 'genre_id' => '3']);
        DB::table('songs')->insert(['name' => 'Carte blanche', 'artist' => 'Veracocha', 'lenght' => '3:25', 'genre_id' => '3']);
        DB::table('songs')->insert(['name' => 'Beautiful things', 'artist' => 'Andain', 'lenght' => '3:45', 'genre_id' => '3']);


        DB::table('songs')->insert(['name' => 'Wake Me Up!', 'artist' => 'Avicii', 'lenght' => '3:30', 'genre_id' => '4']);
        DB::table('songs')->insert(['name' => 'Where Is The Love?', 'artist' => 'The Black Eyed Peas', 'lenght' => '3:28', 'genre_id' => '4']);
        DB::table('songs')->insert(['name' => 'Just A Dream', 'artist' => 'Nelly', 'lenght' => '3:46', 'genre_id' => '4']);
        DB::table('songs')->insert(['name' => 'In The End', 'artist' => 'Linkin Park', 'lenght' => '3:25', 'genre_id' => '4']);
        DB::table('songs')->insert(['name' => 'All Star', 'artist' => 'Smash Mouth', 'lenght' => '3:45', 'genre_id' => '4']);



        DB::table('songs')->insert(['name' => 'It Was a Good Day', 'artist' => 'Ice Cube', 'lenght' => '3:30', 'genre_id' => '5']);
        DB::table('songs')->insert(['name' => 'How I Could Just Kill a Man', 'artist' => 'Cypress Hill', 'lenght' => '3:28', 'genre_id' => '5']);
        DB::table('songs')->insert(['name' => 'Lose Yourself', 'artist' => 'Eminem', 'lenght' => '3:46', 'genre_id' => '5']);
        DB::table('songs')->insert(['name' => 'Slow Down', 'artist' => 'Brand Nubian', 'lenght' => '3:25', 'genre_id' => '5']);
        DB::table('songs')->insert(['name' => 'Top Billin', 'artist' => 'Audio Two', 'lenght' => '3:45', 'genre_id' => '5']);

        DB::table('songs')->insert(['name' => 'Young Til I Die', 'artist' => '7 Seconds', 'lenght' => '3:30', 'genre_id' => '6']);
        DB::table('songs')->insert(['name' => 'Amoeba', 'artist' => 'Adolescents', 'lenght' => '3:28', 'genre_id' => '6']);
        DB::table('songs')->insert(['name' => 'Where Eagles Dare', 'artist' => 'Misfits', 'lenght' => '3:46', 'genre_id' => '6']);
        DB::table('songs')->insert(['name' => 'I d Rather Be Sleeping', 'artist' => 'DRI', 'lenght' => '3:25', 'genre_id' => '6']);
        DB::table('songs')->insert(['name' => 'I Want More', 'artist' => 'Suicidal Tendencies', 'lenght' => '3:45', 'genre_id' => '6']);
        
    }
}
