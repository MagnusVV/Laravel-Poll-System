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
        Schema::create('vote_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_id')->constrained('polls');
            $table->string('vote_option_1', 50);
            $table->string('vote_option_2', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_options');
    }
};
