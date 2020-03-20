<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class  wangbo extends Model
{
    //
//    protected $table='wangbos';//指定表名
//    public $timestamps = false;//created_at和updated_at是否让自动管理

    public function test(){
        return 'this is a model-test-function';
    }
}
