@extends('layouts.admin')

@section('title','评论管理')

@section('style')
@endsection
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="main-top">
                <p class="mbaoxie"><a href="/">首页</a><span>/</span>评论管理</p>
                <p class="main-gg">公告：欢迎光临我的后台管理系统，我求求你嫁给w我！</p>
            </div>
            <div class="box_padd30">
                <div class="main-box">
                    <ul class="ul_tag" style="border-bottom: 0;">
                        <li class="active"><a href="#">全部(54)</a></li>
                        <li><a href="#">我回复的(23)</a></li>
                    </ul>
                    <ul class="list_ul">
                        <li>
                            <div class="com_p">
                                <span class="com_name">一瓶二锅头</span>
                                <span class="com_time">8小时前</span>
                                评论你的文章<a class="blue_a" href="#">php引用变量就是这么简单</a>
                                <div class="com_a_box">
                                    <a class="del_a" href="javascript:if(confirm('确认要删除吗?'))location='jb51.php?id='">删除</a>
                                    <a href="#">回复</a>
                                </div>
                            </div>
                            <div class="com_title">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                &nbsp;&nbsp;这个牛&nbsp;&nbsp;
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                        </li>
                        <li>
                            <div class="com_p">
                                <span class="com_name">一瓶二锅头</span>
                                <span class="com_time">8小时前</span>
                                评论你的文章<a class="blue_a" href="#">javascript控制文本显示一行半，超出显示省略号</a>
                                <div class="com_a_box">
                                    <a class="del_a" href="#">删除</a>
                                    <a href="#">回复</a>
                                </div>
                            </div>
                            <div class="com_title">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                &nbsp;&nbsp;欢迎光临我的真的太好用了，谢谢博主&nbsp;&nbsp;
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                        </li>
                        <li>
                            <div class="com_p">
                                <span class="com_name">一瓶二锅头</span>
                                <span class="com_time">8小时前</span>
                                评论你的文章<a class="blue_a" href="#">css垂直居中最常用的七种布局方法（入门级）</a>
                                <div class="com_a_box">
                                    <a class="del_a" href="#">删除</a>
                                    <a href="#">回复</a>
                                </div>
                            </div>
                            <div class="com_title">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                &nbsp;&nbsp;欢迎光临我的真的太好用了，谢谢博主&nbsp;&nbsp;
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                        </li>
                        <li>
                            <div class="com_p">
                                <span class="com_name">一瓶二锅头</span>
                                <span class="com_time">8小时前</span>
                                评论你的文章<a class="blue_a" href="#">Linux虚拟机配置网络</a>
                                <div class="com_a_box">
                                    <a class="del_a" href="#">删除</a>
                                    <a href="#">回复</a>
                                </div>
                            </div>
                            <div class="com_title">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                &nbsp;&nbsp;谢谢大佬&nbsp;&nbsp;
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                        </li>
                        <li>
                            <div class="com_p">
                                <span class="com_name">一瓶二锅头</span>
                                <span class="com_time">8小时前</span>
                                评论你的文章<a class="blue_a" href="#">利用VMware虚拟机搭建Linux学习环境</a>
                                <div class="com_a_box">
                                    <a class="del_a" href="#">删除</a>
                                    <a href="#">回复</a>
                                </div>
                            </div>
                            <div class="com_title">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                &nbsp;&nbsp;实用&nbsp;&nbsp;
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                        </li>
                        <li>
                            <div class="com_p">
                                <span class="com_name">一瓶二锅头</span>
                                <span class="com_time">8小时前</span>
                                评论你的文章<a class="blue_a" href="#">php引用变量就是这么简单</a>
                                <div class="com_a_box">
                                    <a class="del_a" href="#">删除</a>
                                    <a href="#">回复</a>
                                </div>
                            </div>
                            <div class="com_title">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                &nbsp;&nbsp;欢迎光临我的真的太好用了，谢谢博主&nbsp;&nbsp;
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                        </li>
                        <li>
                            <p class="com_p">
                                <span class="com_name">一瓶二锅头</span><span class="com_time">8小时前</span>评论你的文章<a class="blue_a" href="#">由于找不到MSVCR110.dll,无法继续执行代码........启动的解决方法</a>
                            </p>
                            <div class="com_title">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                &nbsp;&nbsp;真的太好用了，谢谢博主&nbsp;&nbsp;
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                                <div class="com_a_box">
                                    <a href="#">回复</a>
                                    <a href="#">删除</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('myjs')
    @if(Session::has('tip'))
        <script>msg("{{Session::get('tip')}}");</script>
    @endif

@endsection
