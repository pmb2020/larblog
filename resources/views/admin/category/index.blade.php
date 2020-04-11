@extends('layouts.admin')

@section('title','分类管理')

@section('style')
    <style>
        .table td, .table th{
            padding: 15px 8px;text-align: left;
        }
        .table tbody tr:hover{background: rgba(0,0,0,.075);}

    </style>
@endsection
@section('content')
    <!-- 弹出模态框 -->
    <div id="modal" class="hide">
        <div class="modal_content">
            <div class="modal_header">
                <p>新增分类 <button class="btn close_btn" type="button" onclick="modalClose()">关闭</button></p>
            </div>
            <div class="modal_body">
                <form class="form_temp1" action="#" method="post">
                    <div class="m_input_item">
                        <label>分类名:</label>
                        <div class="m_input_box"><input class="m_input" type="text" name=""></div>
                    </div>
                    <div class="m_input_item">
                        <label>关键词:</label>
                        <div class="m_input_box"><input class="m_input" type="text" name=""></div>
                    </div>
                    <div class="m_input_item">
                        <label>描述:</label>
                        <div class="m_input_box"><input class="m_input" type="text" name=""></div>
                    </div>
                    <div class="m_input_item">
                        <label>排序:</label>
                        <div class="m_input_box"><input class="m_input" type="text" name=""></div>
                    </div>
                    <div class="m_input_item">
                        <label></label>
                        <div class="m_input_box"><input class="m_btn" type="submit" value="提交" /></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="main-content">
            <div class="main-top">
                <p class="mbaoxie"><a href="/">首页</a><span>/</span>文章列表</p>
                <p class="main-gg">公告：欢迎光临我的后台管理系统，我求求你！</p>
            </div>
            <div class="box_padd30">
                <div class="main-box">
                    <div>
                        <span class="cate_txt">分类列表</span>
                        <button  class="btn add_btn" type="button" onclick="modalShow()">新增分类 +</button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>名称</th>
                            <th>关键词</th>
                            <th>描述</th>
                            <th>状态</th>
                            <th>排序</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->keywords}}</td>
                                <td>{{$category->description}}</td>
                                <td>正常</td>
                                <td>1</td>
                                <td>
                                    <button class="btn edit_btn" type="button">编辑</button>
                                    <button class="btn del_btn" type="button">删除</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li class="disabled"><span>«</span></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
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
