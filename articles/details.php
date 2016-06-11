<?php
	session_start();
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
	if(count(split('&', $_SERVER['QUERY_STRING'])) === 1)
	{
		if(isset($_GET['artuni']))
		{
			if(!empty($_GET['artuni']) && intval($_GET['artuni']))
			{
				// $artuni和$artid在数据库中的类型是整型,传过来的是字符串
				$artuni = intval($_GET['artuni']);

				define("DETAILS", "details");    //引入文章页的css文件
				include "../includes/constant.inc.php";  
				include ROOT_PATH."/includes/header.inc.php";  
				include ROOT_PATH."/includes/JADB.class.php"; 
				global $jadb;   //全局变量
				$jadb = new JADB(JA_DB_HOST,JA_DB_USER,JA_DB_PWD,JA_DB_NAME);
				if(!$jadb->isConnectError())
				{
					echo $jadb->getErrorInfo();
				}
				include ROOT_PATH.'/includes/func.php';

				//查询具体文章内容的sql
				$detailSql = "";
				$detailRow = $jadb->getRow($detailSql);
				// print_r($detailRow);
				// echo gettype($detailRow);
				 if(is_integer($detailRow) || $detailRow === 0)
				 {
					header("location:../404");
				}
			}
			else
			{
				header("location:../404");
			}
		}
		else
		{
			header("location:../404");
		}
	}
	else
	{
		header("location:../404");
	}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title><?php echo $detailRow['article_title']; ?>-久艾分享-优质互联网资源共享</title>
	<!-- ue代码高亮 -->   
        	<?php include ROOT_PATH.'/includes/syntaxhighlighter.php';?>
</head>
<body>
	<?php 
		include ROOT_PATH."/header.php"; 
		include ROOT_PATH."/nav.php"; 
		// 更新阅读次数
		$newViews = updateShowViews($artuni,$detailRow['article_views']);
	?>
	<div class="details">
		<div class="detailcontent">
			<article>
				<header>
					<h3>
						<?php echo $detailRow['article_title']; ?>
					</h3>
					<aside>
						<span>
							来源：   <?php if($detailRow['article_source_link'] != ""): ?>
									<a target="_blank" href="<?php echo $detailRow['article_source_link']; ?>" title="<?php echo $detailRow['article_title']; ?>">
										<?php echo $detailRow['article_source']; ?>
									</a>
								<?php else: ?>
									<a target="_blank" href="<?php echo JA_URL."/articles/$artid-$artuni"; ?>" title="<?php echo $detailRow['article_title']; ?>">
										<?php echo $detailRow['article_source']; ?>
									</a>
								<?php endif;?>
						</span>
						<span>
							发布时间：<?php echo substr($detailRow["article_date"], 0,-3); ?>
						</span>
						<span>	
							阅读次数：<?php echo $newViews; ?>
						</span>
						<!-- 多说显示评论 -->
						<span class="ds-thread-count" data-thread-key="<?php echo $artuni; ?>" data-count-type="comments"></span>
						<?php
							if($_SESSION["jiuaiuser"]):
						?>
							<span>	
								<a  href="<?php echo JA_URL."/jiuaiadmin/editpost.php?artuni=$artuni";  ?>" style="text-decoration:none;color:#000">编辑</a>
							</span>
						<?php endif;?>
					</aside>
				</header>
				<div class="articlecontent">
					<?php echo $detailRow["article_content"]; ?>
					<div class="declare">
						<?php if($detailRow['article_source_link'] != ""): ?>
							原文：
							<a target="_blank" href="<?php echo $detailRow['article_source_link']; ?>" title="<?php echo $detailRow['article_title']; ?>">
								<?php echo $detailRow['article_source_link']; ?>
							</a>
						<?php elseif($detailRow['article_source'] == ""): ?>
							来源：网络
						<?php else: ?>
							来源：
							<a href="<?php echo JA_URL;?>" title="久艾分享网">92fenxiang.com</a>
							<span id="forbid">未经许可，不得转载、链接、转贴或以其他方式复制发表</span>
						<?php endif; ?>
					</div>
				</div>
				<footer>
					<!-- 百度分享 -->
					<?php include ROOT_PATH."/includes/detailsbdshare.php" ; ?>
				</footer>
			</article>
		</div>
		<!-- 前一篇，后一篇 -->
		<aside class="prevnext">
			<!-- 上一篇 -->
			<?php 
				if($prevUni=$jadb->getRow("select max(article_uniqid) as prevuni from articles where article_uniqid < $artuni"))
				{
					if($prevUni['prevuni'])
					{
						$prevRow = $jadb->getRow("select article_uniqid,article_title from articles where article_uniqid='{$prevUni["prevuni"]}'");
			 ?>
						<a class="prev" href="<?php echo JA_URL.'/articles/'.stripslashes($prevRow['article_uniqid']); ?>" title="<?php echo $prevRow['article_title']; ?>"><</a>
			<?php
				 	} 
				 }
			?>
			<!-- 下一篇 -->
			<?php 
				if($nextUni=$jadb->getRow("select min(article_uniqid) as nextuni from articles where article_uniqid > $artuni"))
				{
					if($nextUni['nextuni'])
					{
						$nextRow = $jadb->getRow("select article_id,article_uniqid,article_title from articles where article_uniqid='{$nextUni["nextuni"]}'");
			?>
						<a class="next" href="<?php echo JA_URL.'/articles/'.stripslashes($nextRow['article_uniqid']); ?>" title="<?php echo $nextRow['article_title']; ?>">></a>
			<?php
				 	} 
				 }
			?>
		</aside>
		<!-- 相关文章 -->
		<div class="related">
			<h4>相关文章</h4>
			<ul class="relatedul">
				<!-- 排除文章自身 -->
				<?php getRelatedArticles($detailRow['article_category'],$artuni); ?>
			</ul>
		</div>
		<!-- 评论 -->
		<div class="articlecomments" id="comments">
			<div class="ds-thread duoshuo" 
				data-thread-key="<?php echo $artid; ?>"           
				data-title="<?php echo $detailRow['article_title']; ?>" 
				data-url="<?php echo JA_URL."/articles/$artid-$artuni"; ?>">
			</div>
			<?php include ROOT_PATH."/comments.php"; ?>
		</div>
		<!-- 链接到评论 -->
		<div class="actToComm">
			<a  href="#comments" title="去评论"></a>
		</div>
		<!-- 评论end -->
		<!-- <div class="detailside">
			边栏
		</div> -->
	</div>
	<div class="res-details">
		<div class="res-detailcontent">
			<article>
				<header>
					<h3>
						<?php echo $detailRow['article_title']; ?>
					</h3>
					<aside>
						<span>
							来源：   <?php if($detailRow['article_source_link'] != ""): ?>
									<a target="_blank" href="<?php echo $detailRow['article_source_link']; ?>" title="<?php echo $detailRow['article_title']; ?>">
										<?php echo $detailRow['article_source']; ?>
									</a>
								<?php else: ?>
									<a target="_blank" href="<?php echo JA_URL."/articles/$artid-$artuni"; ?>" title="<?php echo $detailRow['article_title']; ?>">
										<?php echo $detailRow['article_source']; ?>
									</a>
								<?php endif;?>
						</span>
						<span>
							发布时间：<?php echo substr($detailRow["article_date"], 0,-3); ?>
						</span>
						<span>	
							阅读次数：<?php echo $newViews; ?>
						</span>
						<!-- 多说显示评论 -->
						<span class="ds-thread-count" data-thread-key="<?php echo $artuni; ?>" data-count-type="comments"></span>
						<?php
							if($_SESSION["jiuaiuser"]):
						?>
							<span>	
								<a  href="<?php echo JA_URL."/jiuaiadmin/editpost.php?artuni=$artuni";  ?>" style="text-decoration:none;color:#000">编辑</a>
							</span>
						<?php endif;?>
					</aside>
				</header>
				<div class="res-articlecontent">
					<?php echo $detailRow["article_content"]; ?>
					<div class="res-declare">
						<?php if($detailRow['article_source_link'] != ""): ?>
							原文：
							<a target="_blank" href="<?php echo $detailRow['article_source_link']; ?>" title="<?php echo $detailRow['article_title']; ?>">
								<?php echo $detailRow['article_source_link']; ?>
							</a>
						<?php elseif($detailRow['article_source'] == ""): ?>
							来源：网络
						<?php else: ?>
							来源：
							<a href="<?php echo JA_URL;?>" title="久艾分享网">92fenxiang.com</a>
							<span id="forbid">未经许可，不得转载、链接、转贴或以其他方式复制发表</span>
						<?php endif; ?>
					</div>
				</div>
				<footer>
					<!-- 百度分享 -->
					<?php include ROOT_PATH."/includes/detailsbdshare.php" ; ?>
				</footer>
			</article>
		</div>
	</div>
	<?php
		include ROOT_PATH."/footer.php"; 
	?>
</body>
<?php include ROOT_PATH."/includes/fonts.php"; ?>
</html>