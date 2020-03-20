<!DOCTYPE html>
<html>
<head>
    <title>highlight代码高亮插件的使用（带行号）</title>
    <link rel="stylesheet" type="text/css" href="styles/monokai-sublime.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/styles/monokai-sublime.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
    <style>
        .hljs ul {
            list-style: decimal;
            margin: 0 0 0 40px!important;
            padding: 0
        }
        .hljs li {
            list-style: decimal-leading-zero;
            border-left: 1px solid #111!important;
            padding: 2px 5px!important;
            margin: 0!important;
            line-height: 14px;
            width: 100%;
            box-sizing: border-box
        }
        .hljs li:nth-of-type(even) {
            background-color: rgba(255,255,255,.015);
            color: inherit
        }
    </style>
</head>
<body>
        <div>
            @foreach( $articles as $article)
                {!! $article->content !!}
            @endforeach
        </div>
		<pre>
			<code>
				hljs.initHighlightingOnLo1ad();
			</code>
		</pre>
        <p>题目：给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。来源：力扣（LeetCode）</p>
        <pre><code>function reverse1($x) {<br>if ($x != abs($x)) {<br>	$x = abs($x);<br>	$p = 1;<br>}<br>$x = str_split($x);//打散为数组<br>for ($i = 0; $i &lt; count($x) / 2; $i++) {<br>	$tem = $x[$i];<br>	$x[$i] = $x[count($x) - $i - 1];<br>	$x[count($x) - $i - 1] = $tem;<br>}<br>$x = intval(implode('', $x));<br>if ($x &gt; pow(2, 31)) {//判断整数是否溢出<br>	$x = 0;<br>}<br>if (!empty($p)) { //判断是否为复制<br>	$x = -$x;<br>}<br>return $x;<br>}</code></pre>
        <p>这种解法虽然看起来代码多，但是思路笔记清晰，就是利用str_split()函数先把整数打散为数组，然后就依次将第一位与倒数第一位，第二位与倒数第二位......颠倒位置，最后再转换成数字即可。</p>
        <p>第二种解法：</p>
        <p>这种方法代码笔记简短，利用的数学方法，就是利用不断取余的方法。来反转整数。</p>
        <pre><code>function reverse($x) {<br>	$newx = 0;<br>	while ($x != 0) {<br>		$newx = $newx * 10 + intval($x % 10);<br>		$x = intval($x / 10);<br>	}<br>	if (abs($newx) &gt; pow(2, 31)) {<br>		$newx = 0;<br>	}<br>	return $newx;<br>}</code></pre>
        <p>代码笔记短，认真看一下，相信没什么问题的。</p>
        <p><br></p>
{{--        <script src="js/highlight.pack.js" type="text/javascript" charset="utf-8"></script>--}}
        <script>
            hljs.initHighlightingOnLoad();
        </script>
        <script type="text/javascript">
            var e = document.querySelectorAll("code");
            var e_len = e.length;
            for (let i = 0; i < e_len; i++) {
                e[i].innerHTML = "<ul><li>" + e[i].innerHTML.replace(/\n/g, "\n</li><li>") + "\n</li></ul>";
            }
        </script>
</body>
</html>
