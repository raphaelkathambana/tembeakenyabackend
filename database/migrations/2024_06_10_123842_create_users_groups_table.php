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
        Schema::create('users_groups', function (Blueprint $table) {
            $table->unsignedBigInteger('groupID');
            $table->foreign('groupID')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id')->constrained(
                table: 'users', indexName:'id4', column:'id'
            )->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_groups');
    }
};
