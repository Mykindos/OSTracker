<?php

use App\BotUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BotUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(BotUser::class)->truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
        BotUser::create(['username' => $faker->name]);
        }
    }
}
