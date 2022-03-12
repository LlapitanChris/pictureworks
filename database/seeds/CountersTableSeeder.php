<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CountersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counters')->insert([
            [
                'click_counts' => 30,
                'date_clicked' =>  Carbon::yesterday(),
                'user_id' => 1,
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ],

            [
                'click_counts' => 10,
                'date_clicked' =>  Carbon::now(),
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
                        [
                'click_counts' => 30,
                'date_clicked' =>  Carbon::yesterday(),
                'user_id' => 2,
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ],
         
            [
                'click_counts' => 50,
                'date_clicked' =>  Carbon::now(),
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'click_counts' => 5,
                'date_clicked' =>  Carbon::yesterday(),
                'user_id' => 3,
                'created_at' => Carbon::yesterday(),
                'updated_at' => Carbon::yesterday()
            ]
        ]);
    }
}
