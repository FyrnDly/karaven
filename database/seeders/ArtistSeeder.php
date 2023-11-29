<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::create( [
            'name'=>'Black Pink',
            'slug'=>'black-pink-2',
            'thumbnail'=>'/artist/black-pink-22023-09-24.jpg',
        ] );
                    
        Artist::create( [
            'name'=>'AKB 48',
            'slug'=>'akb-48-510202301',
            'thumbnail'=>'/artist/akb48-52023-09-30.jpg',
        ] );
                    
        Artist::create( [
            'name'=>'Yuika',
            'slug'=>'yuika-62023-09-30',
            'thumbnail'=>'/music/sukidakara.jpg',
        ] );
                    
        Artist::create( [
            'name'=>'JKT 48',
            'slug'=>'jkt-48-710202301',
            'thumbnail'=>'/artist/jkt48-710202301.jpg',
        ] );
                    
        Artist::create( [
            'name'=>'Kobasolo',
            'slug'=>'kobasolo-810202301',
            'thumbnail'=>'/artist/kobasolo.jpg',
        ] );
                    
        Artist::create( [
            'name'=>'New Jeans',
            'slug'=>'new-jeans-1010202301',
            'thumbnail'=>'/artist/new-jeans-1010202301.jpg',
        ] );
                    
        Artist::create( [
            'name'=>'Fifty Fifty',
            'slug'=>'fifty-fifty-1110202301',
            'thumbnail'=>'/artist/fifty-fifty-1110202301.jpg',
        ] );

        Artist::create( [
            'name'=>'Ghea Indrawati',
            'slug'=>'ghea-indrawati-2410202315',
            'thumbnail'=>'/artist/ghea-indrawati-2410202315.jpeg',
        ] );
    }
}
