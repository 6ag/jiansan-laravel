<?php

namespace App\Http\Api\V1\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OptionController extends BaseController
{

    /**
     * @api {get} /status 是否一键设置壁纸
     * @apiVersion 0.0.1
     * @apiName status
     * @apiGroup Option
     *
     * @apiSampleRequest http://www.jiansan.com/api/status
     *
     * @apiSuccess {String} status 状态
     * @apiSuccess {Number} code 状态码
     * @apiSuccess {String} message 提示信息
     * @apiSuccess {Array} data 所有数据
     * @apiSuccess {String} data.name 配置项名称
     * @apiSuccess {String} data.content 配置项内容
     *
     * @apiSuccessExample 成功响应:
     * {
     *
     * }
     *
     * @apiErrorExample 失败响应:
     * {
     *
     * }
     */
    public function getSaveWallpaperStatus()
    {
        
    }
}
