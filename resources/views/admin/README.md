# miluadmin
迷鹿后台管理系统（主要用于初学者学习开发），代码属于小白风格，简洁、易懂、高效，界面也很美观哦

目录功能

1、写文章
	考虑到手机端写博客的需求不大，同时也考虑到系统更实用，所以手机端暂不支持写博文
2、文章管理

	查看、编辑或者删除文章这是必不可少的，设为私密（自己可见），草稿箱
	《添加分类搜索》
	
3、评论管理

	查看修改或者删除评论，能根据ip或者评论者分类查询，并且可封禁IP评论
	《添加搜索》
	
4、网站统计
	
	统计访客（ip、时间、来源、入口页面、访问时长和页面个数，pc还是手机）
	
	当前：
	提供查看（今日、昨日、最近7天、最近30天）网站流量pv、uv、ip访问时长等
	提供查看访客足迹，分类查询PC端和移动端
	更多功能待续。。。
	
5、系统设置

	网站seo相关,设置
	基本设置：网站标题、网站副标题、网站小图标修改、备案号（版权说明）
	
待添加：添加分类、分类描述、邮箱通知
	
数据库设计
1、博客文章表
id
title
content
time

2、评论表
id
pid
title
time
3、网站统计表
4、网站基本信息表