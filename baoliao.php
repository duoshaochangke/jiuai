<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
?>
<!DOCTYPE html>
<html lang="zh" xmlns:wb="http://open.weibo.com/wb">
<head>
	<title>我要爆料--久艾分享-优质互联网资源共享</title>
	<?php 
		define("TOUGAO", "tougao");    //引入投稿页面的css和js文件
		include dirname(__FILE__)."/includes/constant.inc.php";  
		include ROOT_PATH."/includes/header.inc.php";  
	?>
	<script type="text/javascript" src="./js/layer/layer.min.js"></script>
</head>
<body>
	<?php
		$refURL = JA_URL."/baoliao.php";
		if(strcmp($_SERVER['HTTP_REFERER'], $refURL) === 0):
	?>
		<script type="text/javascript">
			$.layer({
				type:0,
				time:0,
				title:'友情提示',
				dialog:{
					type:1,
					msg:"已加入爆料审核队列~~~^_^~~~"
				}
			});
		</script>
	<?php endif;?>
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
		include ROOT_PATH.'/includes/func.php';
	?>
	<div class="tgwrap">
		<div class="tgcontent">
			<header>
				<img src="./images/tougao.png">
			</header>
			<aside class="minijianyingbikaishu demand">
				<h3>投稿要求</h3>
				<ol>
					<li>与互联网技术相关；</li>
					<li>不欢迎标题党，欢迎干货；</li>
					<li>不欢迎转载地址，欢迎原始地址；</li>
					<li>欢迎推荐，也欢迎自荐。</li>
				</ol>
			</aside>
			<!-- ./sendemail/mail.php -->
			<form method="post" action="./sendemail/mail.php" id="tgform">
				<ul class="formul">
					<li>
						<label for="title">标题<span>*</span></label>
						<input type="text" id="title" name="title"value="">
					</li>
					<li>
						<label for="link">链接<span>*</span></label>
						<input type="text" id="link" name="link" value="">
					</li>
					<li>
						<label for="author">怎么称呼你<span>*</span></label>
						<input type="text" id="author" name="author" value="">
					</li>
					<li>
						<label for="contact">请留下微博/QQ/邮箱以便联系：</label>
						<input type="text" id="contact" name="contact" value="">
					</li>
					<li>
					<li>
						<a href="http://weibo.com/rebgin" target="_blank">@久艾分享</a>&nbsp;也可以投稿哦( ^_^ )
					</li>
				</ul>
				<input type="submit" id="baoliao" value="提交爆料">
			</form>
		</div>
	</div>
	<?php
		include ROOT_PATH."/footer.php"; 
	?>
</body>
<?php include ROOT_PATH."/includes/fonts.php"; ?>
</html>