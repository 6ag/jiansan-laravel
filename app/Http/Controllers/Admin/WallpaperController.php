<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class WallpaperController extends BaseController
{
    // get admin/wallpaper  全部壁纸列表
    public function index()
    {

    }
    
    // get admin/wallpaper/{wallpaper} 显示单个壁纸信息
    public function show()
    {

    }

    // get admin/wallpaper/create 添加壁纸 create、store是连续的操作,create获取创建前需要的数据,store存储数据
    public function create()
    {

    }

    // post admin/wallpaper 添加壁纸提交处理
    public function store()
    {

    }

    // get admin/wallpaper/{wallpaper}/edit 编辑壁纸 edit、update也是一组连续的操作,edit获取需要编辑的数据的信息,update更新修改后的信息
    public function edit($art_id)
    {
        
    }

    // put admin/wallpaper/{wallpaper} 更新壁纸
    public function update($art_id)
    {

    }

    // delete admin/wallpaper/{wallpaper} 删除壁纸
    public function destroy($art_id)
    {

    }
}
