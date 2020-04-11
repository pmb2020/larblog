<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
//    protected $table='wangbos';
    protected $fillable=['title','keywords','description','content','category_id','is_top','cover'];
//    protected $guarded=['id'];
    public function test(){
        return 'this is a testModel';
    }

    public function Category(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    public function getHot(){
        $datas=$this->whereNotNull ('cover')->orderBy('read_num','desc')->take(5)->get()->toArray();
        return $datas;
    }

}
