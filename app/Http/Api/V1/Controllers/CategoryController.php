<?php

namespace App\Http\Api\V1\Controllers;

use App\Http\Api\V1\Model\Category;
use App\Http\Api\V1\Transformers\CategoryTransformer;
use App\Http\ApiHelper;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends BaseController
{
    public function getCategories()
    {
        $categories = Category::all();
        return $this->response->collection($categories, new CategoryTransformer());

//        return \Response::json([
//            'status'=>'success',
//            'code'=> 200,
//            'message' => '获取分类列表成功',
//            'data'=> ,
//        ]);
    }
}
