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
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->string('poll_title', 50);
            $table->text('poll_description');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('date_closing');
            $table->integer('no_of_allowed_votes');
            $table->boolean('poll_closed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polls');
    }
};
