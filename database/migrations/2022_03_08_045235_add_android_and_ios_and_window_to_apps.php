<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAndroidAndIosAndWindowToApps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apps', function (Blueprint $table) {
            //
            $table->string('android')->nullable()->after('url');
            $table->string('ios')->nullable()->after('android');
            $table->string('window')->nullable()->after('ios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apps', function (Blueprint $table) {
            //
            $table->dropColumn('android');
            $table->dropColumn('ios');
            $table->dropColumn('window');
        });
    }
}
