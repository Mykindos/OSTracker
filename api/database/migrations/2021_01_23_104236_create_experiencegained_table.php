<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencegainedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencegained', function (Blueprint $table) {
            $table->id();
            $table->foreignId("scriptID");
            $table->foreignId("botUserID");
            $table->foreignId("skillID");
            $table->bigInteger("exp");
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
        Schema::dropIfExists('experiencegained');
    }
}
