<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnglishPhraseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_phrase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phrase');
            $table->text('content');
            $table->string('seo_title');
            $table->string('description');
            $table->string('slug')->unique();
            $table->integer('tag');
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
        Schema::drop('english_phrase');
    }
}
