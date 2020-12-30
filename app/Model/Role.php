<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //1.关联的数据表
    public $table = 'role';
    //2.主键
    public $primaryKey = 'id';
    //3.允许批量操作的字段
    //public $fillable = ['username','password','phone'];//允许
    public $guarded = [];//禁止
    //4.是否维护create_at,自动时间
    public $timestamps = false;

    //添加动态属性，关联权限模型
    public function permission(){
        return $this->belongsToMany('App\Model\Permission','role_permission','role_id','permission_id');
    }
}
