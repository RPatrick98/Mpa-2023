<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Genre;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(['name' => 'Rock', 'image_url' => 'yet empty']);
        DB::table('genres')->insert(['name' => 'Country', 'image_url' => 'yet empty']);
        DB::table('genres')->insert(['name' => 'Trance', 'image_url' => 'yet empty']);
        DB::table('genres')->insert(['name' => 'Pop', 'image_url' => 'yet empty']);
        DB::table('genres')->insert(['name' => 'Hip-hop', 'image_url' => 'yet empty']);
        DB::table('genres')->insert(['name' => 'Hardcore', 'image_url' => 'yet empty']);
    }
}
