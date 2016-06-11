<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
?>
<!DOCTYPE html>
<html lang="zh" xmlns:wb="http://open.weibo.com/wb">
<head>
	<title>久艾分享-优质互联网资源共享</title>
	<?php 
		define("WRAP", "wrap");    //引入首页的wrap.css文件
		// 因为404和首页用同一个模板，定义首页常量以示区分
		define("INDEX", "index");
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
		include ROOT_PATH.'/includes/func.php';
	?>
	<div class="wrap">
		<?php 
			include ROOT_PATH."/content.php"; 
			include ROOT_PATH."/sidebar.php"; 
		?>
	</div>
	<!-- 响应式主体 -->
	<div class="response-wrap">
		<?php 
			include ROOT_PATH."/response-content.php"; 
		?>
	</div>
	<?php
		include ROOT_PATH."/footer.php"; 
	?>
</body>
<?php include ROOT_PATH."/includes/fonts.php"; ?>
</html>