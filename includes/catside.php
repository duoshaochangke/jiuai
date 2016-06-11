<?php
	// 多说获取热评文章
	// $hot = "http://api.duoshuo.com/sites/listTopThreads.json?short_name=testjiuai&num_items=5&range=weekly";
	// $data = file_get_contents($hot);
	// 设置true返回数组,不设置或者是false则返回对象
	// $resjson= json_decode($data);
	// print_r($resjson->response[0]->thread_key);
	if(!defined("JA_DWQS"))
 	{
 		header("location:../index");
 	}
?>
<div class="commsort">
	<span class="STXingkai content-span">&nbsp;周评论排行</span>
	<ul  class="ds-top-threads" data-range="weekly" data-num-items="7"></ul>
	<!--多说js加载开始，一个页面只需要加载一次 -->
	<?php include "../comments.php";?>
	<!--多说js加载结束，一个页面只需要加载一次 -->
</div>

<div class="readsort">
	<span class="STXingkai content-span">&nbsp;阅读排行</span>
	<ul class="article-list" id="newAndRand">
		<?php 
			//阅读排行sql
			$articleNewPostSql = "";
			getNewArticles($articleNewPostSql); 
		?>
	</ul>
</div>

<!-- 最新评论 -->
<div class="newcomm">
	<span class="STXingkai content-span">&nbsp;最新评论</span>
	<ul class="ds-recent-comments" data-num-items="7" data-show-avatars="1" data-show-time="1" data-show-admin="0" data-excerpt-length="70"></ul>
</div>