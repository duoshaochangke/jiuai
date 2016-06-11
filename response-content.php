<?php
	// 查询全部
	//对于这种查询，按照索引或者主键降序 提高速度
	$catSql = "
		select 
			article_title,article_uniqid,article_img,article_source,article_date,article_views,article_content
		from 
			articles
		order by 
			article_date desc
	";
	$catResults = $jadb->getQuery($catSql);
?>

<div class="catarticles">
	<!-- 结果集不为空 -->
	<?php if($catResults): ?>
		<?php 
			while($catRow = $jadb->getRowsAssoc($catResults)):
				//echo  $catRow['article_title'];
		?>       
			<div class="response-articlelist">
				<div class="response-articletitle">
					<a href="<?php echo JA_URL.'/articles/'.stripslashes($catRow['article_uniqid']); ?>" title="<?php echo stripslashes($catRow['article_title']); ?>" target="_blank">
						<?php echo stripslashes($catRow['article_title']); ?>
					</a>
				</div>
				<div class="response-articleimg">
					<a href="<?php echo JA_URL.'/articles/'.stripslashes($catRow['article_uniqid']); ?>" title="<?php echo stripslashes($catRow['article_title']); ?>"  target="_blank">
						<img src="<?php echo stripslashes($catRow['article_img']); ?>" title="<?php echo stripslashes($catRow['article_title']); ?>">
					</a>
				</div>
				<div class="response-articledata">
					<div class="response-articlemeta minijianyingbikaishu">
						<img src="./images/author.png">&nbsp;<?php echo stripslashes($catRow['article_source']); ?>
						<img src="./images/time.png">&nbsp;<?php echo substr(stripslashes($catRow["article_date"]), 0,-9); ?>
						<img src="./images/read.png">&nbsp;<?php echo stripslashes($catRow['article_views']); ?>人看过
					</div>
					<div class="response-articlesumary">
						<?php echo strip_tags(stripslashes($catRow['article_content'])); ?>
					</div>
					<div class="response-articleread">
						<a href="<?php echo JA_URL.'/articles/'.stripslashes($catRow['article_uniqid']); ?>" title="<?php echo stripslashes($catRow['article_title']); ?>">阅读全文>></a>
					</div>
				</div>
			</div>
		<?php
			endwhile;
		?>
		<div class="response-more" id="more">
			点击加载更多
		</div>
	<?php
		else:
			header("location:./404.php");
		endif;
	?>
</div>

<?php include ROOT_PATH."/includes/fonts.php"; ?>
