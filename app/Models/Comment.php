<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['username','email','article_id','href','content','ip'];

//    添加评论
    static function addComment($data){
        $data['ip']=$_SERVER["REMOTE_ADDR"];
        return Comment::create($data);
    }
    /**获取文章评论
     * @param $article_id
     * @return mixed
     */
    static function getComment($article_id){
        $datas=Comment::where('comments.article_id',$article_id)->leftJoin('comments as replay','replay.id','=','comments.replay_id')
            ->select('comments.*','replay.username as replay_name')
            ->get()->toArray();
        $newDatas=$datas;
        foreach ($datas as $k=>$v){
            $newDatas[$k]['created_at']=changeDate($v['created_at']);
            if ($v['replay_id']!=0){
                //二级回复处理，把对应的回复接到一级回复
                $key=found_Key($newDatas,'id',$v['replay_id']);
                $newDatas[$key]['replaydata'][]=$newDatas[$k];
                unset($newDatas[$k]);
            }else{$newDatas[$k]['replaydata']=array();}
        }
//        逆序
        foreach ($newDatas as &$v){
            if (count($v['replaydata'])>1){
                $v['replaydata']=array_reverse($v['replaydata']);
            }
        }
        return array_reverse($newDatas);
    }

}

/**
 * 转换时间，超过7天才显示具体时间，否则，例如10分钟前
 * @param $date
 * @return string
 */
function changeDate($date){
    $subTime=time()-strtotime($date);
    if ($subTime < 60){
        return $subTime.'秒前';
    }else if ($subTime < 3600){
        return intval($subTime/60).'分钟前';
    }else if($subTime < 86400){
        return intval($subTime/3600).'小时前';
    }else if ($subTime < 86400*7){
        return intval($subTime/86400).'天前';
    }else{
        return date('Y-m-d H:i',strtotime($date));
    }
}
function found_Key($arr,$f_key,$f_value){
    return array_search($f_value, array_column($arr, $f_key));
}
