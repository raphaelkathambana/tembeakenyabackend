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
        Schema::create('user_achievements', function (Blueprint $table) {
            $table->foreignId('id')->constrained(
                table: 'users', indexName:'id2', column:'id'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('10km');
            $table->boolean('20km');
            $table->boolean('40km');
            $table->boolean('60km');
            $table->boolean('80km');
            $table->boolean('100km');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_achievements');
    }
};
