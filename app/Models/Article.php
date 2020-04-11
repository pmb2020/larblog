<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

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

    //选出阅读量最高的5条做热门文章
    public function getHot(){
        $datas=$this->whereNotNull ('cover')->orderBy('read_num','desc')->take(5)->get()->toArray();
        return $datas;
    }
    //日期归档
    public function dateGuidang(){
        $datas=$this->select('created_at')->orderBy('id','desc')->get()->toArray();
        foreach ($datas as $v){
            $dateArr[]=date('Y年m月',strtotime($v['created_at']));
        }
        $i=0;
        foreach (array_count_values($dateArr) as $k=>$v){
            $aa[$i]['date']=$k;
            $aa[$i]['num']=$v;
            $i++;
        }
        return $aa;
    }

}
