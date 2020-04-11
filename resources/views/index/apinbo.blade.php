@extends('layouts.index')

@section('title',$seoInfo->name.' - '.$smallTitle)
@section('keywords',$seoInfo->keywords)
@section('description',$seoInfo->description)

@section('content')
    <p class="top_nav_P1" style="font-size: 14px;margin: 0 15px;">
        您现在的位置是：<a href="/">首页</a> > <a href="/">{{$seoInfo->name}}</a>
        <span class="f_r music_p d_none">因为喜欢的是你，所以拼搏!</span>
    </p>
    <div style="background-color: #fff;border-radius: 5px;padding: 15px;min-height: 500px;box-shadow: 0 4px 5px 0 #d9dfe9;margin-top: 15px;">
        <div class="time-title">
            <p class="ptitle">心中的执念，脚下的路</p>
            <p style="text-align:center;margin-bottom: 35px">（没人在乎你想做什么，只会看到你做了什么）</p>
        </div>
        <div class="linetime" style="">
            <ul class="timez line-r">
                <li><b>2018年4月12日</b><br>要永远记住的一天</li>
                <li><b>2018年5月12日</b><br>第二版博客正式上线</li>
                <li><b>2018年5月30日</b><br>博客接入搜狐畅言评论系统</li>
                <li><b>2018年8月12日</b><br>零零影院正式上线</li>
            </ul>
            <ul class="timez line-l">
                <li><b>2018年4月12日</b><br>要永远记住的一天</li>
                <li><b>2018年5月12日</b><br>第二版博客正式上线</li>
                <li><b>2018年5月30日</b><br>博客接入搜狐畅言评论系统</li>
                <li><b>2018年8月12日</b><br>零零影院正式上线</li>
            </ul>
        </div>
    </div>
@endsection
