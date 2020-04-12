<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    //
    /**
     * 获取推荐数据
     * @param $type 0首页 1其他
     * @return mixed
     */
    static function getRecommend($type){

        $data=Recommend::where('type',$type)->leftJoin('articles','recommends.article_id','=','articles.id')->select('recommends.article_id','articles.title','articles.created_at')->get()->toArray();
        for ($i=0;$i<=count($data);$i++){
            if (empty($data[$i]['title'])){unset($data[$i]);}
        }
        return $data;
    }
}
