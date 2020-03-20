@extends('layouts.admin')

@section('title','文章列表')

@section('style')
<style>
    .pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }
    .page-item{display: inline;margin-bottom: 0!important;padding-bottom: 0!important;border-bottom: 0!important;}
    .page-link{margin: 0 4px;;color: black;float: left;padding: 5px 18px;transition: background-color .3s;border: 1px solid #ddd;}
    .pagination li:first-child .page-link{border-top-left-radius: 5px;border-bottom-left-radius: 5px;}
    .pagination li:last-child .page-link{border-top-right-radius: 5px;border-bottom-right-radius: 5px;}
    .page-item a:hover:not(.active) {background-color: #ddd;}
    .pagination .active span{background-color: #2f323e;color: white;}
</style>
@endsection
@section('content')
    <div class="main" style="">
        <div class="main-content">
            <div class="main-top">
                <p class="mbaoxie"><a href="/">首页</a><span>/</span>文章列表</p>
                <p class="main-gg">公告：欢迎光临我的后台管理系统，我求求你！</p>
            </div>
            <div class="box_padd30">
                <div class="main-box">
                    <ul class="ul_tag">
                        <li class="active"><a href="#">全部(54)</a></li>
                        <li><a href="#">公开(45)</a></li>
                        <li><a href="#">私密(12)</a></li>
                        <li><a href="#">草稿箱(5)</a></li>
                    </ul>
                    <ul class="list_ul">
                        @foreach($articles as $article)
                        <li>
                            <h2 class="list_title"><a target="_blank" href="{{url('/info/'.$article->id)}}">{{$article -> title}}</a></h2>
                            <div class="list_info">
                                <div class="list_info_left">
                                    <span>原创</span>
                                    <span>爱生活</span>
                                    <span>{{$article -> updated_at}}</span>
                                    <span><i class="fa fa-eye" aria-hidden="true"></i>{{$article -> read_num}}</span>
                                    <span><i class="fa fa-commenting-o" aria-hidden="true"></i>{{$article -> commnet_num}}</span>
                                </div>
                                <div class="list_info_right">
                                    <a class="d-none" href="#">设为私密</a>
                                    <a class="d-none" href="#">编辑</a>
                                    <a class="del_a" href="{{ url('admin/article/delete',[$article->id]) }}" onclick="if(confirm('确定要删除吗？')==false) return false">删除</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        {{ $articles->links() }}
{{--                        <li>--}}
{{--                            <h2 class="list_title"><a href="#">php引用变量这样理解最简单php引用变量这样理解最简单</a></h2>--}}
{{--                            <div class="list_info">--}}
{{--                                <div class="list_info_left">--}}
{{--                                    <span>原创</span>--}}
{{--                                    <span>2019年08月08日 13:05:01</span>--}}
{{--                                    <span><i class="fa fa-eye" aria-hidden="true"></i>5467</span>--}}
{{--                                    <span><i class="fa fa-commenting-o" aria-hidden="true"></i>48</span>--}}
{{--                                </div>--}}
{{--                                <div class="list_info_right">--}}
{{--                                    <a class="d-none" href="#">设为私密</a>--}}
{{--                                    <a class="d-none" href="#">编辑</a>--}}
{{--                                    <a class="del_a" href="#">删除</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}

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
