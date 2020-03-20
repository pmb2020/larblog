{{--@component('index.component.userInfo')--}}
{{--    <strong>Whoops!</strong> Something went wrong!--}}
{{--@endcomponent--}}
@extends('layouts.index')

@section('title','K先生个人博客 - 分享资源和学习经验的个人博客')
@section('keywords','K先生,K先生个人博客,个人博客' )
@section('description','K先生个人博客，一个分享html、php源码等资源以及交流学习技术的个人博客！K先生是我的影，那些年我踩过的坑，不想让别人再踩，因为，我深知其中的苦和泪。')

{{--主体内容--}}
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="banner" id="banner" style="margin: 0px auto;">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#"><img src="{{asset('static/index/images/banner1.jpg')}}" ></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="{{asset('static/index/images/banner2.jpg')}}" ></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="{{asset('static/index/images/banner3.jpg')}}" ></a>
                        </div>
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>
                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev d_none"></div>
                    <div class="swiper-button-next d_none"></div>
                </div>
            </div>
            <ul class="list_one ico_num" style="">
                <p class="div_top">本站推荐</p>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>K先生</p><time>2018-10-25</time></a></li>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>php冒泡排序和快速排序</p><time>2018-10-25</time></a></li>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>一起来掌握PHP静态化技术</p><time>2018-10-25</time></a></li>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>K先生：今天不谈技术，来聊聊心情</p><time>2018-10-25</time></a></li>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>Bootstrap4响应式布局之栅格系统Bootstrap4响应式布局之栅格系统vsBootstrap4响应式布局之栅格系统</p><time>2018-10-25</time></a></li>
            </ul>
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
{{--                <section class="section hot_sec">--}}
{{--                    <div class="flex_img">--}}
{{--                        <div class="img_box">--}}
{{--                            <img src="https://blog.yzmcms.com/uploads/thumbnail/20190916213923655.png" onerror="" alt="" title=""></div>--}}
{{--                        <div class="r_text">--}}
{{--                            <h2 class="ellipsis1"><a target="_blank" href="info.html">北漂之旅～新的征程</a></h2>--}}
{{--                            <p class="ellipsis3">算算时间，现在应该是来北京的第六天了吧，当我一个人来到北京的时候，没有感觉这个城市有多么的“好”，也没有感受到电视机前北京的庄重，只是感觉一个人有些孤独罢了。其实仔细想想，我确实挺“虎”的，在只约了一个我确实挺“虎”的，在只约我确实挺“虎”的，在只约</p>--}}
{{--                            <div class="text_info">--}}
{{--                                <span><i id="user_ico" class="ico"></i>K先生</span>--}}
{{--                                <time><i id="time_ico" class="ico"></i>2019-12-01</time>--}}
{{--                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>124</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}

            </div>
        </div>
        <div class="col-md-3">
{{--            用户信息组件--}}
            @component('index.component.userInfo')
            @endcomponent

{{--            日期归档组件--}}
            @component('index.component.date')
            @endcomponent
{{--            热门文章组件--}}
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
            <aside class="d_none" style="margin-top: 15px;min-height: 120px;">
                <p class="div_top">友情链接</p>
                <ul class="link_ul">
                    <li><a href="http://daohang.lusongsong.com/" target="_blank" title="博客大全">博客大全</a></li>
                    <li><a href="http://www.gold404.cn/" target="_blank" title="K先生个人博客">K先生个人博客</a></li>
                    <li><a href="http://www.yuyinuo.cn/" target="_blank" title="于高衡的博客">于高衡的博客</a></li>
                    <li><a href="http://www.duola.vip/" target="_blank" title="哆啦日记">哆啦日记</a></li>
                </ul>
            </aside>
        </div>
    </div>
@endsection
{{--底部信息--}}
@section('footer')
    @parent
@endsection
{{--自定义js--}}
@section('myjs')
    @parent
    <script src="{{asset('static/index/js/swiper.min.js')}}"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            loop: true, // 循环模式选项
            autoplay: {
                delay: 4000,//5秒切换一次
            },
            // 如果需要分页器
            pagination: {
                el: '.swiper-pagination',
            },
            // 如果需要前进后退按钮
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        })
    </script>
@endsection