$(document).ready(function () {
	// 移动端菜单点击（带幕罩）
	var n=0;
	$('#menu_btn').click(function () {
		if (n==0) {
			$('.m_nav_div').css('width',180);
			$('.black_box').css('display','block');
			n=1;
		}else{
			$('.m_nav_div').css('width',0);
			$('.black_box').css('display','none');
			n=0;
		}	
	})
	$('.black_box').click(function () {
		$('.m_nav_div').css('width',0);
		$('.black_box').css('display','none');
	})





})