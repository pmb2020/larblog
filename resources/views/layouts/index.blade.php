<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>@yield('title')</title>
    <meta name="Keywords" content="@yield('keywords')">
    <meta name="Description" content="@yield('description')">
    <meta name="author" content="{{$config['web_author']}}">
    <link rel="stylesheet" type="text/css" href="{{asset('static/index/css/swiper.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('static/index/css/base.css')}}" />
    @section('style')
    @show
{{--    第三方统计代码--}}
    {!! $config['web_code']??'' !!}
</head>
<body>
{{--头部--}}
<header>
    <div class="container">
        <div class="flex d_none" style="justify-content: space-between;align-items: center">
            <h2>
                <img alt="K先生个人博客" title="K先生个人博客" src="{{asset('static/index/images/logo3.png')}}" height="90px">
            </h2>
            <form class="search_form" action="{{asset('search')}}" method="GET">
                <div class="flex search" style="">
                    <input style="flex: 1" type="text" placeholder="请输入关键词" required name="keyword" value="{{$keyword??''}}">
                    <button type="submit">搜索</button>
                </div>
            </form>
        </div>
        <!-- 移动端导航 -->
        <div class="md_none" style="">
            <div class="menu_div" style="">
                <button id="menu_btn">三<i class="fa fa-bars" aria-hidden="true"></i></button>
                <div style="text-align: center;">
                    <img alt="K先生个人博客" src="{{asset('static/index/images/mlogo.png')}}" style="width: 150px">
                </div>
                <button id="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
            <div style="height: 55px"></div>
            <div class="m_nav_div" style="width: 0">
                <ul class="m_nav_ul">
                    <li><a href="{{url('/')}}">首页</a></li>
                    <li><a href="{{url('/ajishu')}}">爱技术</a></li>
                    <li><a href="{{url('/ashare')}}">爱分享</a></li>
                    <li><a href="{{url('/alife')}}">爱生活</a></li>
                    <li><a href="{{url('/apinbo')}}">爱拼搏</a></li>
                    <li><a href="{{url('/gbook')}}">留言板</a></li>
                    <li><a href="{{url('/about')}}">关于我</a></li>
                </ul>
            </div>
            <div class="black_box" style="display: none;"></div>
        </div>
    </div>
    <nav class="d_none">
        <div class="container">
            <ul>
                <li><a href="{{url('/')}}">首页</a></li>
                <li><a href="{{url('/ajishu')}}">爱技术</a></li>
                <li><a href="{{url('/ashare')}}">爱分享</a></li>
                <li><a href="{{url('/alife')}}">爱生活</a></li>
                <li><a href="{{url('/apinbo')}}">爱拼搏</a></li>
                <li><a href="{{url('/gbook')}}">留言板</a></li>
                <li><a href="{{url('/about')}}">关于我</a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="container mt15">
    @section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="banner" id="banner" style="margin: 0px auto;">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#"><img src="{{asset('static/index/images/banner1.jpg')}}" ></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="{{asset('static/index/images/banner2.jpg')}}" ></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="{{asset('static/index/images/banner3.jpg')}}" ></a>
                        </div>
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>
                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev d_none"></div>
                    <div class="swiper-button-next d_none"></div>
                </div>
            </div>
            <ul class="list_one ico_num" style="">
                <p class="div_top">本站推荐</p>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>K先生</p><time>2018-10-25</time></a></li>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>php冒泡排序和快速排序</p><time>2018-10-25</time></a></li>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>一起来掌握PHP静态化技术</p><time>2018-10-25</time></a></li>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>K先生：今天不谈技术，来聊聊心情</p><time>2018-10-25</time></a></li>
                <li><a href="http://www.gold404.cn/info.html"><p class="flex1 ellipsis1"><i></i>Bootstrap4响应式布局之栅格系统Bootstrap4响应式布局之栅格系统vsBootstrap4响应式布局之栅格系统</p><time>2018-10-25</time></a></li>
            </ul>
            <div style="margin-top: 15px;">
                <div class="new_txt md_none"><p>最新文章</p></div>
                <section class="section hot_sec">
                    <div class="flex_img">
                        <div class="img_box">
                            <img src="https://blog.yzmcms.com/uploads/thumbnail/20190916213923655.png" onerror="" alt="" title=""></div>
                        <div class="r_text">
                            <h2 class="ellipsis1"><a target="_blank" href="info.html">北漂之旅～新的征程</a></h2>
                            <p class="ellipsis3">算算时间，现在应该是来北京的第六天了吧，当我一个人来到北京的时候，没有感觉这个城市有多么的“好”，也没有感受到电视机前北京的庄重，只是感觉一个人有些孤独罢了。其实仔细想想，我确实挺“虎”的，在只约了一个我确实挺“虎”的，在只约我确实挺“虎”的，在只约</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i>K先生</span>
                                <time><i id="time_ico" class="ico"></i>2019-12-01</time>
                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>124</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section hot_sec">
                    <div class="flex_img">
                        <div class="img_box">
                            <img src="https://www.yxiaowei.com/Public/upload/article_banner/2019/12-23/5e009a4569f1b.jpg" onerror="" alt="" title=""></div>
                        <div class="r_text">
                            <h2 class="ellipsis1"><a target="_blank" href="info.html">北漂之旅～新的征程</a></h2>
                            <p class="ellipsis3">算算时间，现在应该是来北京的第六天了吧，当我一个人来到北京的时候，没有感觉这个城市有多么的“好”，也没有感受到电视机前北京的庄重，只是感觉一个人有些孤独罢了。其实仔细想想，我确实挺“虎”的，在只约了一个我确实挺“虎”的，在只约我确实挺“虎”的，在只约</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i>K先生</span>
                                <time><i id="time_ico" class="ico"></i>2019-12-01</time>
                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>124</span>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="flex_img">
                        <div class="img_box">
                            <img src="https://www.talklee.com/zb_users/upload/2020/02/202002211582262039798127.jpg" onerror="" alt="" title=""></div>
                        <div class="r_text">
                            <h2 class="ellipsis1"><a target="_blank" href="info/{$list.id}.html">CSS垂直居中的8种方法，附详细的图文教程</a></h2>
                            <p class="ellipsis3">这是一个记录宝宝成长点滴的个人博客，用作于宝宝博客，亲子博客，都是适用的。颜色为蓝色调，头部有飘动的卡通云，采用css3动画效果，布局简单，代码精简，还有相册功能</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i>K先生</span>
                                <time><i id="time_ico" class="ico"></i>2019-12-01</time>
                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>124</span>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/47.html">可以平凡，但不能自暴自弃</a></h2>
                            <p class="ellipsis2">可以做一个平凡的人，可以普通，但绝不能自暴自弃。这是今天我想对自己说的话。&nbsp;时间有时候觉得过得很快，真的很快，但是又有时候，人生真的是挺无聊，对于我来说，每一周都过着一模一样的生活，周一到周五，上班下班，加班，回家，睡觉；周六周日，要么两天都宅在家里，要么给自己找个不宅的理由，趁着周日下午出去转转。可，自己的人生真的就要每天都这样日复一日、周复一周</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-12-01 15:43:16</time>
                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>124</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/46.html">composer速度太慢？来试试各大厂商的镜像地址吧！</a></h2>
                            <p class="ellipsis2">composer是PHP的未来这个就不多说了，但是由于某种限制（原因程序员都明白），composer的速度真是慢如龟爬，让人不敢恭维。可能有些同学知道通过更换国内镜像的可以提升composer的速度，如果我没猜错的话，你更换的国内镜像地址一定是https://packagist.phpcomposer.com（中国全量镜像）。至于速度怎么样，还是同学们自己体</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-11-25 17:25:17</time>
                                <span><i id="type_ico" class="ico"></i>爱技术</span><span><i id="read_ico" class="ico"></i>118</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/45.html">thinkphp5最简单设置admin后台入口的文件</a></h2>
                            <p class="ellipsis2" style="margin-bottom: 45px;">按照习惯，我按照习惯，我们在开发网站的时候都会需要一个后台，而thinkphp5为我们只提供了一个index.php入口，那如果我们后台也都从这个文件走的话那就会极为不方便，那现在我们来建立一个admin.php后台入口。我喜欢简单直接的，所以直接往下看。。。。。。1、在thinkphp5的public目录下有一个index.php文件，复制它并且重命名为a</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-11-14 10:41:17</time>
                                <span><i id="type_ico" class="ico"></i>爱技术</span><span><i id="read_ico" class="ico"></i>116</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/44.html">K先生：聊聊北漂第一次搬家的感受</a></h2>
                            <p class="ellipsis2" style="margin-bottom: 45px;">今天，我搬家了，是自三月份来北京的第一次搬家。北漂的生活没有像我之前想的那么顺利，反而是诸事不顺，负能量一点的就是，感觉自己浑身散发着失败的气味，被生活按在地上使劲的摩擦再摩擦，唯一一点正能量的是，不管生活有多艰难，我仍然在咬牙坚持，不曾放弃。回头看了一下身边的朋友，发现好像只有自己最失败。自己也算是一个比较孤傲的人吧，不管遇到多大的困难都喜欢自己去抗，不喜</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-11-04 23:59:09</time>
                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>137</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/43.html">K先生：来聊聊那些常见的汽车车牌标志吧</a></h2>
                            <p class="ellipsis2" style="margin-bottom: 45px;">最近发现了一件特尴尬的事，那就是别人问我这是个什么车的时候，我一脸懵逼，也就只认识宝马奥迪了，其他的车一概不认识，在学校的时候不认识也没感觉没什么，但是到社会上，说车都不认识，，，这就显得自己很“二”了，并且还是对于一个男人来说，对车竟然没什么研究，连一些常见的车牌标志都不认识，这说直白点就是很丢人。。。我也意识到这个问题了，所以，在这整理一些常见的车牌标志</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-10-26 22:01:43</time>
                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>193</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/42.html">1024程序员节日，哎，苦逼的程序员</a></h2>
                            <p class="ellipsis2" style="margin-bottom: 45px;">时间匆匆而来，又是一年的程序员节来了，其实吧，自己对这个节日并不是那么熟悉，也并不感冒，只是偶然间看到CSDN
                                推送的资讯，才意识到今天对于程序员是一个特殊的节日。上一个程序员节日，自己还在大学的校园里，对程序员也并没有多大的感触，所以也并没有什么特别的感想，但是今年不同的是，我不在是学生了，而是一个公司地地道道程序员,到现在我也感觉自己经历了好多。从幼稚到</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-10-24 12:53:34</time>
                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>163</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/41.html">MySQL索引到底是干什么的？怎么用？还不懂？</a></h2>
                            <p class="ellipsis2" style="margin-bottom: 45px;">MySQL索引到底是干什么的？这个问题自己一直理解的很模糊，只知道它相当于书的目录，能加快数据检索速度。但是要深入一点去说，它为什么能加快数据检索速度，从哪能看出它加快了检索速度，说到这可能我就有点迷茫了。之前最MySQL的理解差不多仅限于增删查改，但最后发现仅仅知道这是不行的，所以找了一些资料，补了一下这方面的知识。之前我对MySQL索引的理解是在设计表的</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-10-18 21:42:49</time>
                                <span><i id="type_ico" class="ico"></i>爱技术</span><span><i id="read_ico" class="ico"></i>171</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/40.html">迷茫？迷茫！迷茫？我是谁？我在哪？</a></h2>
                            <p class="ellipsis2" style="margin-bottom: 45px;">我是谁？我在哪？这就是自己目前的生活状态了，每天不知道在干什么。自己定的目标好像都还非常远，还有三个月就过年，一想到过年回家需要面对的心里就发慌。现在自己迷茫了，不知道当初选择来北京是对是错，来北京的自己好像在别人看来很高大上，可是，也就真正是怎样的也许只有自己才能体会到吧。也许多年后，在老家的同学都已经开上车，住进新房子了，在北京的自己还是一无所有，在这座</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-10-17 22:13:27</time>
                                <span><i id="type_ico" class="ico"></i>爱生活</span><span><i id="read_ico" class="ico"></i>149</span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section ">
                    <div class="flex_img">
                        <div class="r_text">
                            <h2 class="line_h2" style=""><a target="_blank" href="info/39.html">php爬虫模拟登录之慕课网</a></h2>
                            <p class="ellipsis2" style="margin-bottom: 45px;">看过上博主上一篇文章的应该都对PHP爬虫有一个最最基础的了解了，现在我们来进一步去了解它。在实际开发中，我们需要爬取的数据，大部分情况下都是需要登录才能获取到的，比如说淘宝网什么的，当然我们现在不以淘宝网为例，至于原因嘛......接下来我们以慕课网为例，来研究一下PHP模拟登录。开始之前的准备1、慕课网账号一个2、慕课网登录表单提交的url地址以及参数（这</p>
                            <div class="text_info">
                                <span><i id="user_ico" class="ico"></i><a href="#">K先生</a></span>
                                <time><i id="time_ico" class="ico"></i>2019-10-15 20:59:44</time>
                                <span><i id="type_ico" class="ico"></i>爱技术</span><span><i id="read_ico" class="ico"></i>198</span>
                            </div>
                        </div>
                    </div>
                </section>
                <ul class="pagination">
                    <li class="disabled"><span>&laquo;</span></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="/?page=2">2</a></li>
                    <li><a href="/?page=3">3</a></li>
                    <li><a href="/?page=4">4</a></li>
                    <li><a href="/?page=5">5</a></li>
                    <li><a href="/?page=2">&raquo;</a></li>
                </ul>
            </div>


        </div>
        <div class="col-md-3">
            <aside class="admin_info d_none" style="">
                <div style="position: relative;margin-bottom: 55px;">
                    <img width="100%" height="125px" src="imgs/bg2.png" alt="">
                    <img style="position: absolute;left: 36.8%;bottom: -42px;border-radius: 50%;height: 100px;" src="imgs/avatar.jpg">
                </div>
                <div class="info_text">
                    <p class="abname">Full Stack engineer | K先生</p>
                    <p class="abposition">Web前端设计师、网页设计</p>
                    <p class="abtext"> 一个95后草根站长！17年入行。一直潜心研究web前端技术，一边工作一边积累经验，分享一些个人博客模板，以及SEO优化等心得。 </p>
                </div>
                <!-- <ul class="info_web">
                    <li><span>45</span><p>文章</p></li>
                    <li><span>20</span><p>评论</p></li>
                    <li><span>670</span><p>浏览</p></li>
                </ul> -->
            </aside>
            <aside class="d_none" style="margin-top: 15px;">
                <p class="div_top">日期归档</p>
                <ul class="text_ul">
                    <li><a href="#">2019年03月<span>1篇</span></a></li>
                    <li><a href="#">2018年12月<span>4篇</span></a></li>
                    <li><a href="#">2018年11月<span>13篇</span></a></li>
                    <li><a href="#">2018年10月<span>8篇</span></a></li>
                </ul>
            </aside>

            <aside class="d_none" style="margin-top: 15px;">
                <p class="div_top">热门文章</p>
                <div class="flex_img min_img_p" style="margin-bottom: 15px;">
                    <img style="" src="imgs/default.jpg">
                    <div class="r_text">
                        <h3 class="ellipsis2"><a href="/info/23.html" target="_blank" title="bootstrap4实现侧边导航栏带隐藏按钮">bootstrap4实现侧边导航栏带隐藏按钮</a></h3>
                        <p class="bottom_num"><time>2018-12-09</time><span>浏览 408</span></p>
                    </div>
                </div>
                <div class="flex_img min_img_p" style="margin-bottom: 15px;">
                    <img style="" src="imgs/default.jpg">
                    <div class="r_text">
                        <h3 class="ellipsis2"><a href="/info/31.html" target="_blank" title="分享一款免费可商用的字体《问藏书房》">分享一款免费可商用的字体《问藏书房》</a></h3>
                        <p class="bottom_num"><time>2019-10-06</time><span>浏览 360</span></p>
                    </div>
                </div>
                <div class="flex_img min_img_p" style="margin-bottom: 15px;">
                    <img style="" src="imgs/default.jpg">
                    <div class="r_text">
                        <h3 class="ellipsis2"><a href="/info/26.html" target="_blank" title="北漂之旅～新的征程">北漂之旅～新的征程</a></h3>
                        <p class="bottom_num"><time>2019-03-12</time><span>浏览 326</span></p>
                    </div>
                </div>
                <div class="flex_img min_img_p" style="margin-bottom: 15px;">
                    <img style="" src="imgs/default.jpg">
                    <div class="r_text">
                        <h3 class="ellipsis2"><a href="/info/24.html" target="_blank" title="K先生：今天不谈技术，来聊聊心情">K先生：今天不谈技术，来聊聊心情</a></h3>
                        <p class="bottom_num"><time>2018-12-12</time><span>浏览 289</span></p>
                    </div>
                </div>
                <div class="flex_img min_img_p" style="margin-bottom: 15px;">
                    <img style="" src="imgs/default.jpg">
                    <div class="r_text">
                        <h3 class="ellipsis2"><a href="/info/5.html" target="_blank" title="黑色炫酷html博客模板">黑色炫酷html博客模板</a></h3>
                        <p class="bottom_num"><time>2018-10-29</time><span>浏览 281</span></p>
                    </div>
                </div>
                <!--  <div class="flex_img min_img_p">
<img style="" src="http://www.yangqq.com/d/file/jstt/css3/2014-12-09/1cba05d9e0c7cfcfa897394b85f7e5f9.jpg" onerror="{this.src='/static/index/imgs/default.jpg'}">
<div class="r_text">
    <h3>爱一个人就非要在一起吗</h3>
    <p class="bottom_num"><time>2019-6-2</time><span>阅读数 231</span></p>
</div>
</div> -->
            </aside>
            <aside class="d_none" style="margin-top: 15px;">
                <p class="div_top">随机推荐</p>
                <ul class="text_ul">
                    <li><a href="http://www.gold404.cn/info/3.html">>php环境搭建phpstudy<span>07-04</span></a></li>
                    <li><a href="http://www.gold404.cn/info/34.html">>PHP与Linux定时任务<span>07-04</span></a></li>
                    <li><a href="http://www.gold404.cn/info/24.html">>K先生：今天不谈技术，来聊聊心情<span>07-03</span></a></li>
                    <li><a href="http://www.gold404.cn/info/22.html">>网站改版后，网站内页一直不被收录时，我做了什么<span>07-01</span></a></li>
                    <li><a href="http://www.gold404.cn/info/14.html">>win10永久激活工具<span>07-01</span></a></li>
                    <li><a href="http://www.gold404.cn/info/5.html">>黑色炫酷html博客模板<span>07-02</span></a></li>
                    <li><a href="http://www.gold404.cn/info/1.html">>K先生<span>10-25</span></a></li>
                </ul>
            </aside>
            <aside class="d_none" style="margin-top: 15px;min-height: 120px;">
                <p class="div_top">友情链接</p>
                <ul class="link_ul">
                    <li><a href="http://daohang.lusongsong.com/" target="_blank" title="博客大全">博客大全</a></li>
                    <li><a href="http://www.gold404.cn/" target="_blank" title="K先生个人博客">K先生个人博客</a></li>
                    <li><a href="http://www.yuyinuo.cn/" target="_blank" title="于高衡的博客">于高衡的博客</a></li>
                    <li><a href="http://www.duola.vip/" target="_blank" title="哆啦日记">哆啦日记</a></li>
                </ul>
            </aside>

        </div>
    </div>
    @show
</div>
{{--底部信息--}}
@section('footer')
<footer style="height: 80px;background-color: #1C2327;margin-top: 30px">
    <p style="text-align: center;color: #b9b9b9;padding-top: 20px;">本博客由K先生设计开发，版权所有</p>
    <p style="text-align: center;color: #b9b9b9;">备案号：<a style="color: #b9b9b9" href="http://beian.miit.gov.cn" target="_blank">豫ICP备16027903号-3</a></p>
</footer>
@show
<script type="text/javascript" src="{{asset('static/index/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('static/index/js/base.js')}}"></script>
@section('myjs')
@show
</body>
</html>
