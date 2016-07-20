<?php

namespace App\Http\Api\V1\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guarded = ['is_admin']; // is_admin字段不能使用create()方法填充

}
