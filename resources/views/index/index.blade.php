@extends('layouts.index')

@section('title',$config['web_title'])
@section('keywords',$config['web_keywords'] )
@section('description',$config['web_desc'])

{{--主体内容--}}
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="banner" id="banner" style="margin: 0px auto;">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#"><img alt="爱技术" src="{{asset('static/index/images/banner1.jpg')}}" ></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img alt="爱分享" src="{{asset('static/index/images/banner2.jpg')}}" ></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img alt="爱生活" src="{{asset('static/index/images/banner3.jpg')}}" ></a>
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
                @foreach($recommends0 as $recommend0)
                    <li><a href="{{url('/info',[$recommend0['article_id']])}}"><p class="flex1 ellipsis1"><i></i>{{$recommend0['title']}}</p><time>{{$recommend0['created_at']}}</time></a></li>
                @endforeach
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
                                    <span><i id="user_ico" class="ico"></i>{{$config['web_author']}}</span>
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
{{--            用户信息组件--}}
            @component('index.component.userInfo')
            @endcomponent

{{--            日期归档组件--}}
            @component('index.component.date',['dateGuidangs'=>$dateGuidangs])
            @endcomponent
{{--            热门文章组件--}}
            @component('index.component.hotArticle')
            @endcomponent
{{--            随机推荐文章--}}
            @component('index.component.randArticle')
            @endcomponent
            <aside class="d_none" style="margin-top: 15px;min-height: 120px;">
                <p class="div_top">友情链接</p>
                <ul class="link_ul">
                    <li><a href="http://daohang.lusongsong.com" target="_blank" title="博客大全">博客大全</a></li>
                    <li><a href="http://www.duola.vip" target="_blank" title="哆啦日记">哆啦日记</a></li>
                    <li><a href="https://www.myong.top" target="_blank">My.Yong博客</a></li>
                    <li><a href="https://ijackey.com" target="_blank">gopher博客</a></li>
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
