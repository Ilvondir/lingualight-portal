<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('difficulties', function (Blueprint $table) {
            $table->id();
            $table->string("level");
            $table->text("required");
            $table->text("nice_to_have");
        });

        Schema::table("courses", function ($table) {
            $table->unsignedBigInteger("difficulty_id");
            $table->foreign("difficulty_id")->references("id")->on("difficulties")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("courses", function ($table) {
            $table->dropForeign('courses_difficulty_id_foreign');
        });
        Schema::dropIfExists('difficulties');
    }
};
