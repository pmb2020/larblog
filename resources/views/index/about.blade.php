@extends('layouts.index')
@section('title','关于我 - '.$smallTitle)
@section('keywords','关于我,K先生是谁,'.$config['web_keywords'])
@section('description','K先生是谁？K先生是一个掌握网站、小程序、webapp等开发技术的程序员，当然，也是一个精致boy')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div style="background-color: #fff;padding: 10px 15px;font-size: 14px;">
                <p style="color: #666;">当前位置：<a href="#">首页</a> > <a href="#">关于我</a></p>
            </div>
            <div class="content">
                <h2 class="line_h2">关于我———K先生</h2>
                <div class="user_info">
                    <span><i id="user_ico" class="ico"></i>林中鸟</span>
                    <time><i id="time_ico" class="ico"></i>2019-10-10</time>
                    <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>238</span>
                </div>
                <div class="blog_text">
                    <p>我，一个95后草根站长！17年入行。一直潜心研究web前端技术，一边工作一边积累经验，分享一些个人博客模板，以及SEO优化等心得</p>
                    <p>我，只是一个普通人。</p>
                    <p>把孤独当作晚餐却难以下咽</p>
                    <p>把黑夜当作温暖却难以入眠</p>
                    <p>只好对自己说晚安</p>
                    <p>无人在身边</p>
                    <p>想要遗忘却不心甘</p>
                    <p>把难过当作幻念都烟消云散</p>
                    <p>把感情当作红线全部都斩断</p>
                    <p>这时间好像都放慢</p>
                    <p>像度日如年</p>
                    <p>想要遗忘我还是不甘</p>
                    <p>......</p>
                </div>
                <div class="" style="text-align: center;margin: 10px;">
                    <button type="button" style="background-color: red;border: none;padding: 5px 10px;color: #fff;">👍赞一下（57）</button>
                </div>
            </div>
            <!-- 评论 -->
            <div style="background-color: #fff;margin-top: 15px;padding: 20px;margin-bottom: 15px;border-radius: 3px;">
                <p class="div_top">文章评论</p>
                <p style="color: #888;">暂无评论</p>
            </div>
        </div>
        <div class="col-md-3">
           @component('index.component.userInfo')
            @endcomponent

            @component('index.component.hotArticle')
               @endcomponent
        </div>
    </div>
@endsection
