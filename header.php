<?php
	if(!defined("JA_DWQS"))
 	{
 		header("location:./index");
 	}
?>
<header>
	<div class="top-header">
		<span class="STXingkai">
			久艾分享-分享互联网优质资源。久艾分享QQ群：
			<a target="_blank" title="一键加群" href="http://shang.qq.com/wpa/qunwpa?idkey=66c92891a724bf965a4170d6663975ccbb96c2a2f607fe079bba7b0b3f5ce582" class="minijianyingbikaishu">259280570</a>
		</span>
		<ul class="top-ul minijianyingbikaishu">
			<li><a href="<?php echo JA_URL; ?>/about/jiuai" title="关于久艾" target="_blank">关于久艾</a></li>
			<li><a href="<?php echo JA_URL; ?>/about/mianze" title="免责条款" target="_blank">免责条款</a></li>
			<li><a href="<?php echo JA_URL; ?>/about/copy" title="版权声明" target="_blank">版权声明</a></li>
			<a href="<?php echo JA_URL; ?>/message" target="_blank">久艾留言</a>
		</ul>
	</div>
	<div class="middle-header">
		<div class="middle-header-logo STXingkai">
			<a href="<?php echo JA_URL; ?>" target="_self" title="久艾分享-优质互联网资源共享">久艾分享</a>
		</div>
		<div class="middle-header-form">
			<form target="_blank" action="<?php echo JA_URL; ?>/s/search" method="get" id="search">
				<input type="text" placeholder="输入关键字" name="q">
				<input type="submit" value="搜索" class="STXingkai">
			</form>
			<a target="_blank" href="<?php echo JA_URL; ?>/baoliao"  id="contribute" class="STXingkai" title="我要爆料">我要爆料</a>
		</div>
	</div>
	<div class="buttom-header minijianyingbikaishu">
		<a href="<?php echo JA_URL; ?>" target="_self" title="久艾分享-优质互联网资源共享">优质资源聚集地</a>
	</div>
</header>
<!-- 响应式 -->
<div id="top-header" class="minijianyingbikaishu">
	<span class="icon-menu" id="icon"></span>
	<h2><a href="<?php echo JA_URL; ?>" target="_self" title="久艾分享-优质互联网资源共享">久艾分享</a></h2>
	<a href="<?php echo JA_URL; ?>" target="_self" title="久艾分享-优质互联网资源共享">优质资源聚集地</a>
</div>