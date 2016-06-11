<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>关于久艾-久艾分享</title>
	<?php 
		define("JIUAI", "jiuai");    //引入CSS的常量
		include "../includes/constant.inc.php";  
		include ROOT_PATH."/includes/header.inc.php";  
	?>
</head>
<body>
	<?php 
		include ROOT_PATH."/header.php"; 
		include ROOT_PATH."/nav.php"; 
		include ROOT_PATH."/includes/JADB.class.php"; 
		global $jadb;   //全局变量
		$jadb = new JADB(JA_DB_HOST,JA_DB_USER,JA_DB_PWD,JA_DB_NAME);
		if(!$jadb->isConnectError())
		{
			echo $jadb->getErrorInfo();
		}
	?>
	<div class="jiuaiwrap STXingkai">
		<div class="jiuaiside">
			<a href="#introduce">网站介绍</a>
			<a href="#links">友情链接</a>
			<a href="#contanct">联系方式</a>
			<a href="#join">加入久艾</a>
			<a href="#ad">广告合作</a>
		</div>
		<div class="jiuaicontent ">
			<header>
				关于久艾
			</header>
			<div class="jiuaidesc minijianyingbikaishu">
				<a href="#" name="introduce">网站介绍</a>
				<p>
					久艾分享网创立于2015年，是一个面向码农的知识分享社区。分享知识不
					仅是一种精神与美德，更是一种自我学习与进步的方式。购物是一种需求，
					聊天是一种需求，娱乐是一种需求，而分享也是一种需求，而且是一种永
					不褪色的内在需求。互联网不仅让分享知识变得更方便，而且让分享知识
					变得更有价值，可以让更多人从中受益。但并非所有知识是优质的和实用的，
					而久艾分享网将致力于汇聚互联网优质资源。
					
					<p>久艾分享网的使命是分享互联网优质资源。</p>

					<p>
						92fenxiang.com was founded in 2015. It is a knowledge-sharing communtiy for coders.

					Our mission is to share high quality Internet resources. 
					</p>
				</p>
				<a href="#" name="links">友情链接</a>
				<ul>
					<li>域名年龄不得低于3年(自审核通过算)</li>
					<li>必须和互联网相关或者IT技术相关</li>
					<li>网站经常更新，保证正常收录，对PR无要求</li>
					<li>符合要求者且愿换链者，请移步<a href="../message" title="久艾留言">留言板</a>，留下网站地址和关键字</li>
					<li>久艾站长主动要求添加的不作上述要求</li>
				</ul>
				<a href="#" name="contanct">联系方式</a>
				<ul>
					<li>
						新浪微博：<a href="http://weibo.com/rebgin" target="_blank" title="关注久艾">@久艾分享</a>
					</li>
					<li>
						久艾邮箱：<a href="mailto:postmaster@ido321.com" target="_blank" title="联系邮箱">postmaster@ido321.com</a>
					</li>
					<li>
						QQ留言：<a class="qq" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=461147874&site=qq&menu=yes">
						<img border="0" src="http://wpa.qq.com/pa?p=2:461147874:51" alt="QQ交流" title="QQ交流"/></a>
					</li>
				</ul>
				<a href="#" name="join">加入久艾</a>
				<ul>
					<li>
						如果你也乐于分享，衷于互联网，欢迎戳上述联系方式与久艾站长联系。
					</li>
				</ul>
				<a href="#" name="ad">广告合作</a>
				<p>
					广告主请邮箱联系：
					<a class="email" target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=jrq4v7_6uba5us7--6Dt4eM" style="text-decoration:none;">
					<img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_02.png"/></a>
				</p>
			</div>
		</div>
	</div>
	<?php
		include ROOT_PATH."/footer.php"; 
	?>
</body>
<?php include ROOT_PATH."/includes/fonts.php"; ?>
</html>