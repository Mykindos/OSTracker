<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScriptitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scriptitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId("scriptID");
            $table->foreignId("botUserID");
            $table->foreignId("itemID");
            $table->integer("amount");
            $table->foreignId("itemStatusID");
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
        Schema::dropIfExists('scriptitems');
    }
}
