<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitiativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiatives', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('icon');
            $table->string('description');
            $table->string('web_link');
            $table->string('play_store');
            $table->string('apple_store');
            $table->string('window_store');
            $table->integer('user_id');
            $table->integer('status');
            $table->string('lang');

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
        Schema::dropIfExists('initiatives');
    }
}
