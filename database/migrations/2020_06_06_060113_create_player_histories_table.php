<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('matches')->default(0);
            $table->integer('run')->default(0);
            $table->integer('highest_score')->default(0);
            $table->integer('fifties')->default(0);
            $table->integer('hundreds')->default(0);

            // creating foreign key "player Id"
            $table->unsignedBigInteger('player_id')->unique();
            $table->foreign('player_id')->references('id')->on('players');

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
        Schema::dropIfExists('player_histories');
    }
}
