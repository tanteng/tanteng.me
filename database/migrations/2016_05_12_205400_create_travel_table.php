<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destination_id');
            $table->string('slug');
            $table->string('title');
            $table->string('seo_title');
            $table->string('description');
            $table->string('cover_image');
            $table->string('begin_date');
            $table->string('end_date');
            $table->text('content');
            $table->smallInteger('score')->default(10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('travel');
    }
}
