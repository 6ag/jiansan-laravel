<?php

namespace App\Http\Api\V1\Transformers;

use App\Http\Api\V1\Model\Wallpaper;
use Illuminate\Http\Request;

use App\Http\Requests;
use League\Fractal\TransformerAbstract;

class WallpaperTransformer1 extends TransformerAbstract
{
    public function transform(Wallpaper $wallpaper)
    {
        return [
            'id' => $wallpaper->id,
            'bigpath' => $wallpaper->bigpath,
            'view' => $wallpaper->view,
            'created_at' => $wallpaper->created_at
        ];
    }
}