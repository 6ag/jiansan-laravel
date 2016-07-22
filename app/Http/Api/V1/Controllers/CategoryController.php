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
     * @api {get} /getcategories 获取全部分类信息
     * @apiName getcategories
     * @apiGroup Category
     *
     * @apiSuccess {Array} data 所有数据
     * @apiSuccess {Number} data.id 分类id
     * @apiSuccess {String} data.name 分类名称
     * @apiSuccess {String} data.alias 分类别名
     *
     * @apiSuccessExample Success-Response:
        {
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
     * @apiErrorExample Error-Response:
     *     {
     *       "error": "请求失败"
     *     }
     */
    public function getCategories()
    {
        $categories = Category::all();
        return $this->response->collection($categories, new CategoryTransformer());
    }
}
