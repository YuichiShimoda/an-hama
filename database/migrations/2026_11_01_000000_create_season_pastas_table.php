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
        Schema::create('season_pastas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_visible')->default(true);
            $table->string('period', 255);
            $table->timestamp('reservation_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->string('dish');
            $table->string('filename', 255);
            $table->string('ingredient1', 255);
            $table->string('ingredient2', 255);
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('season_pastas');
    }
};
