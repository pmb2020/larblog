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
                <h2 class="line_h2">关于我</h2>
                <div class="blog_text">
                    <p><strong>网名：</strong>K先生</p>
                    <p><strong>职业：</strong>全栈开发工程师</p>
                    <p><strong>技能：</strong>PHP语言启蒙，熟练掌握Thinkphp和laravel框架，对前端技术也有着一定的研究，如前端的vue框架。</p>
                    <p><strong>我擅长的：</strong>PHP网站开发、小程序开发、H5 app软件开发、电脑端exe程序开发（vue）等等。</p>
                    <p><strong>简介：</strong>我，渴望大海！</p>
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
