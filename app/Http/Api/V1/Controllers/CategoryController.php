<?php

namespace App\Http\Api\V1\Controllers;

use App\Http\Api\V1\Model\Category;
use App\Http\Api\V1\Transformers\CategoryTransformer;
use App\Http\ApiHelper;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends BaseController
{
    /**
     * @api {get} /categories 获取全部分类信息
     * @apiVersion 0.0.1
     * @apiName categories
     * @apiGroup Category
     *
     * @apiSampleRequest http://www.jiansan.com/api/categories
     *
     * @apiSuccess {String} status 状态
     * @apiSuccess {Number} code 状态码
     * @apiSuccess {String} message 提示信息
     * @apiSuccess {Array} data 所有数据
     * @apiSuccess {Number} data.id 分类id
     * @apiSuccess {String} data.name 分类名称
     * @apiSuccess {String} data.alias 分类别名
     *
     * @apiSuccessExample 成功响应:
        {
            "status": "success",
            "code": 200,
            "message": "获取分类列表成功",
            "data": [
                {
                    "id": 1,
                    "name": "大侠",
                    "alias": "daxia"
                },
                {
                    "id": 2,
                    "name": "纯阳",
                    "alias": "chunyang"
                },
                {
                    "id": 3,
                    "name": "万花",
                    "alias": "wanhua"
                },
                {
                    "id": 4,
                    "name": "藏剑",
                    "alias": "cangjian"
                },
                {
                    "id": 5,
                    "name": "唐门",
                    "alias": "tangmen"
                },
                {
                    "id": 6,
                    "name": "七秀",
                    "alias": "qixiu"
                },
                {
                    "id": 7,
                    "name": "少林",
                    "alias": "shaolin"
                },
                {
                    "id": 8,
                    "name": "五毒",
                    "alias": "wudu"
                },
                {
                    "id": 9,
                    "name": "明教",
                    "alias": "mingjiao"
                },
                {
                    "id": 10,
                    "name": "丐帮",
                    "alias": "gaibang"
                },
                {
                    "id": 11,
                    "name": "苍云",
                    "alias": "cangyun"
                },
                {
                    "id": 12,
                    "name": "长歌",
                    "alias": "changge"
                }
            ]
        }
     *
     * @apiErrorExample 失败响应:
        {
            "status": "error",
            "code": 404,
            "message": "获取分类列表失败",
            "data": null
        }
     */
    public function getCategories()
    {
        $categories = Category::all(['id', 'name', 'alias']);
        if ($categories) {
            return ApiHelper::response($categories->toArray(), '获取分类列表成功');
        } else {
            return ApiHelper::response(null, '获取分类列表失败', 'error', 404);
        }
    }
}
