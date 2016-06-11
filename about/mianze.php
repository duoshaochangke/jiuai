<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>免责条款-久艾分享</title>
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
				免责条款
			</header>
			<div class="mzdesc">
				<ul>
					<li>
						（1）本网（92fenxiang.com）不保证所有信息、文本、图形、链接及其它项
						目的绝对准确性和完整性，故仅供参考使用。本网站对任何由于使用本网站而引
						起的损失，不承担责任。
					</li>
					<li>
						（2）本网站上链接的非本站的网页和内容不受本网站的控制，本网站对其内容不
						负责任。 本网站上挂接的其他单位的网站内容由主办方负责维护，本网站对其内
						容不负责任。
					</li>
					<li>
						（3）本网站中的文章（包括转贴文章）的版权仅归原作者所有，文章仅代表作者
						本人的观点，与本网站立场无关。
					</li>
					<li>
						（4）本网站如因系统维护或升级而需暂停服务时，将事先公告。若因线路及非本
						公司控制范围外的硬件故障或其它不可抗力而导致暂停服务，于暂停服务期间造成
						的一切不便与损失，本网站不负任何责任。
					</li>
					<li>
						（5）任何由于黑客攻击、计算机病毒侵入或发作、因政府管制而造成的暂时性关闭
						等影响网络正常经营的不可抗力而造成的个人资料泄露、丢失、被盗用或被窜改等，
						本网站均得免责。
					</li>
					<li>
						（6）本网站使用者因为违反本声明的规定而触犯中华人民共和国法律的，一切后果
						自己负责，本网站不承担任何责任。
					</li>
					<li>
						（7）本网站保留随时更改本网站上述免责声明条款的权利。
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
