@extends('layouts.admin')

@section('title','首页')

@section('style')
    <link rel="stylesheet" href="{{asset('static/admin/css/calender.css')}}">
@endsection

@section('content')
    <div class="main" style="">
        <div class="main-content">
            <div class="main-top">
                <p class="mbaoxie"><a href="index.blade.php">首页</a><span>/</span></p>
                <p class="main-gg">公告：欢迎光临我的后台管理系统，我求求你 ！</p>
            </div>
            <div class="box_padd30">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="my_card padd2045">
                            <i class="fa fa-book" aria-hidden="true" style="font-size: 50px;color: #ab8ce4;margin-right: 15px;"></i>
                            <p style="font-size: 16px;color: #888;display: inline-block;">
                                <span style="display: block;font-size: 20px;">2548</span>文章
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="my_card padd2045">
                            <i class="fa fa-user" aria-hidden="true" style="font-size: 50px;color: #ab8ce4;margin-right: 15px;"></i>
                            <p style="font-size: 16px;color: #888;display: inline-block;">
                                <span style="display: block;font-size: 20px;">58687</span>访客
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="my_card padd2045">
                            <i class="fa fa-commenting-o" aria-hidden="true" style="font-size: 50px;color: #ab8ce4;margin-right: 15px;"></i>
                            <p style="font-size: 16px;color: #888;display: inline-block;">
                                <span style="display: block;font-size: 20px;">6546</span>评论
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="my_card padd2045">
                            <i class="fa fa-gift" aria-hidden="true" style="font-size: 50px;color: #ab8ce4;margin-right: 15px;"></i>
                            <p style="font-size: 16px;color: #888;display: inline-block;">
                                <span style="display: block;font-size: 20px;">655</span>留言
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mar150">
                    <div class="col-md-8 padd015">
                        <div id="calendar">
                            <div id="ca"></div>
                        </div>
                    </div>
                    <div class="col-md-4 padd015">
                        <div class="my_card">
                            <p class="card-top">最近动态</p>
                            <div class="card-body">
                                <p>2019-01-18 您发表了《我的北漂之旅》</p>
                                <p>2019-01-16 您发表了《怎么快速建立个人博客》</p>
                                <p>2019-01-15 您发表了《青花瓷》</p>
                                <p>2019-01-15 您删除了《如果爱有天意》</p>
                                <p>2018-11-19 您发表了《如果爱有天意》</p>
                                <p>2018-11-16 您发表了《php实战教程》</p>
                                <p>2018-11-11 您第一次来到这里！</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myjs')
    <script src="{{asset('static/admin/js/calendar.js')}}"></script>

@endsection
