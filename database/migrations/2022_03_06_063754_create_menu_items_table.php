<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();

            $table->string('label');
            $table->string('link');
            $table->integer('menu_id');
            $table->integer('parent_id')->nullable();
            $table->string('class')->nullable();
            $table->integer('depth');
            $table->integer('target')->default(0);
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
        Schema::dropIfExists('menu_items');
    }
}
