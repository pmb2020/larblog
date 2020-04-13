@extends('layouts.index')

@section('title',$infoData -> title .' - K先生个人博客')
@section('keywords',$infoData -> keywords)
@section('description',$infoData -> description)

@section('style')
    <link rel="stylesheet" href="{{asset('static/index/css/monokai-sublime.css')}}">
    <link rel="stylesheet" href="{{asset('static/index/lib/comment/css/comment.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="info_snav">
                <p>当前位置：<a href="/">首页</a> > <a href="{{url($infoData->category->slug)}}">{{$infoData -> category-> name}}</a> > <a href="#">正文</a></p>
            </div>
            <div class="content" style="margin-top: 0;padding-top: 15px;">
                <h2 class="line_h2">{{$infoData->title}}</h2>
                <div class="user_info">
                    <span><i id="user_ico" class="ico"></i>K先生</span>
                    <time><i id="time_ico" class="ico"></i>{{$infoData -> created_at}}</time>
                    <span><i id="type_ico" class="ico"></i>{{$infoData -> category ->name ?? '未知分类'}}</span><span><i id="read_ico" class="ico"></i>{{$infoData->read_num}}</span>
                </div>
                <div class="blog_text">
                    {!! $infoData->content !!}
                </div>
                <!-- 文章版权说明 -->
                <div class="banquan" style="">
                    <p style="margin-bottom: 5px"><b>作者</b>：<a href="http://www.gold404.cn/about" style="margin-right: 15px">K先生</a><b>本文地址</b>：<a
                            href="#" title="可以平凡，但不能自暴自弃">http://www.gold404.cn/</a></p>
                    <p><b>版权声明</b>：本文为原创文章，版权归 <a href="http://www.gold404.cn/">K先生个人博客</a> 所有，欢迎分享本文，转载请保留出处，谢谢！</p>
                </div>
{{--               <div class="" style="text-align: center;margin: 10px;">--}}
{{--                    <button type="button" style="background-color: red;border: none;padding: 5px 10px;color: #fff;">👍赞一下（57）</button>--}}
{{--                </div> --}}
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
                    <div class="comment_div">
                        <h5 class="com_h5" style="font-size: 16px;">文章评论</h5>
                        <form id="form0" action="#" method="post" onsubmit="return false">
                            <div class="com_top" style="display: flex;flex-wrap: wrap;">
                                <div style="flex: 0 0 50%;max-width:50%">
                                    <div class="com_input_div" style="">
                                        <label style="">昵称：</label>
                                        <input class="com_input" type="text" name="username" value="">
                                        <span class="com_tip" style=""><span style="color: red;">*</span> 必填项</span>
                                    </div>
                                    <div class="com_input_div">
                                        <label style="">邮箱：</label>
                                        <input class="com_input" type="email" name="email">
                                        <span class="com_tip" style=""><span style="color: red;">*</span> 必填项</span>
                                    </div>
                                    <div class="com_input_div" style="">
                                        <label style="">网址：</label>
                                        <input class="com_input" type="text" name="href" placeholder="http://或https://开头哦">
                                        <span class="com_tip">可选</span>
                                    </div>
                                </div>
                                <div style="flex: 0 0 50%;max-width:50%;">
                                    <div class="com_card" style="display: none;">
                                        <div class="com_card_left" style="">
                                            <img class="round" width="65" height="65" avatar="轻微的风">
                                        </div>
                                        <div class="com_card_right" style="">
                                            <p>name：<span id="card_name"></span></p>
                                            <p style="white-space: nowrap;">Email：<span id="card_email"></span></p>
                                            <p>网址：<span id="card_href"></span></p>
                                        </div>
                                    </div>
                                    <div class="create_com" style="height: 100%;width: 100%;">
                                        <button id="create_btn" class="com_btn" style="">生成名片</button>
                                    </div>
                                </div>
                                <div style="flex: 0 0 100%;margin-top: 15px;">
                                    <div class="com_area_div" style="">
                                        <textarea name="title" placeholder="写点什么..."></textarea>
                                        <input onclick="comment()" class="com_btn" type="submit" name="" value="发表评论" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="com_bom">
                            <h5 class="com_h5">评论列表</h5>
                            <ul class="com_ul">
                                <p>暂时还没有评论哦！</p>
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
@section('myjs')
    <script src="{{asset('static/index/js/highlight.pack.js')}}"></script>
    <script>
        hljs.initHighlightingOnLoad();
        var e = document.querySelectorAll("code");
        var e_len = e.length;
        for (let i = 0; i < e_len; i++) {
            e[i].innerHTML = "<ul><li>" + e[i].innerHTML.replace(/\n/g, "\n</li><li>") + "\n</li></ul>";
        }
    </script>
@endsection
