<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $fillable=['username','email','article_id','replay_id','href','content','ip','role'];

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
//        $datas=Comment::where('comments.article_id',$article_id)->leftJoin('comments as replay','replay.id','=','comments.replay_id')
//            ->select('comments.*','replay.username as replay_name')
//            ->get()->toArray();
        if(!is_int($article_id)){
            return [];
        }
        $results=DB::select('SELECT com.id,com.href,com.username,com.content,com.created_at time,com.zan_num,GROUP_CONCAT(CONCAT(\'{"username":"\',rep.username,\'","replay_name":"\',com.username,\'","replay_role":"\',rep.role,\'","content":"\',rep.content,\'","time":"\',rep.created_at,\'","zan_num":"\',rep.zan_num,\'"}\'))AS replayData FROM ml_comments com LEFT  JOIN ml_comments rep ON com.id=rep.replay_id WHERE com.replay_id=0 AND com.article_id='
            .$article_id.' GROUP BY com.id');

//        foreach ($datas as $k=>$v){
//            $newDatas[$k]['created_at']=changeDate($v['created_at']);
//            if ($v['replay_id']!=0){
//                //二级回复处理，把对应的回复接到一级回复
//                $key=found_Key($newDatas,'id',$v['replay_id']);
////                echo 'key:'.$key;
//                $newDatas[$key+1]['replaydata'][]=$datas[$k];
//                unset($newDatas[$k]);
//            }else{$newDatas[$k]['replaydata']=array();}
//        }
////        逆序
//        foreach ($newDatas as &$v){
//            if (count($v['replaydata'])>1){
//                $v['replaydata']=array_reverse($v['replaydata']);
//            }
//        }
//        $results[2]->replayData=json_decode($results[2]->replayData,true);
        foreach ($results as $v){
            $v->time=changeDate($v->time);
            if($v->replayData){
                //json_decode不能有\n等，所以需要替换
                $info= preg_replace('/[\x00-\x1F\x80-\x9F]/u', '', trim('['.$v->replayData.']'));
                $v->replayData=json_decode($info);
            }
            if ($v->replayData){
                foreach ($v->replayData as $vv){
                    $vv->time=changeDate($vv->time);
                }
                $v->replayData=array_reverse($v->replayData);
            }
        }
        return array_reverse($results);
    }

    /**
     * 查询评论列表，后台用
     * @param $page
     * @return mixed
     */
    static function comList($page =10){
        $com=Comment::select('articles.title','comments.*')->leftJoin('articles','comments.article_id','articles.id')->
        orderBy('id','desc')->paginate($page);
        foreach ($com as $v){
            $v->time=changeDate($v->created_at);
        }
        return $com;
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
