<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Playlist;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Playlist::create( [
            'name'=>'Galau',
            'slug'=>'galau-110202317',
            'thumbnail'=>'/playlist/galau-210202316.jpg',
        ] );

        Playlist::create( [
            'name'=>'Wota',
            'slug'=>'wota-110202317',
            'thumbnail'=>'/playlist/wibu.jpg',
        ] );
    }
}
