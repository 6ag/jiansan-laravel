<?php

namespace App\Http\Api\V1\Transformers;

use App\Http\Api\V1\Model\Option;
use Illuminate\Http\Request;

use App\Http\Requests;
use League\Fractal\TransformerAbstract;

class OptionTransformer extends TransformerAbstract
{
    public function transform(Option $option)
    {
        return [
            'id' => $option->id,
            'name' => $option->name,
            'content' => $option->content,
            'comment' => $option->comment,
        ];
    }
}