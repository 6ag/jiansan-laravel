<?php

namespace App\Http\Api\V1\Transformers;

use App\Http\Api\V1\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $categorie)
    {
        return [
            'id' => $categorie->id,
            'name' => $categorie->name,
            'alias' => $categorie->alias,
        ];
    }
}