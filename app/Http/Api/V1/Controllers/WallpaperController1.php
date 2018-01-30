<?php

namespace App\Http\Api\V1\Controllers;

use App\Http\Api\V1\Model\Wallpaper;
use App\Http\Api\V1\Transformers\CategoryTransformer;
use App\Http\Api\V1\Transformers\WallpaperTransformer;
use App\Http\ApiHelper;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class WallpaperController1 extends BaseController
{
    /**
     * @api {get} /wallpapers/{category_id} ???????????
     * @apiVersion 0.0.1
     * @apiName wallpapers
     * @apiGroup Api
     *
     * @apiParam {Number} category_id ??id,?????url??0?????????????????
     * @apiParam {Number} [page] ??
     *
     * @apiSuccess {String} id ??id
     * @apiSuccess {String} category_id ??id
     * @apiSuccess {String} bigpath ????
     * @apiSuccess {String} smallpath ????
     * @apiSuccess {Number} view ???
     *
     * @apiSuccessExample ????:
     *   {
     *       "data": [
     *       {
     *           "id": 23,
     *           "category_id": 1,
     *           "bigpath": "uploads/daxia/3df5e0960455c7effa7059765eeb3a7d.jpg",
     *           "smallpath": "uploads/daxia/small3df5e0960455c7effa7059765eeb3a7d.jpg",
     *           "view": 0,
     *           "created_at": {
     *               "date": "2016-07-22 06:37:34.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           },
     *           "updated_at": {
     *               "date": "2016-07-22 06:37:34.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           }
     *       },
     *       {
     *           "id": 22,
     *           "category_id": 1,
     *           "bigpath": "uploads/daxia/3d73e271546e383f4ddda23889b7acd2.jpg",
     *           "smallpath": "uploads/daxia/small3d73e271546e383f4ddda23889b7acd2.jpg",
     *           "view": 0,
     *           "created_at": {
     *               "date": "2016-07-22 06:37:34.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           },
     *           "updated_at": {
     *               "date": "2016-07-22 06:37:34.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           }
     *       },
     *       {
     *           "id": 21,
     *           "category_id": 1,
     *           "bigpath": "uploads/daxia/6ccc78387ebeadda4b01fcb9ede631a5.jpg",
     *           "smallpath": "uploads/daxia/small6ccc78387ebeadda4b01fcb9ede631a5.jpg",
     *           "view": 0,
     *           "created_at": {
     *               "date": "2016-07-22 06:37:34.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           },
     *           "updated_at": {
     *               "date": "2016-07-22 06:37:34.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           }
     *       },
     *       {
     *           "id": 20,
     *           "category_id": 1,
     *           "bigpath": "uploads/daxia/499c84631f197dbbed42737ad907f271.jpg",
     *           "smallpath": "uploads/daxia/small499c84631f197dbbed42737ad907f271.jpg",
     *           "view": 0,
     *           "created_at": {
     *               "date": "2016-07-22 06:37:33.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           },
     *           "updated_at": {
     *               "date": "2016-07-22 06:37:33.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           }
     *       },
     *       {
     *           "id": 19,
     *           "category_id": 1,
     *           "bigpath": "uploads/daxia/13239c21ed6b4fb2638202cf9f1c4397.jpg",
     *           "smallpath": "uploads/daxia/small13239c21ed6b4fb2638202cf9f1c4397.jpg",
     *           "view": 0,
     *           "created_at": {
     *               "date": "2016-07-22 06:37:33.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           },
     *           "updated_at": {
     *               "date": "2016-07-22 06:37:33.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           }
     *       }
     *       ],
     *       "meta": {
     *           "status": "success",
     *           "status_code": 200,
     *           "message": "????????",
     *           "pagination": {
     *               "total": 23,
     *               "count": 5,
     *               "per_page": 5,
     *               "current_page": 1,
     *               "total_pages": 5,
     *               "links": {
     *                   "next": "http://www.jiansan.com/api/wallpapers/1?page=2"
     *               }
     *           }
     *       }
     *   }
     *
     * @apiErrorExample ????:
     *   {
     *       "message": "????????",
     *       "status_code": 404
     *   }
     */
    public function getWallpapers($category_id)
    {
        if ($category_id != 0) {
            $wallpapers = Wallpaper::where('category_id', $category_id)->orderBy('id', 'desc')->paginate(21);
            return $this->response->paginator($wallpapers, new WallpaperTransformer())->setMeta(ApiHelper::metaArray('????????'));
        } else {
            $wallpapers = Wallpaper::orderBy('id', 'desc')->paginate(21);
            return $this->response->paginator($wallpapers, new WallpaperTransformer())->setMeta(ApiHelper::metaArray('????????'));
        }
    }

    /**
     * @api {get} /show/{id} ????id????
     * @apiVersion 0.0.1
     * @apiName show
     * @apiGroup Api
     *
     * @apiSuccess {String} id ??id
     * @apiSuccess {String} category_id ??id
     * @apiSuccess {String} bigpath ????
     * @apiSuccess {String} smallpath ????
     * @apiSuccess {Number} view ???
     *
     * @apiSuccessExample ????:
     *
     *   {
     *       "data": {
     *           "id": 1,
     *           "category_id": 1,
     *           "bigpath": "uploads/daxia/689a0dd035e1845b96b3dc18504c077c.jpg",
     *           "smallpath": "uploads/daxia/small689a0dd035e1845b96b3dc18504c077c.jpg",
     *           "view": 1,
     *           "created_at": {
     *               "date": "2016-07-22 06:37:31.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           },
     *           "updated_at": {
     *               "date": "2016-07-22 06:37:31.000000",
     *               "timezone_type": 3,
     *               "timezone": "PRC"
     *           }
     *       },
     *       "meta": {
     *           "status": "success",
     *           "status_code": 200,
     *           "message": "????????"
     *       }
     *   }
     *
     *  @apiErrorExample ????:
     *   {
     *       "message": "?????",
     *       "status_code": 404
     *   }
     */
    public function show($id)
    {
        $wallpaper = Wallpaper::findOrfail($id);
        if ($wallpaper) {
            $wallpaper->increment('id');
            return $this->response->item($wallpaper, new WallpaperTransformer())->setMeta(ApiHelper::metaArray('????????'));
        } else {
            return $this->response->errorNotFound('?????');
        }

    }
}
