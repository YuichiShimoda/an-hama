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
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->string('movie');
            $table->string('filename', 255);
            $table->unsignedBigInteger('next_movie_id1')->nullable();
            $table->unsignedBigInteger('next_movie_id2')->nullable();
            $table->unsignedBigInteger('next_movie_id3')->nullable();
            $table->foreign('next_movie_id1')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('next_movie_id2')->references('id')->on('movies')->onDelete('cascade');
            $table->foreign('next_movie_id3')->references('id')->on('movies')->onDelete('cascade');
            // $table->string('conversion_type', 255);
            $table->boolean('is_visible')->default(false);
            $table->timestamp('expired_at')->nullable();
            $table->text('script')->nullable();
            $table->text('memo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
