<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Music;
use App\Models\Artist;
use App\Models\Genre;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bp = Artist::where('name', 'Black Pink')->first();
        $nj = Artist::where('name', 'New Jeans')->first();
        $ff = Artist::where('name', 'Fifty Fifty')->first();
        $gi = Artist::where('name', 'Ghea Indrawati')->first();
        $akb = Artist::where('name', 'AKB 48')->first();
        $jkt = Artist::where('name', 'JKT 48')->first();
        $yuika = Artist::where('name', 'Yuika')->first();
        $kobasolo = Artist::where('name', 'Kobasolo')->first();

        $kpop = Genre::where('name', 'KPOP')->first();
        $jpop = Genre::where('name', 'JPOP')->first();
        $pop = Genre::where('name', 'POP Indo')->first();


        Music::create( [
            'title'=>'Sukidakara',
            'slug'=>'sukidakara-2110202317',
            'source_music'=>'https://www.youtube.com/watch?v=WxELeEQPolc&ab_channel=HaluPurii',
            'thumbnail'=>'/music/sukidakara.jpg',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$yuika->id,
            'genre_id'=>$jpop->id,
        ] );
                    
        Music::create( [
            'title'=>'Koi Dorobou',
            'slug'=>'koi-dorobou-2210202317',
            'source_music'=>'https://www.youtube.com/watch?v=ihf4jvbd8RQ&ab_channel=Gaszz4K',
            'thumbnail'=>'/music/koidorobou-222023-09-30.png',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$yuika->id,
            'genre_id'=>$jpop->id,
        ] );

        Music::create( [
            'title'=>'As If It\'s Your Last',
            'slug'=>'as-if-its-your-last-2410202317',
            'source_music'=>'https://www.youtube.com/watch?v=N3ALaDtFmdI&ab_channel=JennieBLACKPINK',
            'thumbnail'=>'/music/as-if-its-your-last-242023-09-30.jpg',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$bp->id,
            'genre_id'=>$kpop->id,
        ] );
                    
        Music::create( [
            'title'=>'Jisoo - 꽃',
            'slug'=> 'jisoo-flower-2510202317',
            'source_music'=>'https://www.youtube.com/watch?v=PQP9ejhfrEs&ab_channel=MiBalmzKaraokeTracks',
            'thumbnail'=>'/music/jisoo-flower-252023-09-30.png',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$bp->id,
            'genre_id'=>$kpop->id,
        ] );
                    
        Music::create( [
            'title'=>'[Mv] Ponytail Dan Shu-Shu',
            'slug'=>'mv-ponytail-dan-shu-shu-2610202314',
            'source_music'=>'https://www.youtube.com/watch?v=2wvqBMjPmqk&ab_channel=JKT48',
            'thumbnail'=>'/music/mv-ponytail-dan-shu-shu-2610202301.png',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$jkt->id,
            'genre_id'=>$pop->id,
        ] );
                    
        Music::create( [
            'title'=>'Aitakatta',
            'slug'=>'aitakatta-2710202301',
            'source_music'=>'https://www.youtube.com/watch?v=0pBOUWBPUu0&ab_channel=Yos',
            'thumbnail'=>'/music/aitakatta-2710202301.jpg',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$jkt->id,
            'genre_id'=>$pop->id,
        ] );


                    
        Music::create( [
            'title'=>'Rapsodi',
            'slug'=>'rapsodi-2810202322',
            'source_music'=>'https://www.youtube.com/watch?v=BNfhIA6T9dA',
            'thumbnail'=>'/music/rapsodi-2810202301.jpg',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$jkt->id,
            'genre_id'=>$pop->id,
        ] );


                    
        Music::create( [
            'title'=>'Fortune Cookie Yang Mencinta',
            'slug'=>'fortune-cookie-yang-mencinta-2910202317',
            'source_music'=>'https://www.youtube.com/watch?v=S2rjKApUmbk',
            'thumbnail'=>'/music/fortune-cookie-yang-mencinta-2910202301.png',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$jkt->id,
            'genre_id'=>$pop->id,
        ] );


                    
        Music::create( [
            'title'=>'Fortune Cookie In Love',
            'slug'=>'fortune-cookie-in-love-3010202317',
            'source_music'=>'https://www.youtube.com/watch?v=qJrIL2csBA0',
            'thumbnail'=>NULL,
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$akb->id,
            'genre_id'=>$jpop->id,
        ] );


                    
        Music::create( [
            'title'=>'Fiction/Sumika \"Love Is Hard For Otaku\"',
            'slug'=>'fictionsumika-love-is-hard-for-otaku-3110202317',
            'source_music'=>'https://www.youtube.com/watch?v=3lszO9JjmNk&ab_channel=FirstVibes',
            'thumbnail'=>'/music/fictionsumika-love-is-hard-for-otaku-3110202301.png',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$kobasolo->id,
            'genre_id'=>$jpop->id,
        ] );


                    
        Music::create( [
            'title'=>'Haiiro To Ao By Harutya X Kobasolo',
            'slug'=>'haiiro-to-ao-by-harutya-x-kobasolo-3210202317',
            'source_music'=>'https://www.youtube.com/watch?v=SKERAtPcEDY&ab_channel=Fukashigi',
            'thumbnail'=>'/music/haiiro-to-ao-masaki-suda-kenshi-yonezu-3210202301.png',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$kobasolo->id,
            'genre_id'=>$jpop->id,
        ] );


                    
        Music::create( [
            'title'=>'Omg',
            'slug'=>'omg-3510202317',
            'source_music'=>'https://www.youtube.com/watch?v=NfYtf-1OFBU&ab_channel=MRIR',
            'thumbnail'=>'/music/omg-3510202301.png',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$nj->id,
            'genre_id'=>$kpop->id,
        ] );


                    
        Music::create( [
            'title'=>'Ditto',
            'slug'=>'ditto-3610202317',
            'source_music'=>'https://www.youtube.com/watch?v=X4vYDxEHgjM&ab_channel=GlobalKaraokeyTV',
            'thumbnail'=> NULL,
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$nj->id,
            'genre_id'=>$kpop->id,
        ] );


                    
        Music::create( [
            'title'=>'Cupid',
            'slug'=>'cupid-3710202317',
            'source_music'=>'https://www.youtube.com/watch?v=tQdXNhvyBQs&ab_channel=CoversPH',
            'thumbnail'=>NULL,
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$ff->id,
            'genre_id'=>$kpop->id,
        ] );


                    
        Music::create( [
            'title'=>'Super Shy',
            'slug'=>'super-shy-4110202317',
            'source_music'=>'https://www.youtube.com/watch?v=TBmDOPg7PCY&ab_channel=EdKara',
            'thumbnail'=>NULL,
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$nj->id,
            'genre_id'=>$kpop->id,
        ] );


                    
        Music::create( [
            'title'=>'Jiwa Yang Bersedih',
            'slug'=>'jiwa-yang-bersedih-6210202315',
            'source_music'=>'https://www.youtube.com/watch?v=NEKHDOLsuGs&ab_channel=HappySingLirik',
            'thumbnail'=>'/music/jiwa-yang-bersedih-6210202315.jpg',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$gi->id,
            'genre_id'=>$pop->id,
        ] );


                    
        Music::create( [
            'title'=>'Masa Mudaku Habis',
            'slug'=>'masa-mudaku-habis-6210202315',
            'source_music'=>'https://www.youtube.com/watch?v=fUAnMTePpyk',
            'thumbnail'=>'/music/masa-mudaku-habis-6210202315.png',
            'log'=>fake()->randomNumber(2,true),
            'artist_id'=>$gi->id,
            'genre_id'=>$pop->id,
        ] );
    }
}
