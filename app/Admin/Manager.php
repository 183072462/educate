<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
//引入trait
use Illuminate\Auth\Authenticatable;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //定义当前模型需要关联的数据表
    protected $table='manager';
    //使用trait
    use Authenticatable;

}
