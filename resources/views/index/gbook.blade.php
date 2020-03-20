@extends('layouts.index')

@section('title','留言板 - K先生个人博客')
@section('keywords','留言板,K先生,个人博客,K先生个人博客')
@section('description','有朋自远方来，来聊聊天吧-K先生个人博客')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <p class="top_nav_P">
                您现在的位置是：<a href="/">首页</a> > <a href="/">留言板</a>
                <span class="f_r music_p d_none">有朋自远方来，不亦乐乎！</span>
            </p>
            <div style="">
                <section class="section" style="min-height: 300px">
                    <p>留言功能正在完善中......</p>
                </section>
            </div>
        </div>
        <div class="col-md-3">
            @component('index.component.userInfo')
            @endcomponent
            <aside class="d_none" style="margin-top: 15px;">
                <p class="div_top">随机推荐</p>
                <ul class="text_ul">
                    <li><a href="http://www.gold404.cn/info/3.html">>php环境搭建phpstudy<span>07-04</span></a></li>
                    <li><a href="http://www.gold404.cn/info/34.html">>PHP与Linux定时任务<span>07-04</span></a></li>
                    <li><a href="http://www.gold404.cn/info/24.html">>K先生：今天不谈技术，来聊聊心情<span>07-03</span></a></li>
                    <li><a href="http://www.gold404.cn/info/22.html">>网站改版后，网站内页一直不被收录时，我做了什么<span>07-01</span></a></li>
                    <li><a href="http://www.gold404.cn/info/14.html">>win10永久激活工具<span>07-01</span></a></li>
                    <li><a href="http://www.gold404.cn/info/5.html">>黑色炫酷html博客模板<span>07-02</span></a></li>

                    <li><a href="http://www.gold404.cn/info/1.html">>K先生<span>10-25</span></a></li>
                </ul>
            </aside>

        </div>
    </div>
@endsection
