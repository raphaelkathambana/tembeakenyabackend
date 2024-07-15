<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hikes', function (Blueprint $table) {
            $table->unsignedBigInteger('map_data_id')->nullable();

            $table->foreign('map_data_id')->references('id')->on('map_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('hikes', function (Blueprint $table) {
            $table->dropForeign(['map_data_id']);
            $table->dropColumn('map_data_id');
        });
    }
};
