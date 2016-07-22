<?php

namespace App\Http\Api\V1\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class App\Http\Api\V1\Model\User
 * @property integer id
 * @property string name
 * @property string email
 * @property string password
 * @property integer is_admin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class User extends Model
{
    protected $table = 'users';
    protected $guarded = ['is_admin']; // is_admin字段不能使用create()方法填充

}
