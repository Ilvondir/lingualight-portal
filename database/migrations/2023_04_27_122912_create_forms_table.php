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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
        });

        Schema::table("courses", function($table) {
            $table->unsignedBigInteger("form_id");
            $table->foreign("form_id")->references("id")->on("forms")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("courses", function($table) {
            $table->dropForeign('courses_form_id_foreign');
        });
        Schema::dropIfExists('forms');
    }
};
