<?php

namespace App\Http\Api\V1\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class App\Http\Api\V1\Model\Category
 * @property integer id
 * @property string name
 * @property string alias
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];
}
