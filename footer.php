<?php
	if(!defined("JA_DWQS"))
 	{
 		header("location:./index");
 	}
?>
<footer>
	<div class="actGotop">
		<a  href="javascript:void(0);" title="返回顶部"></a>
	</div>
	<div class="friend-links STXingkai">
		<span class="links-span">友情链接</span>
		<ul class="linksul ">
			<?php
				$linksSql = "select links_name,links_url from links";
				$linksResults = $jadb->getQuery($linksSql);
				if($jadb->affectedRows($linksResults)):
					while($linksRow = $jadb->getRowsAssoc($linksResults)):
			?>
			 <li>
			 	<a href="<?php echo stripslashes($linksRow['links_url']); ?>" title="<?php echo stripslashes($linksRow['links_name']); ?>" target="_blank">
			 		<?php echo stripslashes($linksRow['links_name']); ?>
			 	</a>
			 </li>
		<?php 
			endwhile; 
			$jadb->freeResult($linksResults);
			$jadb->closeDB();
			else:	
				echo "no data";
			endif;
		?>
		<li>
			<a href="<?php echo JA_URL; ?>/about/jiuai#links" target="_blank">申请友链</a>
		</li>
		</ul>
	</div>
	<div class="reserved">
		<p class="minijianyingbikaishu">
			<a href="<?php echo JA_URL; ?>" title="淡忘~浅思">版权所有 &copy; <?php echo date("Y");?>  久艾分享 </a>版权所有，保留一切权利 &nbsp;&nbsp;|&nbsp;&nbsp;
			<a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn" title="备案号">粤ICP备14062509</a>
			<!-- cnzz统计 -->
		<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254116798'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254116798' type='text/javascript'%3E%3C/script%3E"));</script>
		</p>

	</div>
</footer>