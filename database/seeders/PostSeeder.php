<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 4; $i++) { 
            DB::table('posts')->insert([
                'name' => Str::random(10),
                'description' => Str::random(50),
                'created_at' => now(),
            ]);
        }
    }
}
