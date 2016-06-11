<?php
	// echo "类别：".$_GET['pq']."<br/>";
	// echo "别名：".base64_decode($_GET['pn'])."<br/>";
	// echo "ID：".base64_decode($_GET['pd'])."<br/>";
	// echo "第".$_GET['num'].'页';
?>
<?php
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
	// 三个查询参数
	if(count(split('&', $_SERVER['QUERY_STRING'])) === 2)
	{
		// cn:类别名   ca:类别别名  cd:类别id
		if(isset($_GET['pq']) && isset($_GET['num']))
		{
			if(!empty($_GET['pq'])  && !empty($_GET['num']))
			{
				define("PAGE", "page");    //引入类别页的css文件,
				include "../includes/constant.inc.php";  
				include ROOT_PATH."/includes/PAGE.class.php";
				$curPath = JA_URL."/tags";
				$page = new PAGE(TW,$_GET['pq'],$curPath);

				// 获取tag名
				$getTagName = $_GET['pq'];  
				session_start();
				$page->setTotalData($_SESSION['totalData']);      //设置总数据  

				if(intval($_GET['num']))
				{
					//showcat.php/showtag.php/search.php/page.php共用这个模板
					
					include ROOT_PATH."/includes/header.inc.php";  
					include ROOT_PATH."/includes/JADB.class.php"; 
					global $jadb;   //全局变量
					$jadb = new JADB(JA_DB_HOST,JA_DB_USER,JA_DB_PWD,JA_DB_NAME);
					if(!$jadb->isConnectError())
					{
						echo $jadb->getErrorInfo();
					}
					include ROOT_PATH.'/includes/func.php';

					$sql = "select tags_id from tags where tags_name='".$getTagName."'";
					
					$curPage =  $_GET['num'];                      //当期页

					$page->setCurPage($curPage);
					$curPage = $page->getCurPage();

					// 判断标签是否存在
					if($jadb->getRow($sql)['tags_id'] != 0)
					{
						// 查询标签类别下的
						$tagSql = "".($curPage - 1)*TW.','.TW;
						$tagResults = $jadb->getQuery($tagSql);
					}
					else
					{
						// exit("查询标签不存在");
						header("location:../404.php");
					}
				}
				else
				{
					// echo "参数内容不对";
					header("location:../../404.php");
				}
			}
			else
			{
				// echo "参数内容是空";
				header("location:../../404.php");
			}
		}
		else
		{
			// echo "参数变量名不对";
			header("location:../../404.php");
		}
	}
	else
	{
		// echo "参数个数不对";
		header("location:../../404.php");
	}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<title><?php echo $getTagName; ?>-久艾分享-优质互联网资源共享</title>
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
				<span>标签：<?php echo $getTagName; ?></span>
			</header>
			<div class="catarticles">
				<!-- 结果集不为空 -->
				<?php if($tagResults): ?>
					<?php 
						while($tagRow = $jadb->getRowsAssoc($tagResults)):
					?>
							<div class="articlelist">
								<header class="articletitle">
									<a href="<?php echo JA_URL.'/articles/'.stripslashes($tagRow['article_uniqid']); ?>" title="<?php echo stripslashes($tagRow['article_title']); ?>" target="_blank">
										<?php echo stripslashes($tagRow['article_title']); ?>
									</a>
								</header>
								<div class="articleimg">
									<a href="<?php echo JA_URL.'/articles/'.stripslashes($tagRow['article_uniqid']); ?>" title="<?php echo stripslashes($tagRow['article_title']); ?>"  target="_blank">
										<img src="<?php echo $tagRow['article_img']; ?>" title="<?php echo stripslashes($tagRow['article_title']); ?>">
									</a>
								</div>
								<div class="articledata">
									<div class="articlemeta minijianyingbikaishu">
										<img src="../../images/author.png">&nbsp;<?php echo stripslashes($tagRow['article_source']); ?>
										<img src="../../images/time.png">&nbsp;<?php echo substr(stripslashes($tagRow["article_date"]), 0,-9); ?>
										<img src="../../images/read.png">&nbsp;<?php echo stripslashes($tagRow['article_views']); ?>人看过
									</div>
									<div class="articlesumary">
										<?php echo strip_tags(stripslashes($tagRow['article_content'])); ?>
									</div>
									<div class="articleread">
										<a href="<?php echo JA_URL.'/articles/'.stripslashes($tagRow['article_uniqid']); ?>" title="<?php echo stripslashes($tagRow['article_title']); ?>">阅读全文>></a>
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