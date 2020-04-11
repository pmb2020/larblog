<aside class="d_none" style="margin-top: 15px;">
    <p class="div_top">热门文章</p>
    @foreach($hotArticles as $hotArticle)
        <div class="flex_img min_img_p" style="margin-bottom: 15px;">
            <a style="display: contents" href="{{url('/info',[$hotArticle['id']])}}" target="_blank" >
            <img src="{{asset($hotArticle['cover'])}}" alt="{{$hotArticle['title']}}">
            <div class="r_text">
                <h3 class="ellipsis2">{{$hotArticle['title']}}</h3>
                <p class="bottom_num"><time>{{$hotArticle['created_at']}}</time><span>浏览 {{$hotArticle['read_num']}}</span></p>
            </div>
            </a>
        </div>
    @endforeach

{{--    <div class="flex_img min_img_p" style="margin-bottom: 15px;">--}}
{{--        <img style="" src="{{asset('static/index/images/default.jpg')}}">--}}
{{--        <div class="r_text">--}}
{{--            <h3 class="ellipsis2"><a href="/info/24.html" target="_blank" title="K先生：今天不谈技术，来聊聊心情">K先生：今天不谈技术，来聊聊心情</a></h3>--}}
{{--            <p class="bottom_num"><time>2018-12-12</time><span>浏览 289</span></p>--}}
{{--        </div>--}}
{{--    </div>--}}

</aside>
