<?php

namespace App\Http\Controllers\Admin;

use App\Http\Api\V1\Model\Category;
use App\Http\Api\V1\Model\Wallpaper;
use App\Http\ResizeImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Mockery\CountValidator\Exception;

class WallpaperController extends BaseController
{
    // get admin/wallpaper  全部壁纸列表
    public function index()
    {
        $wallpapers = DB::table('wallpapers')
            ->join('categories', 'wallpapers.category_id', '=', 'categories.id')
            ->select('wallpapers.*', 'categories.name')
            ->orderBy('id', 'desc')
            ->paginate(12);

        $errors = [];
        $categories = Category::all();
        return view('admin/wallpaper/index', compact('errors', 'wallpapers', 'categories'));
    }

    // get admin/wallpaper/{wallpaper} 显示单个壁纸信息
    public function show()
    {

    }

    // get admin/wallpaper/create 添加壁纸 create、store是连续的操作,create获取创建前需要的数据,store存储数据
    public function create()
    {
        $categories = Category::all();
        return view('admin/wallpaper/create', compact('categories'));
    }

    // post admin/wallpaper 添加壁纸提交处理
    public function store(Request $request)
    {
        // 图片临时路径数组 路径起始点是在public下
        $imagePaths = explode(',', $request->imagePaths);

        // 分类别名,用于做分类目录名
        $category = $request->category;

        // 支持的扩展名
        $allowExtensionNames = ['jpeg', 'jpg', 'png', 'wbmp'];

        foreach ($imagePaths as $tempPath) {

            $extension = substr($tempPath, strrpos($tempPath, '.') + 1);
            if (!in_array($extension, $allowExtensionNames)) {
                return back()->with('error', '文件类型不在允许范围内');
            }

            // 目录是否存在 不存在则创建
            $directory = 'uploads/' . $category . '/';

            if (!file_exists($directory)) {
                if (!(mkdir($directory, 0777, true) && chmod($directory, 0777))) {
                    return back()->with('error', '无权限创建路径,请设置public下的uploads目录权限为777');
                }
            }

            // 唯一图片文件名
            $fileName = md5(uniqid(microtime(true), true)) . '.jpg';
            // 缩略图文件名
            $smallFileName = 'small' . $fileName;
            // 原图存放路径
            $bigDestination = $directory . $fileName;
            // 缩略图存放路径
            $smallDestination = $directory . $smallFileName;

            // 存储原图
            try {
                $obj = new ReSizeImage();
                $obj->setSourceFile($tempPath);
                $obj->setDstFile($bigDestination);
                $obj->setWidth(750);
                $obj->setHeight(1334);
                $obj->draw();
            } catch (Exception $ex) {
                return back()->with('error', '图片压缩失败,请放弃治疗');
            }

            // 存储缩略图
            try {
                $obj = new ReSizeImage();
                $obj->setSourceFile($tempPath);
                $obj->setDstFile($smallDestination);
                $obj->setWidth(187);
                $obj->setHeight(333);
                $obj->draw();
            } catch (Exception $ex) {
                return back()->with('error', '图片压缩失败,请放弃治疗');
            }

            // 清除临时图片
            @unlink($tempPath);

            // 创建壁纸
            Wallpaper::create([
                'category_id' => Category::where('alias', $category)->first()->id,
                'bigpath' => $bigDestination,
                'smallpath' => $smallDestination
            ]);
        }

        // 全部处理完后
        return redirect()->route('admin.wallpaper.create');
    }

    // get admin/wallpaper/{wallpaper}/edit 编辑壁纸 edit、update也是一组连续的操作,edit获取需要编辑的数据的信息,update更新修改后的信息
    public function edit($id)
    {
        
    }

    // put admin/wallpaper/{wallpaper} 更新壁纸
    public function update(Request $request, $id)
    {
        $input = [
            'category_id' => Category::where('alias', $request->category)->first()->id,
        ];
        $result = Wallpaper::find($id)->update($input);
        if ($result) {
            return redirect()->route('admin.wallpaper.index');
        } else {
            return back()->with('errors', '更新壁纸信息失败');
        }
    }

    // delete admin/wallpaper/{wallpaper} 删除壁纸
    public function destroy($id)
    {
        $wallpaper = Wallpaper::find($id);
        @unlink($wallpaper->bigpath);
        @unlink($wallpaper->smallpath);
        $result = $wallpaper->delete();

        if ($result) {
            $data = [
                'status' => 1,
                'msg' => '删除壁纸成功',
            ];
        } else {
            $data = [
                'status' => 0,
                'msg' => '删除壁纸失败',
            ];
        }

        return $data;
    }

    /**
     * 上传图片到临时目录,并返回路径
     * @param Request $request
     * @return string 图片相对网站根目录路径
     */
    public function upload(Request $request)
    {
        // 单张图片处理
        $file = $request->file('Filedata');

        if ($file->isValid()) {
            $file->move('temp', $file->getClientOriginalName());
            $tempPath = 'temp/'.$file->getClientOriginalName();
            return $tempPath;
        }
    }

}
