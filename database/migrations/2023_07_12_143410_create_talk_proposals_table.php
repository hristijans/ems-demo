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
        Schema::create('talk_proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('speaker_id');
            $table->string('title', 255)->nullable(false);
            $table->longText('abstract')->nullable(false);
            $table->dateTime('preferred_time_slot')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talk_proposals');
    }
};
