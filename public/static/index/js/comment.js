// 定义全局变量
var isInit=false;//是否使用ajax初始化
var article_id = document.getElementsByName('article_id')[0].value || 0;// 当前文章id,可通过url获取，或者隐藏的input
var getCommentApi="http://www.gold404.cn/api/comment/"+article_id;//一般配合文章id
var replayComApi='http://www.gold404.cn/comment/add';//回复所需接口，后期考虑参数映射
/*
 * LetterAvatar
 *
 * Artur Heinze
 * Create Letter avatar based on Initials
 * based on https://gist.github.com/leecrossley/6027780
 */
(function(w, d) {
	function LetterAvatar(name, size, color) {
		name = name || '';
		size = size || 60;
		var colours = [
				"#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
				"#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
			],
			nameSplit = String(name).split(' '),
			initials, charIndex, colourIndex, canvas, context, dataURI;
		// console.log(nameSplit)
		if (nameSplit.length == 1) {
			initials = nameSplit[0] ? nameSplit[0].charAt(0) : '?';
		} else {
			initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
		}
		if (w.devicePixelRatio) {
			size = (size * w.devicePixelRatio);
		}

		charIndex = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
		colourIndex = charIndex % 20;
		canvas = d.createElement('canvas');
		canvas.width = size;
		canvas.height = size;
		context = canvas.getContext("2d");

		context.fillStyle = color ? color : colours[colourIndex - 1];
		context.fillRect(0, 0, canvas.width, canvas.height);
		context.font = Math.round(canvas.width / 2) + "px Arial";
		context.textAlign = "center";
		context.fillStyle = "#FFF";
		context.fillText(initials, size / 2, size / 1.5);

		dataURI = canvas.toDataURL();
		canvas = null;

		return dataURI;
	}

	LetterAvatar.transform = function() {

		Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name, color) {
			name = img.getAttribute('avatar');
			color = img.getAttribute('color');
			img.src = LetterAvatar(name, img.getAttribute('width'), color);
			img.removeAttribute('avatar');
			img.setAttribute('alt', name);
		});
	};


	// AMD support
	if (typeof define === 'function' && define.amd) {

		define(function() {
			return LetterAvatar;
		});

		// CommonJS and Node.js module support.
	} else if (typeof exports !== 'undefined') {
		// Support Node.js specific `module.exports` (which can be a function)
		if (typeof module != 'undefined' && module.exports) {
			exports = module.exports = LetterAvatar;
		}
		// But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
		exports.LetterAvatar = LetterAvatar;
	} else {
		window.LetterAvatar = LetterAvatar;
		d.addEventListener('DOMContentLoaded', function(event) {
			LetterAvatar.transform();
		});
	}
})(window, document);

window.onload = function() {
	if (getCookie('username')) {
		let comCard = document.getElementsByClassName('com_card')[0];
		document.getElementsByClassName('create_btn')[0].remove();
		comCard.children[0].setAttribute('src', LetterAvatar(getCookie('username'), 60));
		comCard.children[1].innerText = '欢迎您，'+getCookie('username');
		comCard.style.display = 'flex';
		setTimeout(function() {
			comCard.style.transform = 'rotateY(360deg)';
		}, 100);
	} else {
		document.getElementsByClassName('create_btn')[0].style.display = 'block'
	}
	if(isInit){
		console.log('我要开始初始化数据了'+isInit);
		ajax({
			url: getCommentApi,
			type: 'get',
			dataType: 'json',
			timeout: 10000,
			contentType: "application/json",
			success: function(data) {
				data = JSON.parse(data);
				console.log(data);
				initComment(data);
			},
			//异常处理
			error: function(e) {
				console.log(e);
			}
		})
	}

	function initComment(data) {
		let len = data.length;
		if (len < 1) {
			return false
		}
		let com_ul = document.createElement('ul');
		var com_li = '';
		com_ul.setAttribute('class', 'com_ul');
		for (let i = 0; i < len; i++) {
			// console.log(data[i].replaydata)
			let replaydata = data[i].replayData;
			let replayStr = '';
			if (replaydata.length >= 1) {
				for (let i = 0; i < replaydata.length; i++) {
					replayStr = replayStr + '<li><p style="margin-bottom: 10px;"><a href="#">' + replaydata[i].username +
						'</a><span class="com_mark">站长</span>：<span>' +
						replaydata[i].content +
						'</span></p><p style="font-size: 12px;"><span>' + replaydata[i].time +
						'</span><span style="margin-left: 15px;">来自Chrome浏览器</span></p></li>';
				}
				replayStr = '<ul class="com2_ul">' + replayStr + '</ul>';
			}
			com_li = com_li + '<li><img class="round" src="' + LetterAvatar(data[i].username, 60) +
				'" avatar=""><div class="com_right"><div class="comTop"><a href="' + data[i].href + '">' + data[i].username +
				'<span class="com_lou">2#</span></a><button class="zan_btn" type="button" onclick="dianzan(this)"><img src="img/zan1.png"><span>8</span></button></div><p class="com_p">' +
				data[i].content + '</p><div class="comBom"><span>' + data[i].time + '</span><span>来自' + data[i].username +
				'浏览器</span><a class="replay" href="javascript:void(0)" onclick="replayBox(this,' + data[i].id + ')">回复</a></div>' +
				replayStr + '</div></li>';
		}
		com_ul.innerHTML = com_li;
		com_list = document.getElementsByClassName('com_list')[0];
		com_list.appendChild(com_ul);
	}
}
// 发表评论
function comment() {
	let content = document.getElementsByName('content')[0].value;
	if (!content) {
		tip('内容不能为空！');
		return false;
	}
	let username = getCookie('username');
	let email = getCookie('email');
	let href = getCookie('href');
	if (!username) {
		tip('请先生成名片！');
		return false;
	}
	// 防止刷评论（一分钟最多三条，三条后五分钟内不能发）
	let count = getCookie('count');
	if (count) {
		if (count >= 3) {
			tip('您真的有那么多话说嘛？不如先歇息一会吧！');
			setCookie('count', ++count, 5 * 60);
			return false;
		} else {
			setCookie('count', ++count, 60);
		}
	} else {
		setCookie('count', 1, 10);
	}
	let avatar = username;
	let liulanqi = getExploreName();
	ele = document.createElement("li");
	ele.innerHTML = '<img class="round" src="' + LetterAvatar(avatar, 60) +
		'" avatar=""><div class="com_right"><div class="comTop"><a href="' + href + '">' + username +
		'<span class="com_lou">2#</span></a><button class="zan_btn" type="button"><img src="img/zan1.png"><span>8</span></button></div><p class="com_p">' +
		content + '</p><div class="comBom"><span>1秒前</span><span>来自' + liulanqi + '浏览器</span></div></div>';
	com_ul = document.getElementsByClassName('com_ul')[0];
	com_ul.prepend(ele);

	// 开始Ajax吧
	// console.log(username)
	// console.log(email)
	// console.log(href)
	// console.log(content)
	// console.log(liulanqi)
	//基本的使用实例
	ajax({
		url: replayComApi,
		type: 'post',
		data: {
			username: username,
			content: content,
			href: href,
			email: email,
			article_id: article_id
		},
		dataType: 'json',
		timeout: 10000,
		contentType: "application/json",
		success: function(data) {
			// console.log(data); //服务器返回响应，根据响应结果，分析是否登录成功
			tip('评论成功！');
			document.getElementsByName('content')[0].value = '';
		},
		//异常处理
		error: function(e) {
			console.log(e);
		}
	})


}

//点击回复出现回复框
function replayBox(e, index) {
	console.log('id为' + index)
	ele = document.createElement('div');
	ele.setAttribute('id', 'replay_box');
	ele.setAttribute('class', 'com_area_div');
	// ele.innerHTML='<div id="replay_box" class="com_area_div"><textarea name="replay_content" placeholder="我也要说......"></textarea><div class="area_bom"><img src="img/emoji.png"><input class="com_btn" type="button" onclick="replay(this)" value="回复" /></div></div>';
	ele.innerHTML =
		'<textarea name="replay_content" placeholder="我也要说......"></textarea><div class="area_bom"><img src="img/emoji.png"><input class="com_btn" type="button" onclick="replay(this,' +
		index + ')" value="回复" /></div>';
	replay_box = document.getElementById('replay_box');
	if (replay_box) {
		replay_box.parentNode.removeChild(replay_box);
	}
	e.parentNode.appendChild(ele);
	// console.log(replay_box)
	// alert(this.app)
}
//评论回复
function replay(e, index) {
	replay_ele = document.getElementsByName('replay_content')[0];
	replay_content = replay_ele.value; //回复的内容
	if (!replay_content) {
		alert('内容不能为空');
		return false;
	}
	// console.log(e.parentNode.parentNode.parentNode);
	ele = document.createElement('li');
	eleStr = '<p style="margin-bottom: 10px;"><a href="#">无极剑圣</a><span class="com_mark">站长</span>：<span>' +
		replay_content +
		'</span></p><p style="font-size: 12px;"><span>1秒前</span><span style="margin-left: 15px;">来自Chrome浏览器</span></p>';
	ele.innerHTML = eleStr;

	// 判断这个评论下是否已经有了二级评论,没有会找不到com2_ul,所以判断
	eleTemp = e.parentNode.parentNode.parentNode;
	if (eleTemp.nextElementSibling) {
		eleTemp.nextElementSibling.prepend(ele)
	} else {
		eleUl = document.createElement('ul');
		eleUl.setAttribute('class', 'com2_ul');
		eleUl.innerHTML = '<li>' + eleStr + '</li>'
		eleTemp.parentNode.appendChild(eleUl);
	}
	// com2_ul.prepend(ele)
	console.log('回复的内容为：' + replay_ele.value);
	// 移除回复框
	replay_ele.parentNode.parentNode.removeChild(replay_ele.parentNode);
	console.log('ajax要回复的id为' + index)
	// Ajax该你登场了
	// replay_ele.value='';

	//基本的使用实例
	ajax({
		url: "http://www.larblog.wang/comment/add",
		type: 'post',
		data: {
			username: getCookie('username'),
			content: replay_ele.value,
			href: getCookie('href'),
			email: getCookie('email'),
			article_id: article_id,
			replay_id: index
		},
		dataType: 'json',
		timeout: 10000,
		contentType: "application/json",
		success: function(data) {
			// console.log(data); //服务器返回响应，根据响应结果，分析是否登录成功
			tip('评论成功！')
		},
		//异常处理
		error: function(e) {
			console.log(e);
		}
	})

}
// 创建身份
function createCard(e) {
	if (!navigator.cookieEnabled) {
		console.log('cookie未启用，功能将受限！');
		return false;
	}
	// 存cookie
	let msg = isGood();
	if (msg) {
		tip(msg);
		return false;
	}
	console.log(getCookie('username'));
	console.log(getCookie('email'));
	console.log(getCookie('href'));
	let comCard = document.getElementsByClassName('com_card')[0];
	comCard.style.display = 'flex';
	setTimeout(function() {
		comCard.style.transform = 'rotateY(360deg)';
	}, 100);
	e.remove();
	let com_card = document.getElementsByClassName('com_card')[0];
	// com_card.children
	com_card.children[0].setAttribute('src', LetterAvatar(getCookie('username'), 60));
	com_card.children[1].innerText = getCookie('username');
	// console.log(com_card.children[1]);

	//基本的使用实例
	ajax({
		url: "http://www.larblog.wang/api/comment/1",
		type: 'get',
		data: {
			username: 'username',
			password: 'password'
		},
		dataType: 'json',
		timeout: 10000,
		contentType: "application/json",
		success: function(data) {
			// console.log(data); //服务器返回响应，根据响应结果，分析是否登录成功
		},
		//异常处理
		error: function(e) {
			console.log(e);
		}
	})

}

// 点赞
function dianzan(e) {
	console.log('点赞了');
	e.childNodes[1].innerText++;

}
// 用户信息合法性判断
function isGood() {
	let username = document.getElementsByName('username')[0].value;
	let email = document.getElementsByName('email')[0].value || '无';
	let href = document.getElementsByName('href')[0].value || '#';
	if (!username) {
		return '请填写昵称哦'
	} else {
		// 验证通过,存入cookie
		setCookie('username', username);
		setCookie('email', email);
		setCookie('href', href);
		return false;
	}
}
// 获取浏览器信息
function getExploreName() {
	var userAgent = navigator.userAgent;
	if (userAgent.indexOf("Opera") > -1 || userAgent.indexOf("OPR") > -1) {
		return 'Opera';
	} else if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1) {
		return 'IE';
	} else if (userAgent.indexOf("Edge") > -1) {
		return 'Edge';
	} else if (userAgent.indexOf("Firefox") > -1) {
		return 'Firefox';
	} else if (userAgent.indexOf("Safari") > -1 && userAgent.indexOf("Chrome") == -1) {
		return 'Safari';
	} else if (userAgent.indexOf("Chrome") > -1 && userAgent.indexOf("Safari") > -1) {
		return 'Chrome';
	} else if (!!window.ActiveXObject || "ActiveXObject" in window) {
		return 'IE>=11';
	} else {
		return 'Unkonwn';
	}
}
// 设置cookie
function setCookie(cname, cvalue, exmiao = 60 * 60 * 24 * 30) {
	var d = new Date();
	d.setTime(d.getTime() + (exmiao * 1000));
	// d.setTime(d.getTime()+(exdays*24*60*60*1000));
	var expires = "expires=" + d.toGMTString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}
// 获取cookie
function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i].trim();
		if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
	}
	return "";
}
// 封装消息提示
function tip(value) {
	let body = document.getElementsByTagName('body')[0];
	let etip = document.createElement('div');
	etip.setAttribute('class', 'action_tip');
	etip.innerHTML = '<p>' + value + '</p>';
	body.appendChild(etip);
	setTimeout(function() {
		etip.remove();
	}, 3000);
}
// 下面是封装的ajax
function ajax(options) {
	options = options || {}; //调用函数时如果options没有指定，就给它赋值{},一个空的Object
	options.type = (options.type || "GET").toUpperCase(); /// 请求格式GET、POST，默认为GET
	options.dataType = options.dataType || "json"; //响应数据格式，默认json

	var params = formatParams(options.data); //options.data请求的数据

	var xhr;

	//考虑兼容性
	if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else if (window.ActiveObject) { //兼容IE6以下版本
		xhr = new ActiveXobject('Microsoft.XMLHTTP');
	}

	//启动并发送一个请求
	if (options.type == "GET") {
		xhr.open("GET", options.url + "?" + params, true);
		xhr.send(null);
	} else if (options.type == "POST") {
		xhr.open("post", options.url, true);

		//设置表单提交时的内容类型
		//Content-type数据请求的格式
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(params);
	}

	//    设置有效时间
	setTimeout(function() {
		if (xhr.readySate != 4) {
			xhr.abort();
		}
	}, options.timeout)

	//    接收
	//     options.success成功之后的回调函数  options.error失败后的回调函数
	//xhr.responseText,xhr.responseXML  获得字符串形式的响应数据或者XML形式的响应数据
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4) {
			var status = xhr.status;
			if (status >= 200 && status < 300 || status == 304) {
				options.success && options.success(xhr.responseText, xhr.responseXML);
			} else {
				options.error && options.error(status);
			}
		}
	}
}

//格式化请求参数
function formatParams(data) {
	var arr = [];
	for (var name in data) {
		arr.push(encodeURIComponent(name) + "=" + encodeURIComponent(data[name]));
	}
	// arr.push(("v=" + Math.random()).replace(".", ""));
	return arr.join("&");

}
