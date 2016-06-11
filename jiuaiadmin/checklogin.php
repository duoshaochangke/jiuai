<?php
	//开启session
	session_start();
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件

	include "../includes/constant.inc.php";  
	include ROOT_PATH."/includes/JADB.class.php"; 
	global $jadb;   //全局变量
	$dataArr = array();   //用来接收数据的数组,建议用数组，不要用变量
	$jadb = new JADB(JA_DB_HOST,JA_DB_USER,JA_DB_PWD,JA_DB_NAME);
	if(!$jadb->isConnectError())
	{
		echo $jadb->getErrorInfo();
	}

	// 判断是否从jiuailogin.php页面进入和主机名
	// 获取此页面的起一个url:$_SERVER['HTTP_REFERER']; 
	$loginURL = JA_URL."/jiuaiadmin/jiuailogin.php";

	if((strcmp($_SERVER['HTTP_REFERER'],$loginURL) === 0) && (strcmp($_SERVER['HTTP_HOST'],MYHOST) === 0))
	{
		if(isset($_GET["action"]) && isset($_GET["jar"]))
		{
			if(!empty($_GET["action"])  && !empty($_GET["jar"]) &&
				$_GET["action"] === "login" && $_GET["jar"] === sha1(JA_DWQS))
			{

				$dataArr["uniqid"] = addslashes($_POST["uniqid"]);
				$dataArr["username"] = addslashes($_POST["user"]);
				$dataArr["pwd"] = md5(addslashes($_POST["pwd"]));
				if($dataArr["uniqid"] === $_SESSION["uniqid"])
				{
					if(!$jadb->isConnectError())
					{
						echo $jadb->getErrorInfo();
					}
					include ROOT_PATH."/includes/func.php"; 
					// 判断是否正确登陆
					if(checkLogin($dataArr))
					{
						define("MANAGE", "manage");    //引入管理页的css文件
						$_SESSION["jiuaiuser"] = $dataArr["username"];
						$jadb->closeDB();
						header("location:./manage.php");
					}
					else
					{
						header("location:../index");
					}
				}
				else
				{
					header("location:../index");
				}
			}
			else
			{
				header("location:../index");
			}
		}
		else
		{
			header("location:../index");
		}
	}
	else
	{
		header("location:../index");
	}
?>
