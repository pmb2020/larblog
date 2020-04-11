<aside class="admin_info d_none">
    <div style="position: relative;margin-bottom: 55px;">
        <img width="100%" height="125px" src="{{asset('static/index/images/bg2.png')}}" alt="">
        <img style="position: absolute;left: 36.8%;bottom: -42px;border-radius: 50%;height: 100px;" src="{{asset('static/index/images/avatar.jpg')}}">
    </div>
    <div class="info_text">
        <p class="abname">{{$config['web_author'] ?? '七墨先生'}}</p>
{{--        <p class="abposition">Web前端设计师、网页设计</p>--}}
        <p class="abtext">{{$config['web_profile']}}</p>
    </div>
{{--    <ul class="info_web">--}}
{{--        <li><span>45</span><p>文章</p></li>--}}
{{--        <li><span>20</span><p>评论</p></li>--}}
{{--        <li><span>670</span><p>浏览</p></li>--}}
{{--    </ul>--}}
</aside>
