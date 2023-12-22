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
		//
		Schema::create('role_user', function (Blueprint $table) {
			$table->id();
			$table->foreignUuid('user_id')->constrained();
			$table->foreignId('role_id')->constrained();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		//
		Schema::dropIfExists('role_user');
	}
};
