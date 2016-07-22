<?php

namespace App\Http\Api\V1\Controllers;

use App\Http\Api\V1\Model\Option;
use App\Http\Api\V1\Transformers\OptionTransformer;
use App\Http\ApiHelper;
use Illuminate\Http\Request;

use App\Http\Requests;

class OptionController extends BaseController
{

    /**
     * @api {get} /status 是否一键设置壁纸
     * @apiVersion 0.0.1
     * @apiName status
     * @apiGroup Api
     *
     * @apiSuccess {String} name 配置项名称
     * @apiSuccess {String} content 配置项内容
     * @apiSuccess {String} comment 配置项备注
     *
     * @apiSuccessExample 成功响应:
     *   {
     *       "data": {
     *           "id": 1,
     *           "name": "app_save_wallpaper",
     *           "content": "1",
     *           "comment": "app端屏蔽私有api接口"
     *       },
     *       "meta": {
     *           "status": "success",
     *           "status_code": 200,
     *           "message": "获取配置信息成功"
     *       }
     *   }
     * @apiErrorExample 失败响应:
     *   {
     *       "message": "配置信息不存在",
     *       "status_code": 404
     *   }
     */
    public function getSaveWallpaperStatus()
    {
        $option = Option::where('name', 'app_save_wallpaper')->first();
        if ($option) {
            return $this->response->item($option, new OptionTransformer())->setMeta(ApiHelper::metaArray('获取配置信息成功'));
        } else {
            return $this->response->errorNotFound('配置信息不存在');
        }

    }
}
