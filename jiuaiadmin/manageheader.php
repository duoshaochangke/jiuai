<?php
	if(!defined("JA_DWQS"))
	{
		header("location:../index");
	}
?>
<header>
	<ul class="headerul">
		<li>
			<a href="<?php echo JA_URL; ?>" target="_self" title="访问站点">久艾分享</a>
		</li>
		<li>
			<a href="./profile.php" target="_self" title="我的账户" id="edit">您好，<?php echo $_SESSION['jiuaiuser'];?></a>
			<ul id="editprofile">
				<li>
					<a href="./profile.php" target="_self" title="编辑个人资料">编辑个人资料</a>
				</li>
				<li>
					<a href="./login-out.php?action=logout&uni=<?php echo $_SESSION["uniqid"];?>" target="_self" title="退出">退出</a>
				</li>
			</ul>
		</li>
	</ul>
</header>