<?php

use App\Skill;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $skills = [
            'ATTACK', 'STRENGTH', 'DEFENCE',
            'HITPOINTS', 'RANGED', 'MAGIC',
            'PRAYER', 'RUNECRAFTING', 'CRAFTING',
            'MINING', 'SMITHING', 'FISHING',
            'COOKING', 'FIREMAKING', 'WOODCUTTING',
            'AGILITY', 'HERBLORE', 'THIEVING',
            'FLETCHING', 'SLAYER', 'FARMING',
            'CONSTRUCTION', 'HUNTER'
        ];

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string("skillName");
        });

        foreach($skills as $s){
            $skill = new Skill();
            $skill->skillName = $s;
            $skill->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
