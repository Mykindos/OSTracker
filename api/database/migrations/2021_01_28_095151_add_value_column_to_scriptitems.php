<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValueColumnToScriptitems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scriptitems', function (Blueprint $table) {
            $table->bigInteger("price")->after('itemStatusID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scriptitems', function (Blueprint $table) {
            $table->dropColumn("price");
        });
    }
}
