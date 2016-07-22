<?php

namespace App\Http\Api\V1\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class App\Http\Api\V1\Model\Option
 * @property integer id
 * @property string name
 * @property string content
 * @property string comment
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Option extends Model
{
    protected $table = 'options';
    protected $guarded = [];
}
