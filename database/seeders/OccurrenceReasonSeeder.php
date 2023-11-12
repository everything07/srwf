<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use DateTime;

class OccurrenceReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('occurrence_reasons')->insert([
        [
            'occurrence_reason' => '折り返し遅れ',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'occurrence_reason' => '多客',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'occurrence_reason' => '接続遅れ',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'occurrence_reason' => '待合せ遅れ',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'occurrence_reason' => '車両点検',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'occurrence_reason' => '非常ブレーキ動作',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'occurrence_reason' => 'その他',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}
