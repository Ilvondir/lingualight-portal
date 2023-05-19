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
        Schema::create('confirmations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("trainer_id");
            $table->string("subject");
            $table->text("message");
            $table->string("date");
            $table->string("file");
            $table->integer("considered");
            $table->foreign("trainer_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("confirmations", function ($table) {
            $table->dropForeign('confirmations_trainer_id_foreign');
        });

        Schema::dropIfExists('confirmations');
    }
};
