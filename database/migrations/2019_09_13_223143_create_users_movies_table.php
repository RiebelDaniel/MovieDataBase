<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_movies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');


            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_movies');
    }
}
