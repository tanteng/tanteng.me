<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelDestinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_destination', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('seo_title');
            $table->string('slug');
            $table->string('destination')->unique();
            $table->string('description');
            $table->string('cover_image');
            $table->string('year');
            $table->date('latest');
            $table->integer('total');
            $table->integer('like')->default(0);
            $table->smallInteger('score')->default(10);
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
        Schema::drop('travel_destination');
    }
}
