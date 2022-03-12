<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                'name' => "admin",
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                ],
                [
                    'name' => "test_user_1",
                    'email' => 'user_1@gmail.com',
                    'password' => Hash::make('password'),
                ],
                [
                    'name' => "test_user_2",
                    'email' => 'user_2@gmail.com',
                    'password' => Hash::make('password'),
                ]
            ]
            
    );
    }
}
