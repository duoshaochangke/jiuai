<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>版权声明-久艾分享</title>
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
		include ROOT_PATH.'/includes/func.php';
	?>
	<div class="mzwrap">
		<div class="mzcontent">
			<header class="STXingkai">
				版权声明
			</header>
			<div class="mzdesc">
				<ul>
					<li>
						（1）凡注明“来源：92fenxiang.com ”的文章和作品，版权均属本站所有，任何
						媒体、网站或个人未经本网协议授权不得转载、链接、转贴或以其他方式复制发
						表。已经本站协议授权的媒体、网站，在下载使用时必须注明
						“来源：92fenxiang.com”，违者本网将依法追究责任。
					</li>
					<li>
						（2）任何个人或组织转载本网站转载的作品，必须保留该作品的源出处；本网站声明不
						得转载的，任何个人或组织不得擅自转载。
					</li>
					<li>
						（3）本站部分内容来自互联网及报刊整理，如果发现本站侵犯了你的版权请及时告知，
						我们会尽快处理，联系QQ：461147874（加时请注明 92fenxiang.com 事务）， 其
						他未告知或者未发现的情况本站不对此承担任何责任。
					</li>
					<li>
						（4）本网站上的链接服务可以直接进入其他站点，这些链接的站点不受本网站的控制，
						本网站对任何与本站链接网站的内容不负责任。
					</li>
					<li>
						（5）对于原创者发表的作品或者文章版权归作者本人所有，本站仅做发表之用。
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php
		include ROOT_PATH."/footer.php"; 
	?>
</body>
<?php include ROOT_PATH."/includes/fonts.php"; ?>
</html>
