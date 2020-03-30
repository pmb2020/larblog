<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DouyinController extends Controller
{
    //
    public function index(Request $request){
        $url=$request->input('url');
        if ($url){
            return $this->getDouyinInfo($url);
        }else{
            return '请输入要解析的抖音短视频链接';
        }
    }
//    根据链接获取抖音的无水印视频，标题、作者、图片
    public function getDouyinInfo($url){
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);//设置ua
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36');//设置ua
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result=curl_exec($ch);
        $pattern1='/playAddr: "(.*?)"/';
        $pattern2='/cover: "(.*?)"/';
        $pattern3='/<p class="desc">(.*?)<\/p>/is';//匹配视频描述
        $pattern4='/<p class="name nowrap">@(.*?)<\/p>/i';//匹配视频作者
        preg_match($pattern1,$result,$playAddr);
        preg_match($pattern2,$result,$cover);
        preg_match($pattern3,$result,$title);
        preg_match($pattern4,$result,$name);
        if (!$playAddr){return $this->responseJson(200,'error','');}
        $video_url=str_replace('playwm','play',$playAddr[1]);
        curl_setopt($ch, CURLOPT_URL, $video_url);
        curl_setopt($ch, CURLOPT_USERAGENT, '(iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1');//设置手机ua
        curl_exec($ch);
        $real_video = curl_getinfo($ch)['url'];
        curl_close($ch);
        $data=[
            'author' => $name[1]??'',
            'title' => str_replace("\n","",$title[1])??'',//去除换行
            'cover' =>$cover[1]??'',
            'real_video' =>substr($real_video,0,stripos($real_video,'?'))
        ];
        return $this->responseJson(200,'success',$data);
    }

    public function responseJson($code,$msg,$data){
        $response=[
            'code' =>$code,
            'msg' =>$msg,
            'data'=>$data
        ];
        return json_encode($response);
    }
}
