<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat User Fadly
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@karaven.com',
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@karaven.com',
            'password' => Hash::make('user123'),
            'remember_token' => Str::random(10),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@karaven.com',
            'password' => Hash::make('root123'),
            'remember_token' => Str::random(10),
            'role' => 'root',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->call([
            ArtistSeeder::class,
            GenreSeeder::class,
            PlaylistSeeder::class,
            MusicSeeder::class,
            MusicPlaylistSeeder::class,
        ]);
    }
}
