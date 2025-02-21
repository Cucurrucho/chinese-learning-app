<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WordSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $words = json_decode(File::get(database_path('\hsk1.json')), true);
        foreach ($words as $hanzi => $info){
            Word::factory()->create([
               'hanzi' => $hanzi,
               'meaning' => $info['translations']['en'],
               'pinyin' => $info['pinyin']
            ]);
        }
    }
}
