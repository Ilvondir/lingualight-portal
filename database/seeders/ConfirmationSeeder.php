<?php

namespace Database\Seeders;

use App\Models\Confirmation;
use Illuminate\Database\Seeder;

class ConfirmationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Confirmation::insert([
            ["trainer_id"=>2, "subject"=>"Account confirmation", "message"=>"I hope this message finds you well. I would like to request the activation of my account as I am eager to start using your platform and exploring its features. Your timely assistance in enabling my access would be highly appreciated. Thank you for your attention to this matter.", "file"=>"2-files.zip", "date"=>date("Y-m-d"), "considered"=>1],
            ["trainer_id"=>3, "subject"=>"Hello!", "message"=>"I am reaching out to kindly ask for the activation of my account. I recently registered and am excited to begin using your services. I would be grateful if you could activate my account at your earliest convenience. Thank you very much for your cooperation.", "date"=>date("Y-m-d"), "file"=>"3-conf.zip", "considered"=>1],
            ["trainer_id"=>4, "subject"=>"Files to confirmation", "message"=>"I am writing to kindly request the activation of my account. I have recently signed up and would greatly appreciate your assistance in enabling access to the services provided. Thank you in advance for your prompt attention to this matter.", "date"=>date("Y-m-d"), "file"=>"4-documents.zip", "considered"=>1],
        ]);
    }
}
