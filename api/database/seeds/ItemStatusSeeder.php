<?php

use Illuminate\Database\Seeder;

class ItemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Received', 'Lost', 'Spent'];

        foreach($statuses as $status){
            DB::table('itemstatus')->insert([
                'status' => $status
            ]);
        }
    }
}
