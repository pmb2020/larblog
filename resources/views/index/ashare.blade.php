@extends('layouts.index')

@section('title','爱分享 - K先生个人博客')
@section('keywords','爱分享,个人博客,K先生,K先生个人博客')
@section('description','分享html模板、js特效、php源码等资源-K先生的博客')

@section('style')
    <style type="text/css">
        nav{background-color: #222;}
        .type_item{padding: 15px;border-bottom: 1px solid #DDDDDD;margin-bottom: 25px;}
        .type_item a{padding-right: 30px;color: #666;font-size: 14px;}
        .type_ul .active {
            background-color: #1487ee;
        }
        .type_ul .active a {
            color: #fff
        }
    </style>
@endsection
@section('content')
    <p class="top_nav_P1" style="font-size: 14px;margin: 0 15px;">
        您现在的位置是：<a href="/">首页</a> > <a href="/">爱分享</a>
        <span class="f_r music_p d_none">你以为我是白分享给你的？哼！拿你的心来换！</span>
    </p>
    <ul class="share_ul add316">
        <div class="type_item">
            <a @if($nowId==0) style="color: #41c9a6;" @endif href="{{url('/ashare')}}">全部</a>
            @foreach($categorys as $category)
                <a @if($category->id==$nowId) style="color: #41c9a6;" @endif href="{{ url('/ashare',[$category->id]) }}">{{$category->name}}</a>
            @endforeach
        </div>
        @foreach($articles as $article)
            <li>
                <div class="share_li">
                    <a href="/info/{{$article ->id}}" title="{{$article->title}}" target="_blank">
                        <div class="img_box">
                            <img  alt="{{$article->title}}" src="{{$article->cover}}"
                                 onerror="{this.src='/static/index/images/default.jpg'}">
                        </div>
                        <h2><span>{{$article->title}}</span></h2>
                        <span class="share_like">喜欢
								| {{$article->zan_num}}</span>
                    </a>
                </div>
            </li>
        @endforeach
{{--        <li>--}}
{{--            <div class="share_li">--}}
{{--                <a href="/info/31.html" title="分享一款免费可商用的字体《问藏书房》" target="_blank">--}}
{{--                    <div class="img_box">--}}
{{--                        <img title="分享一款免费可商用的字体《问藏书房》" alt="分享一款免费可商用的字体《问藏书房》" src="https://bosircn.oss-cn-hangzhou.aliyuncs.com/2019/11/2019111402480179.jpg?x-oss-process=image/resize,m_fill,w_400,h_200"--}}
{{--                             onerror="{this.src='/static/index/images/default.jpg'}">--}}
{{--                    </div>--}}
{{--                    <h2><span>分享一款免费可商用的字体《问藏书房》</span></h2>--}}
{{--                    <span class="share_like">喜欢--}}
{{--								| 0</span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <div class="share_li">--}}
{{--                <a href="/info/14.html" title="win10永久激活工具" target="_blank">--}}
{{--                    <div class="img_box">--}}
{{--                        <img title="win10永久激活工具" alt="win10永久激活工具" src="http://www.laoyao.cn/zb_users/upload/2014/6/2014060480396849.jpg"--}}
{{--                             onerror="{this.src='/static/index/images/default.jpg'}">--}}
{{--                    </div>--}}
{{--                    <h2><span>win10永久激活工具</span></h2>--}}
{{--                    <span class="share_like">喜欢--}}
{{--								| 0</span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </li>--}}

    </ul>
@endsection
