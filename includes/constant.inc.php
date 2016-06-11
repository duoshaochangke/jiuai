<?php
	if(!defined("JA_DWQS"))
	{
		echo "test1";
		header("location:../index");
	}
	error_reporting(E_ALL^E_WARNING^E_NOTICE);  //关闭警告和通知
	/*转换硬路径，引入文件速度比require快*/
	define('ROOT_PATH',substr(dirname(__FILE__), 0,-9));
	// root_path=/alidata/www/jiuai 

	// 转义是否自动开启,开启返回true
	// 不管magic_quotes_gpc是On还是Off，添加数据时都用addslashes()
	// 当On时，必须使用stripslashes()，Off时则不能用stripslashes()。
	// define('GPC', get_magic_quotes_gpc());
	// 定义主机常量
	define("MYHOST", "blog.92fenxiang.com");
	// 定义常量文件
	define("ALL", "global");
	// 数据库常量
	define("JA_DB_NAME", "");
	define("JA_DB_HOST", "");
	define("JA_DB_USER", "");
	define("JA_DB_PWD", "");
	// URL常量
	define("JA_URL", "http://blog.92fenxiang.com");
	// 首页各类板块显示的文章篇数
	define("ELE", 11);
	// 分页时，每页显示的记录条数
	define("TW", 15);
?>