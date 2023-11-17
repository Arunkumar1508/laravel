<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetyChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweety_chat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('current_user_chat_id');
            $table->unsignedBigInteger('receive_user_chat_id');
            $table->string('message');
            $table->foreign('current_user_chat_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receive_user_chat_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('tweety_chat');
    }
}
