<?php

namespace Database\Seeders;

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
                "name"=>"English Excellence: Take Your Language Skills to the Next Level!", "language"=>"English", "headquarter"=>"Cracow", "description"=>"English Excellence is a comprehensive language course designed to help you take your language skills to the next level. Whether you're a beginner or an advanced learner, this course will provide you with the tools and resources you need to improve your English fluency and confidence. With engaging lessons and practical exercises, you'll learn essential grammar rules, expand your vocabulary, and develop your speaking, listening, reading, and writing skills. Our experienced instructors will guide you every step of the way and provide you with personalized feedback to help you progress. By the end of the course, you'll have the ability to communicate effectively in English and achieve your language learning goals.", "price"=>1300.00, "scheduled_start"=>"2023-07-15", "hours"=>80, "img"=>null, "created"=>date("Y-m-d", strtotime("-1 days")), "author_id"=>2, "form_id"=>2,  "difficulty_id"=>3,
            ],
            [
                "name"=>"German Mastery: Unlock Your Language Potential!", "language"=>"German","headquarter"=>"Cracow", "description"=>"German Mastery is an immersive language course designed to unlock your language potential and help you achieve fluency in German. Whether you're a complete beginner or an advanced learner, this course will provide you with the tools and resources you need to develop your reading, writing, listening, and speaking skills. Our expert instructors will guide you through a variety of engaging lessons and exercises, covering everything from essential grammar and vocabulary to complex sentence structures and idiomatic expressions. You'll also have access to personalized feedback and one-on-one coaching to help you make steady progress towards your language learning goals. By the end of the course, you'll be able to communicate confidently and effectively in German, opening up new opportunities for travel, work, and personal enrichment.", "price"=>3550.00, "scheduled_start"=>"2023-09-01", "hours"=>130, "img"=>null, "created"=>date("Y-m-d", strtotime("-9 days")), "author_id"=>2, "form_id"=>1, "difficulty_id"=>2,
            ],
            [
                "name"=>"Speak Spanish with Confidence!", "language"=>"Spanish", "headquarter"=>"Warsaw", "description"=>"The \"Speak Spanish with Confidence!\" course is an intensive Spanish language learning program that will allow you to quickly master basic language skills and increase your confidence in speaking Spanish. By using interactive teaching methods, this course will engage you in real-world scenarios, providing a practical foundation for effective communication in Spanish.", "price"=>800.00, "scheduled_start"=>"2023-06-01", "hours"=>50, "img"=>null, "created"=>date("Y-m-d", strtotime("-6 days")), "author_id"=>3, "form_id"=>2, "difficulty_id"=>2,
            ],
            [
                "name"=>"English Made Easy: Start Speaking Today!", "language"=>"English", "headquarter"=>"Lublin", "description"=>"\"English Made Easy: Start Speaking Today!\" is a beginner-level English language course designed to help you quickly develop the fundamental language skills needed for effective communication in English. Through a combination of interactive lessons, engaging activities, and real-life examples, this course will provide you with the practical foundation you need to start speaking English with confidence.

With a focus on speaking and listening, you'll learn essential vocabulary and grammar structures, practice common expressions and idioms, and develop your pronunciation and intonation. Our experienced instructors will guide you through each step of the learning process, providing feedback and support as you progress.

Whether you're looking to improve your English for work, travel, or personal enrichment, \"English Made Easy: Start Speaking Today!\" is the perfect course to get you started on your language learning journey. So don't wait – enroll today and start speaking English like a pro!", "price"=>650.00, "scheduled_start"=>"2023-10-01", "hours"=>45, "img"=>null, "created"=>date("Y-m-d"), "author_id"=>4, "form_id"=>3, "difficulty_id"=>1,
            ],
            [
                "name"=>"Discover the beauty of Hungarian language!", "language"=>"Hungarian", "headquarter"=>"Rzeszow", "description"=>"Our Hungarian language course is designed to help you explore and appreciate the richness and beauty of the Hungarian language. Whether you are interested in learning Hungarian for personal or professional reasons, our experienced instructors will guide you through the fundamentals of grammar, vocabulary, and pronunciation. Through interactive lessons and engaging activities, you will develop your skills in listening, speaking, reading, and writing. You will also gain a deeper understanding of Hungarian culture and traditions, and be able to communicate with native speakers with confidence and ease. Our course is suitable for beginners as well as those who have some prior knowledge of Hungarian. Join us on this exciting journey of language learning and discover the beauty of Hungarian!", "price"=>400.00, "scheduled_start"=>"2023-10-12", "hours"=>35, "img"=>"5.png", "created"=>date("Y-m-d", strtotime("-2 days")), "author_id"=>4, "form_id"=>1,  "difficulty_id"=>1,
            ],
            [
                "name"=>"Master the complexity of the Czech language!", "language"=>"Czech", "headquarter"=>"Rzeszow", "description"=>"Our advanced Czech language course is designed for those who are looking to take their language skills to the next level. Whether you have already completed a beginner or intermediate course, or have a solid foundation in the Czech language, our experienced instructors will challenge and support you to achieve mastery of this complex and fascinating language. Through advanced grammar lessons, complex vocabulary, and in-depth cultural discussions, you will gain a deep understanding of the Czech language and culture. You will also develop your skills in reading, writing, listening, and speaking in a variety of contexts, including formal and informal communication. Our course is ideal for those looking to pursue higher education or professional opportunities in the Czech Republic or in fields related to Czech language and culture. Join us on this challenging and rewarding journey of language learning and master the complexity of the Czech language!", "price"=>3500.00, "scheduled_start"=>"2023-09-01", "hours"=>150, "img"=>null, "created"=>date("Y-m-d", strtotime("-8 days")), "author_id"=>4, "form_id"=>3,  "difficulty_id"=>5,
            ],
        ]
        );
    }
}
