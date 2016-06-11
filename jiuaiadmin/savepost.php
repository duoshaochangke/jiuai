<?php
	/*设置编码*/
	header("content-type:text/html;charset=utf-8");
	define("JA_DWQS", "jiuaidwqs");  //调用includes下的文件
	include "../includes/constant.inc.php";  
	include ROOT_PATH."/includes/JADB.class.php";

	global $jadb1;   //全局变量
	$jadb1 = new JADB(JA_DB_HOST,JA_DB_USER,JA_DB_PWD,JA_DB_NAME);
	if(!$jadb1->isConnectError())
	{
		echo $jadb1->getErrorInfo();
	}
	include ROOT_PATH."/includes/func.php"; 

	$postURL = JA_URL."/jiuaiadmin/post-new.php";
	$dataArr = array();   //保存数据的数组

	if((strcmp($_SERVER['HTTP_REFERER'], $postURL) === 0)  && (strcmp($_SERVER['HTTP_HOST'], MYHOST) === 0))
	{
		if(isset($_GET["act"]) && isset($_GET["do"]))
		{
			if(!empty($_GET["act"])  && !empty($_GET["do"]) &&
				$_GET["act"] === "postok" && $_GET["do"] === "save")
			{
				$dataArr["blogtitle"] = addslashes($_POST["blogtitle"]);
				$dataArr["source"] = addslashes($_POST["source"]);
				$dataArr["slink"] = addslashes($_POST["slink"]);
				// $dataArr["blogcategory"] = addslashes($_POST["blogcategory"]); 返回空
				// 获取的是个数组，不能直接用addslashes过滤，要循环单个过滤
				$dataArr["blogcategory"] = $_POST["blogcategory"];   //返回数组
				$dataArr["blogtags"] = addslashes(strtolower($_POST["blogtags"]));
				$dataArr["blogcontent"] = addslashes($_POST["blogcontent"]);
				$dataArr['blogimg'] = $_FILES["blogimg"];
				$dataArr['imgsize'] = $_POST["MAX_FILE_SIZE"];

				// 获取已经插入的最大ID  上线时要用base64_encode加密传参数
				// $newIdRow = $jadb1->getRow("select max(article_id) as id from articles;");
				// if(is_integer($newIdRow) || $newIdRow === 0)
				// {
				// 	$newId = 1;
				// }
				// else
				// {
				// 	$newId = $newIdRow['id'] + 1;;      //插入数据前最后一个id
				// }
				// 时间戳
				$uni = time();
				$dataArr['articleuniqid'] = addslashes($uni);
				// $dataArr['articlelink'] = addslashes(JA_URL."/articles/details.php?artid=$newId&artuni=$uni");
				$dataArr['articlelink'] = addslashes(JA_URL."/articles/details.php?artuni=$uni");
				// 过滤类别数组，并转为字符串
				$length = count($dataArr["blogcategory"]);
				for ($i=0; $i < $length; $i++) 
				{ 
					$dataArr["blogcategory"][$i] = addslashes($dataArr["blogcategory"][$i]);
				}
				$dataArr["blogcategory"] = implode(",", $dataArr["blogcategory"]);
				$imgURL = "";

				// 没有上传图像
				if(!empty($dataArr['blogimg']['name']))
				{
					$imgURL =  JA_URL.substr(checkImgFile($dataArr['blogimg']),2);
				}
				else
				{
					$imgURL = JA_URL."/images/blog/".md5(rand(1,40)).".jpg";
				}
				$dataArr['articleimg'] = addslashes($imgURL);

				// 插入数据库
				$jadb1->closeAuto();
				$jadb1->beginTransaction();

				// 插入articles表
				$insertArticleSql = "";
				$insertId = $jadb1->saveQueryOperation($insertArticleSql);
				$artuniqid = $dataArr['articleuniqid'];
				$articleAffectedRows =$jadb1->operationAffectedRows();

				if(!$articleAffectedRows && !$insertId)
				{
					$jadb1->rollBackTransaction();
				}

				// 更新category表
				$catArr = explode(",", $dataArr["blogcategory"]);
				$catArrLen = count($catArr);
				$catUapteSql = "update category set category_count = category_count+1 where category_id=";
				$rows = array();
				switch ($catArrLen) 
				{
					case 1:
						$jadb1->saveQueryOperation($catUapteSql.$catArr[0]);
						$catAffectedRows = $jadb1->operationAffectedRows();
						array_push($rows, $catAffectedRows);
						break;
					case 2:
						$jadb1->saveQueryOperation($catUapteSql.$catArr[0]);
						$catAffectedRows = $jadb1->operationAffectedRows();
						array_push($rows, $catAffectedRows);

						$jadb1->saveQueryOperation($catUapteSql.$catArr[1]);
						$catAffectedRows = $jadb1->operationAffectedRows();
						array_push($rows, $catAffectedRows);
						break;
					case 3:
						$jadb1->saveQueryOperation($catUapteSql.$catArr[0]);
						$catAffectedRows= $jadb1->operationAffectedRows();
						array_push($rows, $catAffectedRows);

						$jadb1->saveQueryOperation($catUapteSql.$catArr[1]);
						$catAffectedRows = $jadb1->operationAffectedRows();
						array_push($rows, $catAffectedRows);

						$jadb1->saveQueryOperation($catUapteSql.$catArr[2]);
						$catAffectedRows = $jadb1->operationAffectedRows();
						array_push($rows, $catAffectedRows);
						break;
				}

				if(!$rows)
				{
					$jadb1->rollBackTransaction();
				}

				// 更新tags表
				// 判断tags是否重复
				if($jadb1->getQuery(""))
				{
					$jadb1->saveQueryOperation();
				}
				else
				{
					// 没有重复就添加
					$jadb1->saveQueryOperation();
				}
				$tagsAffectedRows = $jadb1->operationAffectedRows();
				if(!$tagsAffectedRows)
				{
					$jadb1->rollBackTransaction();
				}

				if(($articleAffectedRows > 0) &&(!empty($rows)) && ($tagsAffectedRows > 0))
				{
					$jadb1->commitTransaction();
					header("location:./post-new.php?artuni=$uni");
				}
				else
				{
					$jadb1->rollBackTransaction();
					$jadb1->closeDB();
					echo "<script>alert('保存失败'),history.back();</script>";
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