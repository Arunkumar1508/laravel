<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweety_likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->onDelete('cascade');
            $table->unsignedBigInteger('tweet_id')->onDelete('cascade');
            $table->boolean('liked');
            $table->timestamps();


            // $table->foreign



            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');


            $table->foreign('tweet_id')
                  ->references('id')
                  ->on('tweety_tweets')
                  ->onDelete('cascade');

                  $table->unique(['user_id','tweet_id']);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweety_likes');
    }
}
