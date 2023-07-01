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
                "name"=>"English Excellence: Take Your Language Skills to the Next Level!", "language"=>"English", "headquarter"=>"Cracow", "description"=>"English Excellence is a comprehensive language course designed to help you take your language skills to the next level. Whether you're a beginner or an advanced learner, this course will provide you with the tools and resources you need to improve your English fluency and confidence. With engaging lessons and practical exercises, you'll learn essential grammar rules, expand your vocabulary, and develop your speaking, listening, reading, and writing skills. Our experienced instructors will guide you every step of the way and provide you with personalized feedback to help you progress. By the end of the course, you'll have the ability to communicate effectively in English and achieve your language learning goals.", "price"=>1300.00, "scheduled_start"=>"2023-07-15", "hours"=>80, "img"=>null, "created"=>date("Y-m-d", strtotime("-1 days")), "author_id"=>2, "form_id"=>2,  "difficulty_id"=>3, "visible"=>1,
            ],
            [
                "name"=>"German Mastery: Unlock Your Language Potential!", "language"=>"German","headquarter"=>"Cracow", "description"=>"German Mastery is an immersive language course designed to unlock your language potential and help you achieve fluency in German. Whether you're a complete beginner or an advanced learner, this course will provide you with the tools and resources you need to develop your reading, writing, listening, and speaking skills. Our expert instructors will guide you through a variety of engaging lessons and exercises, covering everything from essential grammar and vocabulary to complex sentence structures and idiomatic expressions. You'll also have access to personalized feedback and one-on-one coaching to help you make steady progress towards your language learning goals. By the end of the course, you'll be able to communicate confidently and effectively in German, opening up new opportunities for travel, work, and personal enrichment.", "price"=>3550.00, "scheduled_start"=>"2023-09-01", "hours"=>130, "img"=>null, "created"=>date("Y-m-d", strtotime("-9 days")), "author_id"=>2, "form_id"=>1, "difficulty_id"=>2, "visible"=>1,
            ],
            [
                "name"=>"Speak Spanish with Confidence!", "language"=>"Spanish", "headquarter"=>"Warsaw", "description"=>"The \"Speak Spanish with Confidence!\" course is an intensive Spanish language learning program that will allow you to quickly master basic language skills and increase your confidence in speaking Spanish. By using interactive teaching methods, this course will engage you in real-world scenarios, providing a practical foundation for effective communication in Spanish.", "price"=>800.00, "scheduled_start"=>"2023-06-01", "hours"=>50, "img"=>null, "created"=>date("Y-m-d", strtotime("-6 days")), "author_id"=>3, "form_id"=>2, "difficulty_id"=>2, "visible"=>1,
            ],
            [
                "name"=>"English Made Easy: Start Speaking Today!", "language"=>"English", "headquarter"=>"Lublin", "description"=>"\"English Made Easy: Start Speaking Today!\" is a beginner-level English language course designed to help you quickly develop the fundamental language skills needed for effective communication in English. Through a combination of interactive lessons, engaging activities, and real-life examples, this course will provide you with the practical foundation you need to start speaking English with confidence.

With a focus on speaking and listening, you'll learn essential vocabulary and grammar structures, practice common expressions and idioms, and develop your pronunciation and intonation. Our experienced instructors will guide you through each step of the learning process, providing feedback and support as you progress.

Whether you're looking to improve your English for work, travel, or personal enrichment, \"English Made Easy: Start Speaking Today!\" is the perfect course to get you started on your language learning journey. So don't wait – enroll today and start speaking English like a pro!", "price"=>650.00, "scheduled_start"=>"2023-10-01", "hours"=>45, "img"=>null, "created"=>date("Y-m-d"), "author_id"=>4, "form_id"=>1, "difficulty_id"=>1, "visible"=>1,
            ],
            [
                "name"=>"Discover the beauty of Hungarian language!", "language"=>"Hungarian", "headquarter"=>"Rzeszow", "description"=>"Our Hungarian language course is designed to help you explore and appreciate the richness and beauty of the Hungarian language. Whether you are interested in learning Hungarian for personal or professional reasons, our experienced instructors will guide you through the fundamentals of grammar, vocabulary, and pronunciation. Through interactive lessons and engaging activities, you will develop your skills in listening, speaking, reading, and writing. You will also gain a deeper understanding of Hungarian culture and traditions, and be able to communicate with native speakers with confidence and ease. Our course is suitable for beginners as well as those who have some prior knowledge of Hungarian. Join us on this exciting journey of language learning and discover the beauty of Hungarian!", "price"=>400.00, "scheduled_start"=>"2023-10-12", "hours"=>35, "img"=>"5.png", "created"=>date("Y-m-d", strtotime("-2 days")), "author_id"=>4, "form_id"=>1,  "difficulty_id"=>1, "visible"=>1,
            ],
            [
                "name"=>"Master the complexity of the Czech language!", "language"=>"Czech", "headquarter"=>"Rzeszow", "description"=>"Our advanced Czech language course is designed for those who are looking to take their language skills to the next level. Whether you have already completed a beginner or intermediate course, or have a solid foundation in the Czech language, our experienced instructors will challenge and support you to achieve mastery of this complex and fascinating language. Through advanced grammar lessons, complex vocabulary, and in-depth cultural discussions, you will gain a deep understanding of the Czech language and culture. You will also develop your skills in reading, writing, listening, and speaking in a variety of contexts, including formal and informal communication. Our course is ideal for those looking to pursue higher education or professional opportunities in the Czech Republic or in fields related to Czech language and culture. Join us on this challenging and rewarding journey of language learning and master the complexity of the Czech language!", "price"=>3500.00, "scheduled_start"=>"2023-09-01", "hours"=>150, "img"=>null, "created"=>date("Y-m-d", strtotime("-8 days")), "author_id"=>4, "form_id"=>2,  "difficulty_id"=>5, "visible"=>1,
            ],
            [
                "name" => "Spanish Intensive: Dive Into the World of Spanish Language and Culture!",
                "language" => "Spanish",
                "headquarter" => "Cracow",
                "description" => "Spanish Intensive is an immersive language course designed to help you dive into the world of Spanish language and culture. Whether you're a beginner or an advanced learner, this course will provide you with the tools and resources you need to develop your language skills. Through interactive lessons and activities, you'll learn grammar, vocabulary, and pronunciation, as well as practice speaking, listening, reading, and writing in Spanish. Our experienced instructors will guide you throughout the course and provide feedback to enhance your progress. By the end of the course, you'll have the ability to communicate effectively in Spanish and gain insights into the rich Hispanic culture.",
                "price" => 950.00,
                "scheduled_start" => "2023-08-10",
                "hours" => 60,
                "img" => null,
                "created" => date("Y-m-d", strtotime("-5 days")),
                "author_id" => 4,
                "form_id" => 2,
                "difficulty_id" => 2,
                "visible" => 1,
            ],
            [
                "name" => "French Conversation: Enhance Your Speaking Skills with Native French Speakers!",
                "language" => "French",
                "headquarter" => "Warsaw",
                "description" => "French Conversation is a specialized course designed to enhance your speaking skills in French through immersive practice with native French speakers. This course is ideal for intermediate and advanced learners who want to improve their fluency, pronunciation, and conversational abilities. Through interactive group discussions, role-plays, and real-life scenarios, you'll gain confidence and expand your vocabulary and idiomatic expressions. Our experienced instructors, who are native French speakers, will provide guidance and personalized feedback to help you refine your speaking skills. By the end of the course, you'll be able to engage in fluent and natural conversations in French.",
                "price" => 1450.00,
                "scheduled_start" => "2023-09-20",
                "hours" => 40,
                "img" => null,
                "created" => date("Y-m-d", strtotime("-5 days")),
                "author_id" => 3,
                "form_id" => 1,
                "difficulty_id" => 3,
                "visible" => 1,
            ],
            [
                "name" => "Italian for Travelers: Learn Essential Italian Phrases and Culture!",
                "language" => "Italian",
                "headquarter" => "Lublin",
                "description" => "Italian for Travelers is a practical course designed to teach you essential Italian phrases and introduce you to Italian culture. Whether you're planning a trip to Italy or simply want to learn the basics of the language, this course will provide you with the necessary vocabulary and expressions to navigate daily situations with confidence. Through interactive lessons, role-plays, and cultural activities, you'll learn greetings, ordering food, asking for directions, shopping, and more. Our friendly instructors will guide you and create a fun learning environment. By the end of the course, you'll be equipped with the language skills to communicate effectively during your Italian adventures.",
                "price" => 900.00,
                "scheduled_start" => "2023-08-30",
                "hours" => 30,
                "img" => null,
                "created" => date("Y-m-d", strtotime("-7 days")),
                "author_id" => 2,
                "form_id" => 1,
                "difficulty_id" => 1,
                "visible" => 1,
            ],
            [
                "name" => "Mandarin Chinese Mastery: Unlock the Language of a Billion People!",
                "language" => "Chinese",
                "headquarter" => "Cracow",
                "description" => "Mandarin Chinese Mastery is an intensive course designed to help you unlock the language of a billion people. Whether you're a complete beginner or have some prior knowledge, this course will provide you with a solid foundation in Mandarin Chinese. Through interactive lessons, cultural immersion, and practical exercises, you'll learn pronunciation, tones, essential vocabulary, grammar, and sentence structures. Our experienced instructors, who are native Mandarin speakers, will guide you in your language learning journey and provide personalized feedback. By the end of the course, you'll be able to understand and communicate in Mandarin Chinese, opening doors to new opportunities in business, travel, and cultural exchange.",
                "price" => 2500.00,
                "scheduled_start" => "2023-09-10",
                "hours" => 90,
                "img" => null,
                "created" => date("Y-m-d"),
                "author_id" => 3,
                "form_id" => 2,
                "difficulty_id" => 4,
                "visible" => 1,
            ],
            [
                "name" => "Japanese Calligraphy: Explore the Art and Beauty of Shodo",
                "language" => "Japanese",
                "headquarter" => "Tokyo",
                "description" => "Japanese Calligraphy is a unique course that allows you to explore the art and beauty of Shodo, the traditional Japanese form of calligraphy. In this course, you'll learn the fundamental techniques of brush strokes and the proper way of holding a calligraphy brush. Through guided practice and the study of famous Japanese characters, you'll gain an understanding of the aesthetics and cultural significance of Japanese calligraphy. Our experienced instructors, who are skilled calligraphers, will provide demonstrations and individual guidance to help you refine your skills. By the end of the course, you'll have created your own stunning pieces of calligraphy and developed a deeper appreciation for Japanese culture.",
                "price" => 1200.00,
                "scheduled_start" => "2023-10-05",
                "hours" => 50,
                "img" => null,
                "created" => date("Y-m-d", strtotime("-4 days")),
                "author_id" => 2,
                "form_id" => 1,
                "difficulty_id" => 2,
                "visible" => 1,
            ],
        ]);
    }
}
