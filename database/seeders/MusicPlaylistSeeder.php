<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Music;
use App\Models\Playlist;
use App\Models\Artist;


class MusicPlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galau = Playlist::where('name', 'Galau')->first();
        $wota = Playlist::where('name', 'Wota')->first();
        $gi = $galau->id;
        $wi = $wota->id;

        $jkt_id = Artist::where('name', 'JKT 48')->first();
        $akb_id = Artist::where('name', 'AKB 48')->first();
        $musics_wota = Music::whereIn('artist_id', [$jkt_id->id,$akb_id->id])->get();
        foreach($musics_wota as $music){
            DB::table('music_playlist')->insert([
                'music_id'=>$music->id,
                'playlist_id'=>$wi,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        $musics_galau = Music::whereIn('slug', ['masa-mudaku-habis-6210202315','jiwa-yang-bersedih-6210202315','cupid-3710202317','omg-3510202317','rapsodi-2810202322','jisoo-flower-2510202317','koi-dorobou-2210202317','sukidakara-2110202317'])->get();
        foreach($musics_galau as $music){
            DB::table('music_playlist')->insert([
                'music_id'=>$music->id,
                'playlist_id'=>$gi,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
