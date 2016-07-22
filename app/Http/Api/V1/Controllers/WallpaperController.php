<?php

namespace App\Http\Api\V1\Controllers;

use App\Http\Api\V1\Model\Wallpaper;
use App\Http\Api\V1\Transformers\CategoryTransformer;
use App\Http\Api\V1\Transformers\WallpaperTransformer;
use App\Http\ApiHelper;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class WallpaperController extends BaseController
{
    /**
     * @api {get} /wallpapers/{category_id} 获取指定分类的壁纸数据
     * @apiVersion 0.0.1
     * @apiName wallpapers
     * @apiGroup Wallpaper
     *
     * @apiParam {Number} category_id 分类id,需要拼接到url上
     * @apiParam {Number} [page] 页码
     *
     * @apiSuccess {String} id 分类名称
     * @apiSuccess {String} bigpath 大图路径
     * @apiSuccess {String} smallpath 小图路径
     * @apiSuccess {Number} view 浏览量
     *
     * @apiSuccessExample 成功响应:
    {
    "data": [
    {
    "id": 23,
    "category_id": 1,
    "bigpath": "uploads/daxia/3df5e0960455c7effa7059765eeb3a7d.jpg",
    "smallpath": "uploads/daxia/small3df5e0960455c7effa7059765eeb3a7d.jpg",
    "view": 0,
    "created_at": {
    "date": "2016-07-22 06:37:34.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    },
    "updated_at": {
    "date": "2016-07-22 06:37:34.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    }
    },
    {
    "id": 22,
    "category_id": 1,
    "bigpath": "uploads/daxia/3d73e271546e383f4ddda23889b7acd2.jpg",
    "smallpath": "uploads/daxia/small3d73e271546e383f4ddda23889b7acd2.jpg",
    "view": 0,
    "created_at": {
    "date": "2016-07-22 06:37:34.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    },
    "updated_at": {
    "date": "2016-07-22 06:37:34.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    }
    },
    {
    "id": 21,
    "category_id": 1,
    "bigpath": "uploads/daxia/6ccc78387ebeadda4b01fcb9ede631a5.jpg",
    "smallpath": "uploads/daxia/small6ccc78387ebeadda4b01fcb9ede631a5.jpg",
    "view": 0,
    "created_at": {
    "date": "2016-07-22 06:37:34.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    },
    "updated_at": {
    "date": "2016-07-22 06:37:34.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    }
    },
    {
    "id": 20,
    "category_id": 1,
    "bigpath": "uploads/daxia/499c84631f197dbbed42737ad907f271.jpg",
    "smallpath": "uploads/daxia/small499c84631f197dbbed42737ad907f271.jpg",
    "view": 0,
    "created_at": {
    "date": "2016-07-22 06:37:33.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    },
    "updated_at": {
    "date": "2016-07-22 06:37:33.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    }
    },
    {
    "id": 19,
    "category_id": 1,
    "bigpath": "uploads/daxia/13239c21ed6b4fb2638202cf9f1c4397.jpg",
    "smallpath": "uploads/daxia/small13239c21ed6b4fb2638202cf9f1c4397.jpg",
    "view": 0,
    "created_at": {
    "date": "2016-07-22 06:37:33.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    },
    "updated_at": {
    "date": "2016-07-22 06:37:33.000000",
    "timezone_type": 3,
    "timezone": "PRC"
    }
    }
    ],
    "meta": {
    "status": "success",
    "status_code": 200,
    "message": "获取壁纸列表成功",
    "pagination": {
    "total": 23,
    "count": 5,
    "per_page": 5,
    "current_page": 1,
    "total_pages": 5,
    "links": {
    "next": "http://www.jiansan.com/api/wallpapers/1?page=2"
    }
    }
    }
    }
     *
     * @apiErrorExample 失败响应:
    {
    "message": "获取壁纸列表失败",
    "status_code": 404
    }
     */
    public function getWallpapers($category_id)
    {
        $wallpapers = Wallpaper::where('category_id', $category_id)->orderBy('id', 'desc')->paginate(10);
        return $this->response->paginator($wallpapers, new WallpaperTransformer())->setMeta(ApiHelper::metaArray('获取壁纸列表成功'));
    }
}
