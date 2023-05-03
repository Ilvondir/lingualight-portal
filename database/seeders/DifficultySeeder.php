<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Difficulty::insert([
            [
                "level"=>"Easy", "required"=>"Good mood and willingness to learn!", "nice_to_have"=>"Basic vocabulary.
Present simple tense.
Simple questions and answers.",
            ],
            [
                "level"=>"Medium", "required"=>"Intermediate vocabulary.
Complex sentence structures.
Reading comprehension skills.", "nice_to_have"=>"Advanced speaking and listening skills.
Advanced writing skills and composition techniques.
Familiarity with cultural nuances and idiomatic expressions.
Knowledge of industry-specific terminology and jargon.",
            ],
            [
                "level"=>"Hard", "required"=>"Advanced vocabulary.
Complex idiomatic expressions.
Advanced reading comprehension.", "nice_to_have"=>"Mastery of complex verb tenses and structures.
Fluency in speaking and listening.
Advanced writing skills and techniques.
Understanding of cultural nuances and customs.",
            ],
        ]);
    }
}
