<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create( [
            'name'=>'KPOP',
            'slug'=>'kpop-2',
            'thumbnail'=>'/genre/kpop-22023-09-24.jpg',
        ] );
                    
        Genre::create( [
            'name'=>'JPOP',
            'slug'=>'jpop-32023-09-30',
            'thumbnail'=>'/genre/jpop-32023-09-24.jpg',
        ] );
                    
        Genre::create( [
            'name'=>'POP Indo',
            'slug'=>'pop-indo-510202301',
            'thumbnail'=>NULL,
        ] );
    }
}
