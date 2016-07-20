<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends BaseController
{
    // get admin/category  全部分类列表
    public function index()
    {
        return view('admin/category/index');
    }

    // get admin/category/{category} 显示单个分类信息
    public function show()
    {
        
    }

    // get admin/category/create 添加分类 create、store是连续的操作,create获取创建前需要的数据,store存储数据
    public function create()
    {
        return view('admin/category/create');
    }

    // post admin/category 添加分类提交处理
    public function store()
    {

    }

    // get admin/category/{category}/edit 编辑分类 edit、update也是一组连续的操作,edit获取需要编辑的数据的信息,update更新修改后的信息
    public function edit($art_id)
    {

    }

    // put admin/category/{category} 更新分类
    public function update($art_id)
    {

    }

    // delete admin/category/{category} 删除分类
    public function destroy($art_id)
    {

    }
}
