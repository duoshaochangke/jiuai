 <?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>登陆-久艾分享</title>
	<?php 
		session_start();          //开启session
		if($_SESSION["jiuaiuser"])
		{
			header("location:./manage.php");
		}
		define("LOGIN", "login");    //引入首页的wrap.css文件
		include "../includes/constant.inc.php";  
		include ROOT_PATH."/includes/header.inc.php";
		/*可以通过唯一标识符防止恶意注册和伪装表单攻击，uniqid()实现*/
		$_SESSION['uniqid'] = sha1(uniqid(mt_rand(),true));
	?>
</head>
<body>
	<div class="login">
		<header>
			<img src="../images/admin.png" title="logo">
		</header>
		<div class="logindiv">
			<form action="./checklogin.php?action=login&jar=<?php echo sha1(JA_DWQS);?>" method="post" id="loginform">
				<input type="hidden" name="uniqid" value="<?php echo $_SESSION['uniqid']; ?>">
				<ul>
					<li id="loginerror"></li>
					<li>
						管理员登陆
					</li>
					<li>
						<input type="text" placeholder="输入用户名" id="user" name="user">
					</li>
					<li>
						<input type="password" placeholder="输入密码" id="pwd" name="pwd">
					</li>
					<li>
						<input type="submit" value="登陆" id="loginbtn">
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>
</html>