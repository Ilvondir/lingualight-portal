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
                "level"=>"A1", "required"=>"Good mood and willingness to learn!", "nice_to_have"=>"Basic understanding of simple expressions and basic words in the target language.
Ability to introduce oneself and ask simple questions.
Familiarity with basic polite phrases.",
            ],
            [
                "level"=>"A2", "required"=>"Basic understanding of simple expressions and basic words in the target language.
Ability to introduce oneself and ask simple questions.
Familiarity with basic polite phrases.", "nice_to_have"=>"Ability to use simple expressions and phrases in everyday situations.
Understanding of simple written texts and conversations on familiar topics.
Basic skills in writing short messages and simple descriptions.",
            ],
            [
                "level"=>"B1", "required"=>"Ability to use simple expressions and phrases in everyday situations.
Understanding of simple written texts and conversations on familiar topics.
Basic skills in writing short messages and simple descriptions.", "nice_to_have"=>"Understanding of main points in clear spoken or written texts on familiar topics.
Ability to participate in conversations on various subjects related to personal interests and experiences.
Capability to write coherent texts on familiar topics.",
            ],
            [
                "level"=>"B2", "required"=>"Understanding of main points in clear spoken or written texts on familiar topics.
Ability to participate in conversations on various subjects related to personal interests and experiences.
Capability to write coherent texts on familiar topics.", "nice_to_have"=>"Understanding of complex texts and abstract discussions on various topics.
Proficiency in expressing opinions, arguments, and thoughts fluently.
Ability to write clear and detailed texts on diverse subjects.",
            ],
            [
                "level"=>"C1", "required"=>"Understanding of complex texts and abstract discussions on various topics.
Proficiency in expressing opinions, arguments, and thoughts fluently.
Ability to write clear and detailed texts on diverse subjects.", "nice_to_have"=>"Advanced understanding of complex texts, including academic and professional materials.
Fluency in expressing ideas, opinions, and arguments in a precise and nuanced manner.
Capability to produce clear and well-structured texts on complex topics.",
            ],
            [
                "level"=>"C2", "required"=>"Advanced understanding of complex texts, including academic and professional materials.
Fluency in expressing ideas, opinions, and arguments in a precise and nuanced manner.
Capability to produce clear and well-structured texts on complex topics.", "nice_to_have"=>"Mastery of the language, approaching native-like fluency.
Proficiency in understanding and producing complex texts, including abstract and specialized materials.
Ability to communicate effectively in any situation and produce polished and sophisticated written texts.",
            ],
        ]);
    }
}
