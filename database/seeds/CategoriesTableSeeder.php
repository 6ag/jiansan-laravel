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
            'name' => '大侠',
            'alias' => 'daxia',
        ]);
        DB::table('categories')->insert([
            'name' => '天策',
            'alias' => 'tiance',
        ]);
        DB::table('categories')->insert([
            'name' => '纯阳',
            'alias' => 'chunyang',
        ]);
        DB::table('categories')->insert([
            'name' => '万花',
            'alias' => 'wanhua',
        ]);
        DB::table('categories')->insert([
            'name' => '藏剑',
            'alias' => 'cangjian',
        ]);
        DB::table('categories')->insert([
            'name' => '唐门',
            'alias' => 'tangmen',
        ]);
        DB::table('categories')->insert([
            'name' => '七秀',
            'alias' => 'qixiu',
        ]);
        DB::table('categories')->insert([
            'name' => '少林',
            'alias' => 'shaolin',
        ]);
        DB::table('categories')->insert([
            'name' => '五毒',
            'alias' => 'wudu',
        ]);
        DB::table('categories')->insert([
            'name' => '明教',
            'alias' => 'mingjiao',
        ]);
        DB::table('categories')->insert([
            'name' => '丐帮',
            'alias' => 'gaibang',
        ]);
        DB::table('categories')->insert([
            'name' => '苍云',
            'alias' => 'cangyun',
        ]);
        DB::table('categories')->insert([
            'name' => '长歌',
            'alias' => 'changge',
        ]);
    }
}
