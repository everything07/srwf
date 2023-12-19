<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use DateTime;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'tag' => '再投稿',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => '編集',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            
        ]);
    }
}
