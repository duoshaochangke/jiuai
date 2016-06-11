<?php
	if(!defined("JA_DWQS"))
 	{
 		header("location:./index");
 	}
?>
<?php
	if(defined("INDEX")):
?>
	<div class="side">
		<div class="new-post">
			<span class="STXingkai content-span">&nbsp;最新发布</span>
			<ul class="article-list" id="newAndRand">
				<?php 
					$articleNewPostSql = "
						select 
							article_title,article_img,article_uniqid
						from 
							articles 
						order by 
							article_date desc
						limit 
							7
					";
					getNewArticles($articleNewPostSql); 
				?>
			</ul>
		</div>
		<div class="hot-tags">
			<span class="STXingkai content-span">&nbsp;热门标签</span>
			<ul class="tags-list">
				<?php 
					getHotTags();
				 ?>
			</ul>
		</div>
		<div class="rand-article">
			<span class="STXingkai content-span">&nbsp;随机文章</span>
			<ul class="article-list" id="newAndRand">
				<?php getRandArticles(); ?>
			</ul>
		</div>
	</div>
<?php
	else:
?>
	<div class="side">
		<div class="rand-article">
			<span class="STXingkai content-span">&nbsp;猜你喜欢</span>
			<ul class="article-list" id="newAndRand">
				<?php getRandArticles(); ?>
			</ul>
		</div>
		<div class="hot-tags">
			<span class="STXingkai content-span">&nbsp;热门标签</span>
			<ul class="tags-list">
				<?php 
					getHotTags();
				 ?>
			</ul>
		</div>
	</div>
<?php
	endif;
?>