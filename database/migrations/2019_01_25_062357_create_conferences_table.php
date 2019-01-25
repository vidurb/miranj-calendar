<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('title', 100);
            $table->string('city', 64);
            $table->string('venue', 64);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('url', 256);
            $table->text('blurb');
            $table->string('google_maps_pin', 64)->nullable();
            $table->string('funnel', 256)->nullable();
            $table->string('banner', 256)->nullable();
            $table->string('color_primary', 7)->nullable();
            $table->string('color_primary_dark', 7)->nullable();
            $table->string('color_accent', 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conferences');
    }
}
