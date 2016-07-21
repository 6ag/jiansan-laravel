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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@6ag.cn',
            'password' => bcrypt('123456'), // Hash散列
            'is_admin' => 1,
        ]);
    }
}