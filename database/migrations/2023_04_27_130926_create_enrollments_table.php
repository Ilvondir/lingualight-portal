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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("course_id");
            $table->date("enrollment_date");
            $table->decimal("to_pay", 8, 2);
            $table->date("payment_date")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("course_id")->references("id")->on("courses")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("enrollments", function ($table) {
            $table->dropForeign('enrollments_user_id_foreign');
            $table->dropForeign('enrollments_course_id_foreign');
        });
        Schema::dropIfExists('enrollments');
    }
};
