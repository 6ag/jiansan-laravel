<?php

namespace App\Http\Api\V1\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class App\Http\Api\V1\Model\Wallpaper
 * @property integer id
 * @property integer category_id
 * @property string bigpath
 * @property string smallpath
 * @property integer view
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Wallpaper extends Model
{
    protected $table = 'wallpapers';
    protected $guarded = [];
}
