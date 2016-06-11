<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
	session_start();          //开启session
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>后台管理-久艾分享</title>
	<?php 
		define("MANAGE", "manage");    //引入manage.css文件
		include "../includes/constant.inc.php";  
		include ROOT_PATH."/includes/header.inc.php";  
	?>
</head>
<body>
	<div class="manage">
		<?php include "./manageheader.php"; ?>
		<div class="main">
			<?php
				include "./manageside.php";
			?>
			<div class="maincontent">
				<h3>欢迎来到久艾分享的后台管理</h3>
			</div>
		</div>
	</div>
</body>
</html>