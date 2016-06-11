<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
	// 三个查询参数
	if(count(split('&', $_SERVER['QUERY_STRING'])) === 2)
	{
		// q:查询字符串
		if(isset($_GET['pq']) && isset($_GET['num']))
		{
			if(!empty($_GET['pq']) && !empty($_GET['num']))
			{

				//showcat.php/showtag.php/search.php/page.php共用这个模板
				define("PAGEQ", "pageq");    //因为相对路径问题，定义这个区分
				include "../includes/constant.inc.php";  
				include ROOT_PATH."/includes/PAGE.class.php";
				$curPath = JA_URL."/s";
				$page = new PAGE(TW,$_GET['pq'],$curPath);

				// 获取查询字符串
				$getQ = $_GET['pq'];

				// 开启session
				session_start();
				$page->setTotalData($_SESSION['totalData']);      //设置总数据
				$curPage = $_GET['num'];  //当期页

				if(intval($curPage))
				{
					include ROOT_PATH."/includes/header.inc.php";  
					include ROOT_PATH."/includes/JADB.class.php"; 

					global $jadb;   //全局变量
					$jadb = new JADB(JA_DB_HOST,JA_DB_USER,JA_DB_PWD,JA_DB_NAME);
					if(!$jadb->isConnectError())
					{
						echo $jadb->getErrorInfo();
					}
					include ROOT_PATH.'/includes/func.php';
					
					$page->setCurPage($curPage);
					$curPage = $page->getCurPage();

					// 查询标签类别下的
					// find_in_set()可以用于mysql中判断某字符串是否包含另一个字符串
					$qSql = "".($curPage - 1)*TW.','.TW;
					$qResults = $jadb->getQuery($qSql);
				}
				else
				{
					header("location:../404");
				}

				
			}
			else
			{
				// exit("参数内容时空") ;
				header("location:../404");
			}
		}
		else
		{
			// exit("参数变量名不对") ;
			header("location:../404");
		}
	}
	else
	{
		// exit("参数个数不对") ;
		header("location:../404");
	}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>搜索<?php echo $getQ; ?>相关-久艾分享-优质互联网资源共享</title>
</head>
<body>
	<?php 
		include ROOT_PATH."/header.php"; 
		include ROOT_PATH."/nav.php"; 
	?>
	<div class="cat">
		<div class="catcontent">
			<header class="STXingkai catheader">
				<span><img src="../../images/cat.png"></span>
				<span>搜索：与<?php echo $getQ; ?>相关的内容</span>
			</header>
			<div class="catarticles">
				<!-- 结果集不为空 -->
				<?php if($qResults): ?>
					<?php 
						while($qRow = $jadb->getRowsAssoc($qResults)):
					?>
							<div class="articlelist">
								<header class="articletitle">
									<a href="<?php echo JA_URL.'/articles/'.stripslashes($qRow['article_uniqid']); ?>" title="<?php echo stripslashes($qRow['article_title']); ?>" target="_blank">
										<?php echo stripslashes($qRow['article_title']); ?>
									</a>
								</header>
								<div class="articleimg">
									<a href="<?php echo JA_URL.'/articles/'.stripslashes($qRow['article_uniqid']); ?>" title="<?php echo stripslashes($qRow['article_title']); ?>"  target="_blank">
										<img src="<?php echo stripslashes($qRow['article_img']); ?>" title="<?php echo stripslashes($qRow['article_title']); ?>">
									</a>
								</div>
								<div class="articledata">
									<div class="articlemeta minijianyingbikaishu">
										<img src="../../images/author.png">&nbsp;<?php echo stripslashes($qRow['article_source']); ?>
										<img src="../../images/time.png">&nbsp;<?php echo substr(stripslashes($qRow["article_date"]), 0,-9); ?>
										<img src="../../images/read.png">&nbsp;<?php echo stripslashes($qRow['article_views']); ?>人看过
									</div>
									<div class="articlesumary">
										<?php echo strip_tags(stripslashes($qRow['article_content'])); ?>
									</div>
									<div class="articleread">
										<a href="<?php echo JA_URL.'/articles/'.stripslashes($qRow['article_uniqid']); ?>" title="<?php echo stripslashes($qRow['article_title']); ?>">阅读全文>></a>
									</div>
								</div>
							</div>
					<?php
						endwhile;
					?>
					<div class="pages">
						<ul class="pageul">
							<li id="showpagedata">
								<?php echo $_SESSION['totalData'];?>条数据&nbsp;&nbsp;共<?php echo $page->getTotalPage();?>页
							</li>
							<?php
								$page->getPages();
							?>
						</ul>
					</div>
				<?php 
					else:
						echo "没有找到相关内容";
						getRandArticlesInSearch();
					endif;
				?>		
			</div>
		</div>
		<div class="catside">
			<?php 
				include ROOT_PATH."/includes/catside.php"; 
			?>
		</div>
	</div>
	<?php
		include ROOT_PATH."/footer.php"; 
	?>
</body>
<?php include ROOT_PATH."/includes/fonts.php"; ?>
</html>