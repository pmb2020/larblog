@extends('layouts.index')

@section('title','爱生活 - K先生个人博客')
@section('keywords','爱生活,K先生,K先生个人博客')
@section('description','记录生活的点滴，心灵的橱窗-K先生个人博客')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <p class="top_nav_P">
                您现在的位置是：<a href="/">首页</a> > <a href="/">爱生活</a>
                <span class="f_r music_p d_none">我喜欢生活，而不是为谁而生活</span>
            </p>
            <div style="margin-top: 15px;">
                <div class="new_txt md_none"><p>最新文章</p></div>
                @foreach($articles as $article)
                    <section class="section @if($article -> is_top>0)hot_sec @endif">
                        <div class="flex_img">
                            @if($article -> cover)
                                <div class="img_box">
                                    <img src="{{$article->cover}}" onerror="{{asset('static/index/images/default.jpg')}}" alt="{{$article->title}}">
                                </div>
                            @endif
                            <div class="r_text">
                                <h2 class="line_h2 @if($article -> cover) ellipsis1 @endif"><a target="_blank" href="{{url('/info',[$article->id])}}">{{$article->title}}</a></h2>
                                <p class="ellipsis2 @if($article -> cover) line3 @endif">{{$article->description}}</p>
                                <div class="text_info">
                                    <span><i id="user_ico" class="ico"></i>K先生</span>
                                    <time class="md_none_line"><i id="time_ico" class="ico"></i>@if($article -> cover) {{$article->created_at->format('Y-m-d')}} @else {{$article->created_at}} @endif</time>
                                    <time class="d_none"><i id="time_ico" class="ico"></i>{{$article->created_at}}</time>
                                    <span><i id="type_ico" class="ico"></i>{{$article->category->name}}</span><span><i id="read_ico" class="ico"></i>{{$article->read_num}}</span>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
                {{$articles -> links()}}
            </div>
        </div>
        <div class="col-md-3">
            <aside style="margin-top: 0px;">
                <p class="div_top">网易云热评</p>
                <div class="hot_p">
                    <p class="music_p">走不通的路就回头，爱而不得的人就放手，得不到回应的热情就适可而止，别把一厢情愿当成满腔孤勇，也别把厌倦当成欲擒故纵。</p>
                    <!-- <blockquote>走不通的路就回头</blockquote> -->
                    <span>——出自网易云音乐热评《作家与小丑》</span>
                </div>
                <!-- <cite style="font-size: 14px;">我喜欢的歌没有火就像我喜欢的人从未喜欢过我</cite> -->
            </aside>
            @component('index.component.hotArticle')
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
