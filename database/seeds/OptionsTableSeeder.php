<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            [
                'name' => 'app_save_wallpaper',
                'content' => '1',
                'comment' => 'app端屏蔽私有api接口',
            ],[
                'name' => 'is_allow_register',
                'content' => '1',
                'comment' => '是否允许注册',
            ]
        ]);
    }
}
