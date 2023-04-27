<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::insert([
            [
                "name"=>"English Excellence: Take Your Language Skills to the Next Level!", "language"=>"english", "difficulty"=>"Medium", "headquarter"=>"Cracow", "description"=>"English Excellence is a comprehensive language course designed to help you take your language skills to the next level. Whether you're a beginner or an advanced learner, this course will provide you with the tools and resources you need to improve your English fluency and confidence. With engaging lessons and practical exercises, you'll learn essential grammar rules, expand your vocabulary, and develop your speaking, listening, reading, and writing skills. Our experienced instructors will guide you every step of the way and provide you with personalized feedback to help you progress. By the end of the course, you'll have the ability to communicate effectively in English and achieve your language learning goals.", "price"=>1300.00, "scheduled_start"=>"2023-07-15", "hours"=>80, "created"=>date("Y-m-d"), "author_id"=>2, "form_id"=>2,
            ],
            [
                "name"=>"German Mastery: Unlock Your Language Potential!", "language"=>"germany", "difficulty"=>"Medium", "headquarter"=>"Cracow", "description"=>"German Mastery is an immersive language course designed to unlock your language potential and help you achieve fluency in German. Whether you're a complete beginner or an advanced learner, this course will provide you with the tools and resources you need to develop your reading, writing, listening, and speaking skills. Our expert instructors will guide you through a variety of engaging lessons and exercises, covering everything from essential grammar and vocabulary to complex sentence structures and idiomatic expressions. You'll also have access to personalized feedback and one-on-one coaching to help you make steady progress towards your language learning goals. By the end of the course, you'll be able to communicate confidently and effectively in German, opening up new opportunities for travel, work, and personal enrichment.", "price"=>3550.00, "scheduled_start"=>"2023-09-01", "hours"=>130, "created"=>date("Y-m-d"), "author_id"=>2, "form_id"=>1,
            ],
        ]
        );
    }
}
