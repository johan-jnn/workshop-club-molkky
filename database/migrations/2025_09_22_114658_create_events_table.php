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
    Schema::create('events', function (Blueprint $table) {
      $table->id();
      $table->string(column: 'title');
      $table->text(column: 'description')->nullable();
      $table->string('address');
      $table->dateTime('start_time');
      $table->dateTime('end_time');
      $table->integer('max_participants')->nullable();
      $table->integer('min_elo')->nullable();
      $table->integer('max_elo')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('events');
  }
};