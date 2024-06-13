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
        Schema::create('users_locations', function (Blueprint $table) {
            $table->foreignId('id')->constrained(
                table: 'users', indexName:'id3', column:'id'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->integer('locationID');
            $table->foreign('locationID')->references('locationID')->on('locations')->onUpdate('cascade')->onDelete('cascade');
            $table->time('time');
            $table->integer('distance');
            $table->integer('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_locations');
    }
};
