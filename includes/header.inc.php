<?php
	if(!defined("JA_DWQS"))
	{
		header("location:../index");
	}
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="前端开发,后台开发,编程语言,数据库,移动开发,业界资讯，
开发平台,html,html5,css,css3,js,jq,php,ruby,python,mysql,nosql,android,ios,it,c,c++,java,javaweb">
<meta name="description" content="久艾分享-分享互联网的优质资源">
<meta name="robots" content="all" />
<meta name="author" content="James,461147874@qq.com">
<!-- 微博关注组件 -->
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>

<?php
	// php替代语法时 不能有空格
	if(defined("WRAP")):   //首页
?>
	<link rel="shortcut icon" type="image/x-icon" href="./images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="./css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="./css/<?php echo WRAP; ?>.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<!-- 响应式css 开始-->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script type="text/javascript" src="./js/response.js"></script>
	<link rel="stylesheet" media="screen and (max-width:415px)" type="text/css" href="./css/responseip.css">
	<link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="./css/responsepc.css">
	<!-- 响应式css结束 -->

	<script type="text/javascript" src="./js/<?php echo ALL; ?>.js"></script>
	<!-- 百度浮窗分享 -->
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"left","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php
	elseif(defined("JIUAI")):    //关于+免责+版权页面
?>
	<link rel="shortcut icon" type="image/x-icon" href="../images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="../css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="../css/<?php echo JIUAI; ?>.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../css/responsepc.css">
	<script type="text/javascript" src="../js/<?php echo ALL; ?>.js"></script>
<?php
	elseif(defined("MSG")):    //留言
?>
	<link rel="shortcut icon" type="image/x-icon" href="./images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="./css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="./css/<?php echo MSG; ?>.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../css/responsepc.css">
	<script type="text/javascript" src="./js/<?php echo ALL; ?>.js"></script>
<?php
	elseif(defined("DETAILS")): 
 ?>
	<link rel="shortcut icon" type="image/x-icon" href="../images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="../css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="../css/<?php echo DETAILS; ?>.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<!-- 响应式css 开始-->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/response.js"></script>
	<link rel="stylesheet" media="screen and (max-width:415px)" type="text/css" href="../css/responseip.css">
	<link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../css/responsepc.css">
	<!-- 响应式css结束 -->
	<script type="text/javascript" src="../js/<?php echo DETAILS; ?>.js"></script>
	<script type="text/javascript" src="../js/<?php echo ALL; ?>.js"></script>
<?php
	elseif(defined("CATAGORY")):
?>
	<link rel="shortcut icon" type="image/x-icon" href="../../images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="../../css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="../../css/<?php echo CATAGORY; ?>.css">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<!-- 响应式css 开始-->
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script type="text/javascript" src="../../js/response.js"></script>
	<link rel="stylesheet" media="screen and (max-width:415px)" type="text/css" href="../../css/responseip.css">
	<link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../../css/responsepc.css">
	<!-- 响应式css结束 -->
	<script type="text/javascript" src="../../js/<?php echo CATAGORY; ?>.js"></script>
	<script type="text/javascript" src="../../js/<?php echo ALL; ?>.js"></script>
	<!-- 百度浮窗分享 -->
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"left","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php
	elseif(defined("PAGE")):                    //cat和tag分页页面
?>
	<link rel="shortcut icon" type="image/x-icon" href="../../images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="../../css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="../../css/cat.css">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<!-- 响应式css 开始-->
	<link rel="stylesheet" media="screen and (max-width:415px)" type="text/css" href="../../css/style.css">
	<script type="text/javascript" src="../../js/response.js"></script>
	<link rel="stylesheet" media="screen and (max-width:415px)" type="text/css" href="../../css/responseip.css">
	<link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../../css/responsepc.css">
	<!-- 响应式css结束 -->
	<script type="text/javascript" src="../../js/cat.js"></script>
	<script type="text/javascript" src="../../js/<?php echo ALL; ?>.js"></script>
	<!-- 百度浮窗分享 -->
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"left","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php
	elseif(defined("Q")):              //search.php
?>
	<link rel="shortcut icon" type="image/x-icon" href="../images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="../css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="../css/cat.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/cat.js"></script>
	<link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../../css/responsepc.css">
	<script type="text/javascript" src="../js/<?php echo ALL; ?>.js"></script>
	<!-- 百度浮窗分享 -->
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"left","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php
	elseif(defined("PAGEQ")):                     //搜索页分页页面
?>
	<link rel="shortcut icon" type="image/x-icon" href="../../images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="../../css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="../../css/cat.css">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/cat.js"></script>
	<script type="text/javascript" src="../../js/<?php echo ALL; ?>.js"></script>
	<!-- 百度浮窗分享 -->
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"left","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php
	elseif(defined("LOGIN")):       //登陆
?>
	<link rel="shortcut icon" type="image/x-icon" href="../images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="../css/<?php echo LOGIN; ?>.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/<?php echo LOGIN; ?>.js"></script>
<?php
	elseif(defined("MANAGE")):       //后台管理
?>
	<link rel="shortcut icon" type="image/x-icon" href="../images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="../css/<?php echo MANAGE; ?>.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/<?php echo MANAGE; ?>.js"></script>
<?php
	elseif(defined("TOUGAO")):     //投稿页面
?>
	<link rel="shortcut icon" type="image/x-icon" href="./images/jiu.ico" />
	<link rel="stylesheet" type="text/css" href="./css/<?php echo ALL; ?>.css">
	<link rel="stylesheet" type="text/css" href="./css/<?php echo TOUGAO; ?>.css">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<link rel="stylesheet" media="screen and (min-width:900px)" type="text/css" href="../../css/responsepc.css">
	<script type="text/javascript" src="./js/<?php echo TOUGAO; ?>.js"></script>
	<script type="text/javascript" src="./js/<?php echo ALL; ?>.js"></script>
	<!-- 百度浮窗分享 -->
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"left","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php
	endif;
?>
<!--如果浏览器不支持HTML5(也可以用modernizer)-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->