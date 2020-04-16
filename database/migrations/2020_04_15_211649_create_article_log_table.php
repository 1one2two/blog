<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('art_id');
            $table->bigInteger('visit');
            $table->bigInteger('share');
            $table->bigInteger('like');
            $table->bigInteger('unlike');
            $table->bigInteger('comment');
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
        Schema::dropIfExists('article_log');
    }
}
