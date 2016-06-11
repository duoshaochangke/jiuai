$(document).ready(function()
{
	var count = 1;
	$("#icon").on("click",function(){
		if(count == 1){
			$("#response-nav").slideDown(1000);
			count++;
		}
		else{
			$("#response-nav").slideUp(1000);
			count=1;
		}
	});
	// 导航菜单
	$("ul.response-nav-ul>li").each(
		function()
		{
			$(this).on(
				{
					touchstart:function(){
						$(this).find("ul").slideDown(300);
					},
					touchend:function(){
						$(this).find("ul").slideUp(300);
					}
				});
		}
	);

	// 限制文字链接的字数
	$(".response-articlesumary").each(
		function()
		{
			 var maxwidth=100;
			 if($(this).text().length>maxwidth)
			 {
			 	$(this).text($(this).text().substring(0,maxwidth));
			 	$(this).text($(this).text()+'......');
			 }
		}
	);
	//控制文章数
	$('.response-articlelist:gt(11)').hide();
	var totalArticle = $('.response-articlelist').size();
	var showArticles  =12;
	var clickCount = Math.ceil(totalArticle / showArticles);
	var hideArticle = $('.response-articlelist:hidden').size();
	var iCount=1;
	var showArticles;

	$("#more").click(function()
	{
		if(iCount <= clickCount)
		{
			if(hideArticle >= 12)
			{
				$('.response-articlelist:hidden:lt('+showArticles+')').show();
				hideArticle = $('.response-articlelist:hidden').size();
			}
			else
			{
				$('.response-articlelist:gt('+hideArticle+')').show();
				$(this).text("没有更多数据了");
			}
			iCount++;
		}
	});
})