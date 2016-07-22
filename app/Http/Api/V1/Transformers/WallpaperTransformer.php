<?php

namespace App\Http\Api\V1\Transformers;

use App\Http\Api\V1\Model\Wallpaper;
use Illuminate\Http\Request;

use App\Http\Requests;
use League\Fractal\TransformerAbstract;

class WallpaperTransformer extends TransformerAbstract
{
    public function transform(Wallpaper $wallpaper)
    {
        return [
            'id' => $wallpaper->id,
            'category_id' => $wallpaper->category_id,
            'bigpath' => $wallpaper->bigpath,
            'smallpath' => $wallpaper->smallpath,
            'view' => $wallpaper->view,
            'created_at' => $wallpaper->created_at,
            'updated_at' => $wallpaper->updated_at,
        ];
    }
}