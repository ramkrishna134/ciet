<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('icon');
            $table->string('featured_image');
            $table->string('category');
            $table->longText('descrtiption');
            $table->mediumText('content');
            $table->date('star_date');
            $table->date('end_date');
            $table->integer('user_id');
            $table->integer('department_id');
            $table->string('lang');
            $table->json('key_word');
            $table->integer('status');


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
        Schema::dropIfExists('events');
    }
}
