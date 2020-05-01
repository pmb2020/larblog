@extends('layouts.index')

@section('title','留言板 - '.$smallTitle)
@section('keywords','留言板,'.$config['web_keywords'])
@section('description','有朋自远方来，来和K先生聊聊天吧')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <p class="top_nav_P">
                您现在的位置是：<a href="/">首页</a> > <a href="/">留言板</a>
                <span class="f_r music_p d_none">有朋自远方来，不亦乐乎！</span>
            </p>
            <div style="">
                <section class="section" style="min-height: 300px">
                    <p>留言功能正在完善中......</p>
                </section>
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
