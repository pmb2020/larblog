<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>后台登录页面</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="stylesheet" type="text/css" href="{{asset('static/admin/css/base.css')}}" />
	</head>
	<body>
		<div class="login_div">
			<div class="login_box">
				<div class="login_img">
					<img src="{{asset('static/admin/images/logoImg.png')}}" >
				</div>
				<form action="{{ url('admin/checkLogin') }}" method="post">
                    @csrf
					<label style="display: block;">用户名</label>
					<div class="login_input_div">
						<input class="form-control" type="text" name="username" id="" placeholder="账号" />
					</div>
					<label style="display: block;">密码</label>
					<div class="login_input_div">
						<input class="form-control" type="password" name="password" id="" placeholder="密码" />
					</div>
					<input type="submit" class="login_btn"  value="登录"/>
				</form>
				<!-- <button type="button" class="login_btn" onclick="test('删除成功!')" >特殊</button> -->
			</div>
		</div>
	<script src="{{asset('static/admin/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="{{asset('static/admin/js/base.js')}}"></script>
        @if(Session::has('tip'))
            <script>msg("{{Session::get('tip')}}");</script>
        @endif
	<script>
		function test(value){
			// alert(value);
			// document.body.appendChild("<h1>222222222222222222</h1>");
			// var body1=document.getElementsByTagName('body')[0];
			// console.log(body1);
			// var li=document.createElement("div");
			// li.innerHTML="<a href=\'#\'class=\'a1\'>超链接</a>";
			// document.body.appendChild(li);
			// body1.innerHTML="<h1>222222222222222222</h1>";
			// body1.appendChild(li);
			// document.body.innerHTML += '<a href=\'#\'class=\'a1\'>超链接</a>';
			value +=value;
			msg(value);
			// document.body.innerHTML += '<div id=\'msg\'><span>'+value+'</span></div>';
			// console.log(document.getElementById('msg'));
			// return false;
		}
	</script>
	</body>
</html>
