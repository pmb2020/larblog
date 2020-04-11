@extends('layouts.admin')

@section('title','系统设置')

@section('style')
    <style>
        .table td, .table th{
            padding: 15px 8px;text-align: left;
        }
        .table tbody tr:hover{background: rgba(0,0,0,.075);}

    </style>
@endsection
@section('content')
    <div class="main" style="">
        <div class="main-content">
            <div class="main-top">
                <p class="mbaoxie"><a href="/">首页</a><span>/</span>系统设置</p>
                <p class="main-gg">公告：欢迎光临我的后台管理系统，我求求你嫁给我！</p>
            </div>
            <div class="box_padd30">
                <div class="main-box" style="overflow-x: unset;">
                    <ul class="tab_ul">
                        <li class="active">基本设置</li>
                        <li>评论设置</li>
                        <li>其他设置</li>
                    </ul>
                    <div class="tab_content">
                        <div class="tab-child" style="display: block;">
                            <form action="{{url('admin/config/save')}}" method="post">
                                @csrf
                                <div class="m_input_item set_input">
                                    <label>网站标题</label>
                                    <div class="m_input_box"><input name="web_title"  class="m_input" value="{{$config['web_title']}}" type="text" name="title"></div>
                                </div>
                                <div class="m_input_item set_input">
                                    <label>关键词</label>
                                    <div class="m_input_box"><input name="web_keywords" class="m_input" value="{{$config['web_keywords']}}" type="text" name="title"></div>
                                </div>
                                <div class="clear" style="margin: 15px 0;">
                                    <label style="float: left;width: 100px;">网站描述</label>
                                    <div class="m_input_box"><input name="web_desc" class="m_input" value="{{$config['web_desc']}}" type="text" name="title"></div>
                                </div>
                                <div class="m_input_item set_input">
                                    <label>默认作者</label>
                                    <div class="m_input_box"><input name="web_author" class="m_input" value="{{$config['web_author']}}" type="text" name="title"></div>
                                </div>
                                <div class="clear" style="margin: 15px 0;">
                                    <label style="float: left;width: 100px;">个人简介</label>
                                    <div class="m_input_box" style="height: 100px;">
                                        <textarea name="web_profile" class="m_textarea" placeholder="个人简介">{{$config['web_profile']}}</textarea>
                                    </div>
                                </div>
                                <div class="clear" style="margin: 15px 0;">
                                    <label style="float: left;width: 100px;">统计代码</label>
                                    <div class="m_input_box" style="height: 100px;">
                                        <textarea name="web_code" class="m_textarea" placeholder="第三方统计代码">{{$config['web_code']}}</textarea>
                                    </div>
                                </div>
                                <div class="m_input_item set_input">
                                    <label>备案号</label>
                                    <div class="m_input_box"><input name="web_icp" class="m_input" value="{{$config['web_icp']}}" type="text" name="title"></div>
                                </div>
                                <input class="m_btn" type="submit" value="保存" />
                            </form>
                        </div>
                        <div class="tab-child">
                            222
                        </div>
                        <div class="tab-child">
                            3
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('myjs')
    @if(Session::has('tip'))
        <script>msg("{{Session::get('tip')}}");</script>
    @endif
    <script type="text/javascript">
        var tab = document.getElementsByClassName('tab_ul')[0];
        var tabList = tab.getElementsByTagName('li');
        var tabChild = document.getElementsByClassName('tab-child');
        for (let i = 0; i < tabList.length; i++) {
            tabList[i].onclick = function() {
                tabInit()
                this.classList.add('active');
                tabChild[i].setAttribute('style', 'display:block');
            }
        }
        //初始化tab
        function tabInit() {
            for (let i = 0; i < tabList.length; i++) {
                tabList[i].classList.remove('active')
                tabChild[i].setAttribute('style', 'display:none')
            }
        }
    </script>
@endsection
