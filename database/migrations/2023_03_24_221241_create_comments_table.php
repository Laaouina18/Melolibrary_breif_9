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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('body');
            $table->unsignedBigInteger('client_id')->nullable(false);
            $table->unsignedBigInteger('song_id')->nullable(false);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign("song_id")->references("id")->on("songs")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
