<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMirrorModeToRuntimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('runtimes', function (Blueprint $table) {
            $table->tinyInteger('mirrorMode')->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('runtimes', function (Blueprint $table) {
            $table->removeColumn('mirrorMode');
        });
    }
}
