<?php

namespace App\Http\Api\V1\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WallpaperController extends BaseController
{
    /**
     * @api {get} /wallpapers 获取指定分类的壁纸数据
     * @apiVersion 0.0.1
     * @apiName wallpapers
     * @apiGroup Wallpaper
     *
     * @apiSampleRequest http://www.jiansan.com/api/wallpapers
     *
     * @apiParam {Number} category_id 分类id
     *
     * @apiSuccess {String} status 状态
     * @apiSuccess {Number} code 状态码
     * @apiSuccess {String} message 提示信息
     * @apiSuccess {Array} data 所有数据
     * @apiSuccess {String} data.id 分类名称
     * @apiSuccess {String} data.bigpath 大图路径
     * @apiSuccess {String} data.smallpath 小图路径
     *
     * @apiSuccessExample 成功响应:
     * {
     *
     * }
     * @apiErrorExample 失败响应:
     * {
     *
     * }
     */
    public function getWallpapers($category_id)
    {
        
    }
}
