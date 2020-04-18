var url=window.location.href;
$(document).ready(function() {

	// 页面加载完毕，先判断cookie是否存在，决定是否显示小卡片
	if (getCookie('username')) {
		$('#avatar').attr('src', LetterAvatar(getCookie('username'), 50));
        $('#username').text(getCookie('username'));
        $('#email').text(getCookie('email'));
        $('#href').text(getCookie('href'));
		console.log('存在cookie');
		$('.create_com').css('display', 'none');
		$('.com_card').css('display', 'flex');
		setTimeout(function() {
			$('.com_card').css('transform', 'rotateY(360deg)');
		}, 10);
	} else {
		console.log('不存在cookie');
	}

	//点击回复事件
	$('.com_ul').on('click', '#replay', function(e) {
		// console.log('点击了回复');
        var ee=$(this).parents('.com_ul_bom').prevAll('.com_info_top').children('.replay_id').text();
		console.log(ee+'ssssssss')
        var name = $(this).parents('.com_ul_bom').prevAll('.com_info_top').children('#name1').text();
		if (!name) {
			name = $(this).parents('.com_two_div').children('p').children('#name2').text();
            var ee=$(this).parents('.com_two_div').children('p').children('.replay_id').text();
            console.log(ee+'ssssssss')
			if (!name) {
				alert('请刷新页面再回复本条内容！');
				location.reload();
			}
		}
		setCookie('replayname', name); //将要@的人存入cookie
		var replay_div = '<div class="replay_div"><input class="com_input" type="text" name="title" placeholder="回复 @ ' +
			name + ' : "/><div class="repaly_btn_div"><button class="replay_btn" id="twoReplay">回复</button></div></div>';
		if ($('.com_right .replay_div').length < 1) {
			$(this).parents('.com_ul_bom').after(replay_div);
			// console.log('要回复的人是：');
			// console.log(name);
		} else {
			//已经有回复框存在的情况
			// console.log('已经有回复框存在了');
			$(".replay_div").remove();
			$(this).parents('.com_ul_bom').after(replay_div);
		}
	})
	// 动态回复按钮监听
	$('.com_right').on('click', '.replay_btn', function(e) {
		if (getCookie('username')) {
			var replaytext = $(this).parents('.replay_div').children('input').val();
			console.log(replaytext);
			var replaycontent = '<li><div class="com_two_div"><p class="mb5"><a id="name2" href="#">' + getCookie('username') +
				' </a>回复 <a href="#">@' + getCookie('replayname') + '</a>：<span>' + replaytext +
				'</span></p><div class="com_ul_bom"><span>15分钟前</span><span id="replay">回复</span></div></div></li>';
			if (!replaytext == '') {
				// $(this).parents('.com_two').prepend(replaycontent);
				//判断是否存在二级com_two元素
				if ($(this).parents('.com_right').children('.com_two').length < 1) {
					replaycontent = '<ul class="com_two">' + replaycontent + '</ul>';
					$(this).parents('.com_right').append(replaycontent);
				} else {
					$(this).parents('.com_right').children('.com_two').prepend(replaycontent);
				}
				$(this).parents('.replay_div').remove();
				//ajax发送数据
                $.ajax({
                    type:'POST',
                    headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    url:'/comment/add',
                    data:{
                        username:getCookie('username'),
                        article_id:url.substring(url.indexOf('info/')+5),
                        username:getCookie('username'),
                        href:getCookie('href'),
                        email:getCookie('email'),
                        content:replaytext,
                        replay_id:''
                    },
                    success:function (res) {
                        console.log(res);
                    },error:function (res) {
                        console.log('回复失败了');
                    }
                })
			} else {
				alert('内容不能为空哦');
			}
			// alert(getCookie('replayname'));
			// console.log($(this).parents('.replay_div').children('input').val());
		} else {
			alert('请您先生成小名片');
		}
	})

	// 创建小名片按钮点击
	$('#create_btn').click(function() {
		var username = $("input[ name='username' ] ").val();
		var email = $("input[ name='email' ] ");
		var href = $("input[ name='href' ] ");
		var title = $("textarea[ name='title' ] ").val();
        href = href.val() || '无';
		email = email.val() || '无';
		if (!username) {
			alert('请先填写昵称哦！');
			return false;
		}
		// 验证通过，数据存入cookie，并生成小名片
		setCookie('username', username);
		setCookie('email', email);
		setCookie('href', href);
		$('#avatar').attr('src', LetterAvatar(username, 50));
		$('#username').text(username);
		$('#email').text(email);
		$('#href').text(href);
		$(this).remove();
		$('.create_com').css('display', 'none');
		$('.com_card').css('display', 'flex');
		setTimeout(function() {
			$('.com_card').css('transform', 'rotateY(360deg)');
		}, 10);

	})
})
function comment() {
	// console.log($('#form0').serialize());//ajax提交表单数据
	var title = $("textarea[ name='title' ] ").val();
	var time = '1秒前';
	if (title == '') {
		alert('评论内容不能为空哦!');
		return false;
	}
	if (getCookie('username')) {
		var username = getCookie('username');
		var email = getCookie('email');
		var href = getCookie('href');
	} else {
		alert('生成名片后，才能评论哦');
		return false;
	}
	var avatar_img = 'src="' + LetterAvatar(username, 50) + '" title="' + username + '" alt="' + username + '"';
	var com = '<li><img class="round" width="50" height="50" ' + avatar_img +
		'><div class="com_right" style=""><p class="com_info_top"><a href="#">' + username +
		'</a><span style="float: right;">顶（18）</span></p><p class="com_info_center" style="">' + title +
		'</p><div class="com_ul_bom"><span>' + time +
		'</span><span id="replay"><a href="javascript:void(0)">回复</a></span></div></div></li>';
	// $('.com_ul').prepend('<p>你好啊</p>')
	setCookie('username', username);
	console.log(getCookie('username')+'sssssss');
	$('.com_ul').prepend(com);

	//ajax提交数据到服务器
    $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:'/comment/add',
        data:{
            article_id:url.substring(url.indexOf('info/')+5),
            username:getCookie('username'),
            href:getCookie('href'),
            email:getCookie('email'),
            content:title,
        },
        success:function (res) {
            console.log(res);
        },error:function (res) {
            console.log('error');
        }
    })
}
//生成随机整数
function randomNum(minNum, maxNum) {
	switch (arguments.length) {
		case 1:
			return parseInt(Math.random() * minNum + 1, 10);
			break;
		case 2:
			return parseInt(Math.random() * (maxNum - minNum + 1) + minNum, 10);
			break;
		default:
			return 0;
			break;
	}
}
//设置cookie
function setCookie(name, value) {
	var Days = 30;
	var exp = new Date();
	exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
	document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}

// 读取cookie
function getCookie(name) {
	var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
	if (arr = document.cookie.match(reg))
		return unescape(arr[2]);
	else {
		return null;
	}
}
// 删除cookie
function delCookie(name) {
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval = getCookie(name);
	if (cval != null)
		document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}
//验证邮箱
function isEmail(email) {
	var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
	if (reg.test(email)) {
		return true;
	} else {
		return false;
	}
}
//简单验证url合法性
function checkUrl(url) {
	var reg = /^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/)(([A-Za-z0-9-~]+)\.)+([A-Za-z0-9-~\/])+$/;
	if (reg.test(url)) {
		return true;
	} else {
		return false;
	}
}
