<?php

namespace App\Http\Api\V1\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class App\Http\Api\V1\Model\Feedback
 * @property integer id
 * @property string contact
 * @property string content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Feedback extends Model
{
    protected $table = 'feedback';
}
