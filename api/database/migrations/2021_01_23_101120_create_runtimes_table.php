<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuntimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("scriptID");
            $table->foreignId("botUserID");
            $table->bigInteger("duration");
            $table->string("version");
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
        Schema::dropIfExists('runtimes');
    }
}
