<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => '大侠',
                'alias' => 'daxia',
            ],[
                'name' => '纯阳',
                'alias' => 'chunyang',
            ],[
                'name' => '万花',
                'alias' => 'wanhua',
            ],[
                'name' => '藏剑',
                'alias' => 'cangjian',
            ],[
                'name' => '唐门',
                'alias' => 'tangmen',
            ],[
                'name' => '七秀',
                'alias' => 'qixiu',
            ],[
                'name' => '少林',
                'alias' => 'shaolin',
            ],[
                'name' => '五毒',
                'alias' => 'wudu',
            ],[
                'name' => '明教',
                'alias' => 'mingjiao',
            ],[
                'name' => '丐帮',
                'alias' => 'gaibang',
            ],[
                'name' => '苍云',
                'alias' => 'cangyun',
            ],[
                'name' => '长歌',
                'alias' => 'changge',
            ]
        ]);
    }
}
