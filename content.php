<?php
	if(!defined("JA_DWQS"))
 	{
 		header("location:./index");
 	}
?>
<?php
	if(defined("INDEX")):
?>
	<div class="content">
		<div class="recommend">
			<span class="STXingkai content-span">&nbsp;久艾推荐</span>
			<ul class="article-list">
				<?php
					$articleViewSql = "".ELE;
					getArticles($articleViewSql); 	
				?>
			</ul>
			<a target="_blank" class="more-article STXingkai" href="<?php echo JA_URL; ?>/category/showcat/久艾推荐"><span>>>更多</span></a>
		</div>
		<div class="frontend">
			<span class="STXingkai content-span">&nbsp;前端开发</span>
			<ul class="article-list">
				<?php
					$articleFrontSql = "".ELE;
					getArticles($articleFrontSql);
				?>
			</ul>
			<a target="_blank" class="more-article STXingkai" href="<?php echo JA_URL; ?>/category/showcat/前端开发"><span>>>更多</span></a>
		</div>
		<div class="afterend">
			<span class="STXingkai content-span">&nbsp;后台开发</span>
			<ul class="article-list">
				<?php
					$articleAfterSql = "".ELE;
					getArticles($articleAfterSql);
				?>
			</ul>
			<a target="_blank" class="more-article STXingkai" href="<?php echo JA_URL; ?>/category/showcat/后台开发"><span>>>更多</span></a>
		</div>
		<div class="db">
			<span class="STXingkai content-span">&nbsp;数据库</span>
			<ul class="article-list">
				<?php
					$articleDbSql = "".ELE;
					getArticles($articleDbSql);
				?>
			</ul>
			<a target="_blank" class="more-article STXingkai" href="<?php echo JA_URL; ?>/category/showcat/数据库"><span>>>更多</span></a>
		</div>
		<div class="mobiledev">
			<span class="STXingkai content-span">&nbsp;移动开发</span>
			<ul class="article-list">
				<?php
					$articleMobileSql = "".ELE;
					getArticles($articleMobileSql);
				?>
			</ul>
			<a target="_blank" class="more-article STXingkai" href="<?php echo JA_URL; ?>/category/showcat/移动开发"><span>>>更多</span></a>
		</div>
		<div class="programming">
			<span class="STXingkai content-span">&nbsp;编程语言</span>
			<ul class="article-list">
				<?php
					$articleProgSql = "".ELE;
					getArticles($articleProgSql);
				?>
			</ul>
			<a target="_blank" class="more-article STXingkai" href="<?php echo JA_URL; ?>/category/showcat/编程语言"><span>>>更多</span></a>
		</div>
		<div class="circle">
			<span class="STXingkai content-span">&nbsp;业界分享</span>
			<ul class="article-list">
				<?php
					$articleCircleSql = "".ELE;
					getArticles($articleCircleSql);
				?>
			</ul>
			<a target="_blank" class="more-article STXingkai" href="<?php echo JA_URL; ?>/category/showcat/业界分享"><span>>>更多</span></a>
		</div>
		<div class="devflat">
			<span class="STXingkai content-span">&nbsp;开发平台</span>
			<ul class="article-list">
				<?php
					$articleFlatSql = "".ELE;
					getArticles($articleFlatSql);
				?>
			</ul>
			<a target="_blank" class="more-article STXingkai" href="<?php echo JA_URL; ?>/category/showcat/开发平台"><span>>>更多</span></a>
		</div>
	</div>
<?php
	else:
?>
	<div class="content">
		<div id="error404" class="minijianyingbikaishu">
			<h3>Error 404 - Not Found</h3>
			<p>Sorry, but you are looking for something that isn't here.</p>

			<!-- 随机文章推荐 -->
			<div class="randRecError">
				<ul>
					<?php getRandErrorArticles(); ?>
				</ul>
			</div>
			<!-- 益播404  公益404不好控制 -->
			<iframe scrolling='no' frameborder='0' src='http://yibo.iyiyun.com/Home/Distribute/ad404/key/14234' width='654' height='470' style='display:block;margin-left:10px'></iframe>
		</div>
	</div>
<?php
	endif;
?>