@extends('layouts.index')

@section('title',$infoData -> title .' - K先生个人博客')
@section('keywords',$infoData -> keywords)
@section('description',$infoData -> description)

@section('style')
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('static/index/css/styles/atom-one-dark.css')}}">
    <link rel="stylesheet" href="{{asset('static/index/css/comment.css')}}">
    <style>
        code li br{display: none}
        .blog_text pre{position: relative;padding-top: 32px}
        .blog_text pre:before{
            display: block;
            content: ' ';
            height: 32px;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background-color: #f6f6f6;
            padding: 0 10px;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        .blog_text pre:after{
            content: " ";
            position: absolute;
            border-radius: 50%;
            background: #fc625d;
            width: 10px;
            height: 10px;
            top: 0;
            left: 15px;
            margin-top: 11px;
            -webkit-box-shadow: 20px 0 #fdbc40, 40px 0 #35cd4b;
            box-shadow: 20px 0 #fdbc40, 40px 0 #35cd4b;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="info_snav">
                <p>当前位置：<a href="/">首页</a> > <a href="{{url($infoData->category->slug)}}">{{$infoData -> category-> name}}</a> > <a href="#">正文</a></p>
            </div>
            <div class="content" style="margin-top: 0;padding-top: 15px;">
                <h1 class="line_h2">{{$infoData->title}}</h1>
                <div class="user_info">
                    <span><i id="user_ico" class="ico"></i>K先生</span>
                    <time><i id="time_ico" class="ico"></i>{{$infoData -> created_at}}</time>
                    <span><i id="type_ico" class="ico"></i>{{$infoData -> category ->name ?? '未知分类'}}</span><span><i id="read_ico" class="ico"></i>{{$infoData->read_num}}</span>
                </div>
                <div class="blog_text">
                    {!! $infoData->content !!}
                </div>
                <!-- 文章版权说明 -->
                <div class="banquan">
                    <p style="margin-bottom: 5px"><b>作者</b>：<a href="http://www.gold404.cn/about" style="margin-right: 15px">K先生</a><b>本文地址</b>：<a
                            href="http://www.gold404.cn/info/{{$infoData->id}}" title="{{$infoData->title}}">http://www.gold404.cn/info/{{$infoData->id}}</a></p>
                    <p><b>版权声明</b>：本文为原创文章，版权归 <a href="http://www.gold404.cn">K先生个人博客</a> 所有，欢迎分享本文，转载请保留出处，谢谢！</p>
                </div>
                <div class="next_div">
                    <p>上一篇：
                        @if($prev_article)
                        <a href="{{url('/info',[$prev_article->id])}}">{{$prev_article->title}}</a>
                        @else<span>没有了</span>@endif
                    </p>
                    <p>下一篇：
                        @if($next_article)
                        <a href="{{url('/info',[$next_article->id])}}">{{$next_article->title}}</a>
                        @else<span>没有了</span>@endif
                    </p>
                </div>
            </div>
            <ul class="list_two li_dian" style="border-radius: 3px;">
                <p class="div_top">猜你喜欢</p>
                <li><a href="#">404页面萌酷纸飞机紫色星空背景</a></li>
                <li><a href="#">K先生：今天不谈技术，来聊聊心情</a></li>
                <li><a href="#">js实现人体时钟</a></li>
                <li><a href="#">K先生：今天我们来做个约定吧</a></li>
                <li><a href="#">PHP与Linux定时任务</a></li>
                <li><a href="#">jQuery实现的上下滚动公告栏</a></li>
            </ul>
            <!-- 评论 -->
            <div style="background-color: #fff;margin-top: 15px;margin-bottom: 15px;border-radius: 3px;">
                <!-- <p class="div_top">文章评论</p> -->
                <!-- <p style="color: #888;">暂无评论</p> -->
                <div class="container">
                    <div class="comment_body">
                        <input type="hidden" name="article_id" value="{{$infoData->id}}" />
                        <h4 class="com_h4">文章评论</h4>
                        <form id="form0" action="#" method="post" onsubmit="return false">
                            <div class="input-box">
                                <div style="margin-right: 15px;">
                                    <div class="com_input_div" style="">
                                        <label>昵称：</label>
                                        <input type="text" name="username" value="" />
                                        <span><span style="color: red;">*</span> 必填</span>
                                    </div>
                                    <div class="com_input_div">
                                        <label>邮箱：</label>
                                        <input type="text" name="email" value="" placeholder="仅用来接收回复通知" />
                                        <span>可选</span>
                                    </div>
                                    <div class="com_input_div">
                                        <label>网址：</label>
                                        <input type="text" name="href" value="" />
                                        <span>可选</span>
                                    </div>
                                </div>
                                <div style="position: relative;">
                                    <button class="create_btn" type="button" onclick="createCard(this)">生成本站通行证</button>
                                </div>

                                <div class="com_card-box">
                                    <div class="com_card" style="display: none;">
                                        <img style="" class="round" size="60" avatar="K先生" alt="K先生">
                                        <h4>欢迎您，K先生</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="com_area_div">
                                <textarea name="content" required placeholder="来说几句吧......"></textarea>
                                <div class="area_bom">
                                    <img src="{{asset('static/index/images/emoji.png')}}">
                                    <input class="com_btn" type="button" onclick="comment()" value="发表评论" />
                                </div>
                            </div>
                        </form>
                        <div class="com_list">
                            <h4 class="com_h4">评论列表</h4>
                            <ul class="com_ul">
                                @if(!$comments)<p>暂时还没有评论哦！</p>@endif
                                @foreach($comments as $comment)
                                        <li>
                                            <img class="round" size="60" avatar="{{$comment->username}}">
                                            <div class="com_right">
                                                <div class="comTop" style="">
                                                    <a target="_blank" href="{{$comment->href}}">{{$comment -> username}}<span class="com_lou">{{$loop->iteration}}#</span></a>
                                                    <button class="zan_btn" onclick="dianzan(this)" type="button"><img src="{{asset('static/index/images/zan.png')}}"><span>{{$comment -> zan_num}}</span></button>
                                                </div>
                                                <p class="com_p">{{$comment -> content}}</p>
                                                <div class="comBom">
                                                    <span>{{$comment -> time}}</span>
                                                    <span>来自chrome浏览器</span>
                                                    <a class="replay" href="javascript:void(0)" onclick="replayBox(this,{{$comment -> id}})">回复</a>
                                                </div>
                                                <!-- 回复 -->
                                                @if($comment ->replayData)
                                                <ul class="com2_ul">
                                                    @foreach($comment ->replayData as $item)
                                                    <li>
                                                        <p style="margin-bottom: 10px;"><a href="#">{{$item ->username}}{{$item ->replay_role}}</a>
                                                                @if($item->replay_role)
                                                                <span class="com_mark" style="background-color: #60c315">管理</span>：
                                                                @else
                                                                <span class="com_mark">游客</span>：
                                                            @endif
                                                            <span>{{$item -> content}}</span>
                                                        </p>
                                                        <p style="font-size: 12px;"><span>{{$item -> time}}</span><span style="margin-left: 15px;">来自Chrome浏览器</span></p>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                        </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
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

            @component('index.component.randArticle')
            @endcomponent
        </div>
    </div>
@endsection
@section('myjs')
{{--    <script src="{{asset('static/index/js/headimg.js')}}"></script>--}}
    <script src="{{asset('static/index/js/comment.js')}}"></script>
    <script src="{{asset('static/index/js/highlight.pack.js')}}"></script>
    <script src="http://cdn.gold404.cn/js/alone-imgView.js"></script>
    <script>
        // 点击放大图片
        alone.config={
            'eleBox':'.content'
        };
        alone.imgView();

        hljs.initHighlightingOnLoad();
        var e = document.querySelectorAll("code");
        var e_len = e.length;
        for (let i = 0; i < e_len; i++) {
            e[i].innerHTML = "<ul><li>" + e[i].innerHTML.replace(/\n/g, "\n</li><li>") + "\n</li></ul>";
        }
    </script>
@endsection
