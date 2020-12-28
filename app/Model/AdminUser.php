<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //1.关联的数据表
    public $table = 'admin_user';
    //2.主键
    public $primaryKey = 'id';
    //3.允许批量操作的字段
    //public $fillable = ['username','password','phone'];//允许
    public $guarded = [];//禁止
    //4.是否维护create_at,自动时间
    public $timestamps = false;








}
