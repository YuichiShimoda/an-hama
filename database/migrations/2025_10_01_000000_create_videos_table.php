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
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->timestamp('expired_at')->nullable();
            $table->string('filename', 255);
            $table->string('video', 255);
            $table->string('btn_title', 11)->nullable();
            $table->boolean('is_visible')->default(false);
            $table->text('script')->nullable();
            $table->text('memo')->nullable();
            $table->unsignedBigInteger('next_video_id1')->nullable();
            $table->unsignedBigInteger('next_video_id2')->nullable();
            $table->unsignedBigInteger('next_video_id3')->nullable();
            $table->foreign('next_video_id1')->references('id')->on('videos')->onDelete('cascade');
            $table->foreign('next_video_id2')->references('id')->on('videos')->onDelete('cascade');
            $table->foreign('next_video_id3')->references('id')->on('videos')->onDelete('cascade');
            $table->boolean('first_video')->default(false)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
