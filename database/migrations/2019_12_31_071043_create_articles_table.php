<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('author_id')->index();
            $table->longText('title');
            $table->longText('content');
            $table->bigInteger('visit');
            $table->bigInteger('share');
            $table->bigInteger('good');
            $table->bigInteger('bad');
            $table->bigInteger('comment');
            $table->timestamps();
        });

        Schema::table('articles', function($table) {
            //$table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
