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
		Schema::table('movies', function (Blueprint $table) {
			$table->string('suffix', 20)->nullable()->after('filename');
			$table->boolean('first_movie')->default(false)->index()->after('suffix');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
        Schema::table('movies', function (Blueprint $table) {
        	$table->dropColumn(['suffix', 'first_movie']);
        });
	}
};
