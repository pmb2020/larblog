@extends('layouts.admin')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('static/admin/lib/simditor/css/simditor.css')}}"/>
    <style>
        #preview{max-height: 150px}
    </style>
@endsection

@section('title','发表文章')

@section('content')
    <div class="main" style="">
        <div class="main-content">
            <div class="main-top">
                <p class="mbaoxie"><a href="/">首页</a><span>/</span>写文章</p>
                <p class="main-gg">公告：欢迎光临我的后台管理系统，我求求你嫁给w我！</p>
            </div>
            <div class="box_padd30">
                <div class="main-box">
                    <!-- <label>标题：</label>
                    <div style="width: 40%;display: inline-block;">
                        <input class="form-control" type="text" name="" id="" placeholder="标题" />
                    </div> -->
                    <form action="#" method="POST">
                        @csrf
                        <div class="m_input_item">
                            <label>标题:</label>
                            <div class="m_input_box"><input class="m_input" required type="text" name="title"></div>
                        </div>
                        <div class="m_input_item">
                            <label>类别：</label>
                            <select id="select1" name="category_id" class="m_select">
                                @foreach($Categorys as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <div id="stype" style="display: none">
                                <label>小分类：</label>
                                <select id="select2"  name="category_id" class="m_select">
                                </select>
                            </div>
                        </div>
                        <div class="simeditor_div" style="display: flex;margin: 30px 0;">
                            <label style="width: 60px;">内容：</label>
                            <textarea id="editor" required name="content" autofocus></textarea>
                        </div>
                        <div class="m_input_item">
                            <label>关键词:</label>
                            <div class="m_input_box"><input class="m_input" required type="text" placeholder="英文逗号隔开" name="keywords"></div>
                        </div>
                        <div class="m_input_item">
                            <label>摘要:</label>
                            <div class="m_input_box"><input class="m_input" type="text" placeholder="选填" name="description"></div>
                        </div>
                        <div class="m_input_item" style="height: 180px">
                            <label>封面:</label>
                            <input type="hidden" id="img_url"  name="cover">
                            <div id="drop_area" class="m_input_box"></div>
                        </div>

                        <div class="m_input_item">
                            <label></label>
                            <button id="fb_btn" class="m_btn" type="submit">发布</button>
                            <button class="m_btn" type="button">存草稿</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myjs')
    <script src="{{asset('static/admin/js/upload.js')}}"></script>
    <script src="{{asset('static/admin/lib/simditor/js/module.js')}}"></script>
    <script src="{{asset('static/admin/lib/simditor/js/hotkeys.js')}}"></script>
    <script src="{{asset('static/admin/lib/simditor/js/uploader.js')}}"></script>
    <script src="{{asset('static/admin/lib/simditor/js/simditor.js')}}"></script>
    <script>
        $(function(){
            var editor = new Simditor({
                textarea: $('#editor'),
                toolbar: [
                    'title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale',
                    'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link',
                    'image', 'hr', '|', 'alignment'
                ],
                placeholder:'写点什么呢......',
                defaultImage:'/static/admin/images/author.png',//插入图片显示的默认图片
                params:{
                    'key':'s'
                },//在textarea中插入一个隐藏的输入以存储参数
                pasteImage:true,//是否允许直接粘贴图片
                cleanPaste:false,//自动删除粘贴内容中的所有样式
                upload:{
                    url:'{{ url('/admin/article/imagesUpload') }}',
                    params:null,
                    fileKey:'file',//后台接收图片需要
                    connectionCount:3,//允许同时上传图片数
                    leaveConfirm:'正在上传图片',//如果在上传文件时离开页面，则会显示此消息；
                }
            });
            // editor.setValue ('hello world');
            // console.log(editor.getValue());
            console.log('sssssssssssss');

            categoryInit($('#select1').val());//初始化分类选项框
            $('#select1').change(function (e) {
                let index=$(this).val();
                categoryInit(index);
            })

            // 初始化分类选择框
            function categoryInit(index) {
                var mySelect = document.getElementById("select2");
                var addOption = function(select,txt,value,num){
                    select.add(new Option(txt,value),num);
                };
                // ajax获取子分类
                $.ajax({
                    url:'/admin/getChildCategory/'+index,
                    type:'GET',
                    success:function (data) {
                        // console.log(data.data[0].name);
                        if(data.code==200){
                            if (!data.data.length > 0){
                                $('#stype').css('display', 'none');
                            }else{
                                mySelect.innerHTML='';
                                for (let i=0;i<data.data.length;i++){
                                    addOption(mySelect,data.data[i].name,data.data[i].id);
                                }
                                $('#stype').css('display', 'inline-block');
                            }
                        }
                    },
                    error:function (data) {
                        console.log(data)
                    }
                })
            }


        });
    </script>
    <script type="text/javascript">
        var file='';
        var dragImgUpload = new DragImgUpload("#drop_area",{
            callback:function (files) {
                //回调函数，可以传递给后台等等
                var file = files[0];
                // console.log(file);
                var formdata = new FormData();
                formdata.append("file" , file);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'{{ url('/admin/article/coverUpload') }}',
                    type:'POST',
                    data:formdata,
                    dataType:'json',
                    processData: false,// 不处理数据
                    contentType: false,//不设置Content-Type请求头
                    success:function (data) {
                        console.log(data);
                        console.log(data['file_path']);
                        // console.log(typeof(JSON.parse(data)));
                        // var img_url=JSON.parse(data)['data'][0].slice(16);
                        $('#img_url').val(data['file_path']);
                        // console.log('成功1111');
                    },
                    error:function (data) {
                        console.log('图片上传失败');
                    }

                })
            }
        })
    </script>
@endsection
