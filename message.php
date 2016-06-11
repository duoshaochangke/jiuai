<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>留言板-久艾分享</title>
	<?php 
		define("MSG", "msg");    //引入CSS的常量
		include dirname(__FILE__)."/includes/constant.inc.php";  
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
	<div class="msgwrap">
		<header class="STXingkai">
			久艾留言--欢迎各路好友的灌水、建议和Bug
		</header>
		<!-- 多说评论框 start -->
		<!-- data-thread-key:可以随意取一个名字 -->
		<div class="ds-thread duoshuo" 
			data-thread-key="jiuaimessage"           
			data-title="关于久艾-久艾分享" 
			data-url="<?php echo JA_URL; ?>/message.php">
		</div>
	</div>
	<?php
		include ROOT_PATH."/comments.php"; 
		include ROOT_PATH."/footer.php"; 
	?>
</body>
<?php include ROOT_PATH."/includes/fonts.php"; ?>
</html>