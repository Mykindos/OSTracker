<?php

use App\ItemStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $statuses = ['Received', 'Lost', 'Spent'];

        Schema::create('itemstatus', function (Blueprint $table) {
            $table->id();
            $table->string('status');
        });

        foreach($statuses as $status){
            $itemStatus = new ItemStatus();
            $itemStatus->status = $status;

            $itemStatus->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemstatus');
    }
}
