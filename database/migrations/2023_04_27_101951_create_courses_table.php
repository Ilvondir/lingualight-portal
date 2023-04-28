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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("language");
            $table->string("headquarter");
            $table->text("description");
            $table->decimal("price", 8, 2);
            $table->date("scheduled_start");
            $table->integer("hours");
            $table->string("img")->nullable();
            $table->date("created");
            $table->unsignedBigInteger("author_id");
            $table->foreign("author_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("courses", function (Blueprint $table) {
            $table->dropForeign("courses_author_id_foreign");
        });
        Schema::dropIfExists('courses');
    }
};
