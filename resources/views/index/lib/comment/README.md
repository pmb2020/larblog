# zxcomment
真心评论系统，简单、免费、无广告。

开发记录
思路：
点击发表评论，将访客信息存入cookie（昵称、邮箱、网址），

点击回复，判断cookie是否存在，不存在提示用户生成自己的id通行证，生成后可评论


待完成：
生成名片的动画，后台接口
表单验证（昵称字数、邮箱、网址）、时间数据待整理，点击输入框要聚焦

待完成2019.12.02
后台接口调试，时间和点赞

评论数据库设计
id 
p_id(默认为0留言系统，其他为文章评论)
is_top是否置顶
username（用户昵称）
com_id（默认0一级评论，其他则为二级评论）
title(评论自由)
time
ip（char16）
address(varchar20)
zan

常见问题一：js cookie不生效，cookie读取不出来
因为你是在本地直接打开的文件，放到域名下就可以了