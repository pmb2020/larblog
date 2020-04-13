<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') - 迷鹿后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/lib/fonticon/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/css/base.css')}}">
    @section('style')
    @show
</head>
<body>
{{--头部--}}
<header class="header">
    <div class="header_l" style="">
        <div class="logo">
            <a href="#"><img src="{{asset('static/admin/images/logo.png')}}" /></a>
        </div>
        <button id="bar" style="">
            <i class="fa fa-bars" aria-hidden="true" style="font-size: 28px;color: #fff;"></i>
        </button>
    </div>
    <div class="header_r" style="">
        <ul class="header_ul ">
            <li><i class="fa fa-bell-o icon_fff min_num" aria-hidden="true"><span>2</span></i></li>
            <li id="avatar">
                <img src="{{asset('static/admin/images/author.png')}}">
                <span class="header_name d-none">管理员</span>
                <i class="fa fa-sort-desc icon_fff d-none" aria-hidden="true"></i>
                <div class="avatar_box" style="display: none;">
                    <ul>
                        <li><a href="../login.html">登录</a></li>
                        <li><a href="{{ url('admin/loginOut') }}">退出</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</header>

{{--侧边导航栏--}}
<nav class="nav mw0">
    <ul class="nav_ul">
        <li><a class="{{Request::getPathinfo()=='/admin/index'?'active':''}}" href="{{ url('admin/index') }}"><i class="fa fa-home fa-fw"></i>后台首页</a></li>
        <li><a class="{{Request::getPathinfo()=='/admin/article/index'?'active':''}}" href="{{ url('admin/article/index') }}"><i class="fa fa-book fa-fw"></i>文章管理</a></li>
        <li><a class="{{Request::getPathinfo()=='/admin/article/create'?'active':''}}" href="{{ url('admin/article/create') }}"><i class="fa fa-table fa-fw"></i>发表文章</a></li>
        <li><a class="{{Request::getPathinfo()=='/admin/category'?'active':''}}" href="{{ url('admin/category') }}"><i class="fa fa-table fa-fw"></i>分类管理</a></li>
        <li><a href="#"><i class="fa fa-tags fa-fw"></i>标签管理</a></li>
        <li><a class="{{Request::getPathinfo()=='/admin/comment'?'active':''}}" href="{{ url('admin/comment') }}"><i class="fa fa-comments fa-fw"></i>评论管理</a></li>
        <li><a  href="#"><i class="fa fa-link fa-fw"></i>友链管理</a></li>
        <li><a  href="#"><i class="fa fa-area-chart fa-fw"></i>网站统计</a></li>
        <li><a class="{{Request::getPathinfo()=='/admin/config'?'active':''}}" href="{{ url('admin/config') }}"><i class="fa fa-cog fa-fw"></i>系统设置</a></li>
    </ul>
</nav>

{{--主体内容--}}
@section('content')
@show
<script src="{{asset('static/admin/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('static/admin/js/base.js')}}"></script>
@if(Session::has('tip'))
    <script>msg("{{Session::get('tip')}}");</script>
@endif
{{--自定义js--}}
@section('myjs')
@show
</body>
</html>
