<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{

    private $skills = [
        'ATTACK', 'STRENGTH', 'DEFENCE',
        'HITPOINTS', 'RANGED', 'MAGIC',
        'PRAYER', 'RUNECRAFTING', 'CRAFTING',
        'MINING', 'SMITHING', 'FISHING',
        'COOKING', 'FIREMAKING', 'WOODCUTTING',
        'AGILITY', 'HERBLORE', 'THIEVING',
        'FLETCHING', 'SLAYER', 'FARMING',
        'CONSTRUCTION', 'HUNTER'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->skills as $skill) {
            DB::table('skills')->insert([
                'skillName' => $skill
            ]);
       }
    }
}
