 <?php
 	if(!defined("JA_DWQS"))
 	{
 		header("location:../index");
 	}
 	// 用来存放功能函数

 	// 最新发布
 	function getNewArticles($newSql)
 	{
 		global $jadb;           //声明全局变量
 		
		$articleNewResults = $jadb->getQuery($newSql);
		if($jadb->affectedRows($articleNewResults))
		{
			while($articleNewRow = $jadb->getRowsAssoc($articleNewResults))
			{
				echo '<li>';
 				echo '<a class="aimg" target="_blank" href='.JA_URL.'/articles/'.stripslashes($articleNewRow['article_uniqid']).'><img title="'.stripslashes($articleNewRow['article_title']).'" src="'.stripslashes($articleNewRow['article_img']).'" /></a>';
 				echo '<a class="atext" title="'.stripslashes($articleNewRow['article_title']).'" target="_blank" href='.JA_URL.'/articles/'.stripslashes($articleNewRow['article_uniqid']).'>';
 				echo ' '.stripslashes($articleNewRow['article_title']);
 				echo '</a>';
 				echo '</li>';
			}
			$jadb->freeResult($articleNewResults);	
		}
		else
 		{
 			echo "no data";
 		}
 	}

 	// 首页内容区域的文章列表板块
 	function getArticles($sortSql)
 	{
 		global $jadb;           //声明全局变量
 		$count = -1;
 		
		$articleSortResults = $jadb->getQuery($sortSql);
		if($jadb->affectedRows($articleSortResults))
		{
			while($articleSortRow = $jadb->getRowsAssoc($articleSortResults))
			{
				if($count == -1)
				{
					echo '<li id="first-article">';
	 				echo '<a class="aimg" target="_blank" href='.JA_URL.'/articles/'.stripslashes($articleSortRow['article_uniqid']).'><img title="'.stripslashes($articleSortRow['article_title']).'" src="'.stripslashes($articleSortRow['article_img']).'" /></a>';
	 				echo '<a class="atext" title="'.stripslashes($articleSortRow['article_title']).'" target="_blank" href='.JA_URL.'/articles/'.stripslashes($articleSortRow['article_uniqid']).'>';
	 				echo ' '.stripslashes($articleSortRow['article_title']);
	 				echo '</a>';
	 				echo '</li>';
	 				$count++;
				}
				else
				{
					echo '<li>';
	 				echo '<span>'.$count++.'</span>';
	 				echo '<a target="_blank" title="'.stripslashes($articleSortRow['article_title']).'" href='.JA_URL.'/articles/'.stripslashes($articleSortRow['article_uniqid']).'>';
	 				echo ' '.stripslashes($articleSortRow['article_title']);
	 				echo '</a>';
	 				echo '</li>';
				}
			}
			$jadb->freeResult($articleSortResults);	
		}
		else
 		{
 			echo "no data";
 		}
 	}

 	// 获取热门标签
 	function getHotTags()
 	{
 		global $jadb;           //声明全局变量
 		
 		//标签排序的sql
 		$tagsSortSql = "";
		$tagSortResults = $jadb->getQuery($tagsSortSql);
		if($jadb->affectedRows($tagSortResults))
		{
			while($tagSortRow = $jadb->getRowsAssoc($tagSortResults))
			{
				echo '<a  href="'.JA_URL.'/tags/showtag/'.stripslashes($tagSortRow["tags_name"]).'" title="'.stripslashes($tagSortRow["tags_name"]).'">';
				echo '<li style="background-color:'.randomColor().'">';
 				echo stripslashes($tagSortRow["tags_name"]).'('.stripslashes($tagSortRow["tags_count"]).')';
 				echo '</li>';
 				echo '</a>';
			}
			$jadb->freeResult($tagSortResults);	
		}
		else
 		{
 			echo "no data";
 		}
 	}

 	// 首页边栏获取随机文章
 	function getRandArticles()
 	{
 		global $jadb;           //声明全局变量
 		$idArr = array();
 		$idSql = "select article_id from articles";
 		$idSqlResults = $jadb->getQuery($idSql);
 		if($jadb->affectedRows($idSqlResults))
 		{
 			while ($idRow = $jadb->getRowsAssoc($idSqlResults)) 
 			{
 				array_push($idArr,$idRow['article_id']);
 			}
 			// 不要用array_rand获取随机元素，会产生原数组中不存在的0
 			shuffle($idArr);
 			$randIdArrLen = count($idArr);
 			if($randIdArrLen > 5)
 			{
	 			$randIdArr = array_slice($idArr,0,5);
	 			for ($i=0 ; $i < 5 ; $i++ ) 
	 			{
	 				$randSql = 'select article_title,article_img,article_uniqid from articles where article_id='.$randIdArr[$i];
	 				$randArticle = $jadb->getRow($randSql);
	 				echo '<li>';
	 				echo '<a class="aimg" target="_blank" href='.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'><img title="'.stripslashes($randArticle['article_title']).'" src="'.stripslashes($randArticle['article_img']).'" /></a>';
	 				echo '<a class="atext" title="'.stripslashes($randArticle['article_title']).'" target="_blank" href='.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'>';
	 				echo ' '.stripslashes($randArticle['article_title']);
	 				echo '</a>';
	 				echo '</li>';
	 			}
	 		}
	 		else
	 		{
	 			for ($i=0 ; $i < $randIdArrLen ; $i++ ) 
	 			{
	 				$randSql = 'select article_title,article_link,article_img,article_uniqid from articles where article_id='.$idArr[$i];
	 				$randArticle = $jadb->getRow($randSql);
	 				echo '<li>';
	 				echo '<a class="aimg" target="_blank" href='.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'><img title="'.stripslashes($randArticle['article_title']).'" src="'.stripslashes($randArticle['article_img']).'" /></a>';
	 				echo '<a class="atext" title="'.stripslashes($randArticle['article_title']).'" target="_blank" href='.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'>';
	 				echo ' '.stripslashes($randArticle['article_title']);
	 				echo '</a>';
	 				echo '</li>';
	 			}
	 		}
 		}
 		else
 		{
 			echo "no data";
 		}
 	}

 	// 随机颜色生成
 	function randomColor() 
 	{ 
    		$str = '#'; 
    		for($i = 0 ; $i < 6 ; $i++) 
    		{ 
        			$randNum = rand(0 , 15); 
        			switch ($randNum) 
        			{ 
            				case 10: $randNum = 'A'; break; 
           				case 11: $randNum = 'B'; break; 
            				case 12: $randNum = 'C'; break; 
            				case 13: $randNum = 'D'; break; 
            				case 14: $randNum = 'E'; break; 
            				case 15: $randNum = 'F'; break; 
        			} 
        			$str .= $randNum; 
    		} 
    		return $str; 
	} 

	// 验证登陆
	function checkLogin($checkArr)
	{
		global $jadb;           //声明全局变量
		$checkLoginSql = "";
		if($jadb->getQuery($checkLoginSql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// 验证上传的图片
	function checkImgFile($uploadImg)
	{
		$allowType = array('gif','png','jpeg','jpg');      //允许类型
		$size = 2000000;		       //大小 字节为单位 2M
		$path = "../images/uploads";            //保存根目录
		$errorInfo = "";                                    //返回的错误信息

		// 创建根目录
		if(!file_exists($path))
		{
			mkdir($path);
		}

		// 当前年月
		$curYearMonth = date("Ym");
		// 子目录,必须先创建根目录，在创建子目录
		$newpath = $path.'/'.$curYearMonth;
		if(!file_exists($newpath))
		{
			mkdir($newpath);
		}

		// 判断是否上传到服务器
		if($uploadImg['error'] > 0)
		{
			$errorInfo = "图片上传失败";
			header("location:./post-new.php?info=$errorInfo");
		}

		// 判断是否是允许的类型
		$typeArr = explode(".",$uploadImg['name']);
		$hz = array_pop($typeArr);
	
		if(!in_array($hz,$allowType))
		{
			$errorInfo = "图片类型不允许";
			header("location:./post-new.php?info=$errorInfo");
		}

		// 判断上传图像是否超出大小
		if($uploadImg['size'] > $size)
		{
			$errorInfo = "图片大小超出允许范围";
			header("location:./post-new.php?info=$errorInfo");
		}

		// 为了系统安全，重定义文件名
		$filename = md5(date("YmdHis").rand(100,999)).".".$hz;

		// 判断文件是否是post上传的
		if(is_uploaded_file($uploadImg['tmp_name']))
		{
			if(!move_uploaded_file($uploadImg['tmp_name'], $newpath.'/'.$filename))
			{
				$errorInfo = "图片移动失败";
				header("location:./post-new.php?info=$errorInfo");
			}
		}
		else
		{
			$errorInfo = "图片来源方式不合法";
			header("location:./post-new.php?info=$errorInfo");
		}
		return $newpath.'/'.$filename;
	}

	// 获取details.php页面的相关文章
	function getRelatedArticles($category,$artuni)
	{
		global $jadb;           //声明全局变量

		// 分离有多个类别的，采用正在匹配
		$catArr = explode(",", $category);
		switch (count($catArr)) 
		{
			case 1:
				$category = substr($catArr[0], 0,-1);  //截短一位获取同类别文章
				$relateSql = "";
				break;
			
			case 2:
				$category1 = substr($catArr[0], 0,-1);  //截短一位获取同类别文章
				$category2 = substr($catArr[1], 0,-1);  //截短一位获取同类别文章
				$relateSql = "";
				break;
			case 3:
				$category1 = substr($catArr[0], 0,-1);  //截短一位获取同类别文章
				$category2 = substr($catArr[1], 0,-1);  //截短一位获取同类别文章
				$category3 = substr($catArr[2], 0,-1);  //截短一位获取同类别文章
				
				$relateSql = "";
				break;
		}
		// echo $relateSql."<br/>";
		$relateResults = $jadb->getQuery($relateSql);

		// 对结果集随机排序
		if($jadb->affectedRows($relateResults))
		{
			$len = $jadb->affectedRows($relateResults);  //受影响的行数
			$count = 0; 			      //计数
			$arr = array();                                    //保存已经输出的artuni
			if($len >= 7)
			{
				// echo $len."<br/>";
				for (; $count < 6;) 
				{ 
					// 移动指针到随机一行，0~$len，
					$relateResults->data_seek(mt_rand(0,$len));
					$relateRow = $relateResults->fetch_assoc();
					if($relateRow['article_uniqid'] != intval($artuni))
					{
						if(!in_array($relateRow['article_uniqid'],$arr))
						{
							echo '<a target="_blank"  title="'.stripslashes($relateRow['article_title']).'" href="'.JA_URL.'/articles/'.stripslashes($relateRow['article_uniqid']).'">';
							echo '<li>';
							echo '<img title="'.stripslashes($relateRow['article_title']).'" src="'.stripslashes($relateRow['article_img']).'" />';
							echo '<span>';
							echo stripslashes($relateRow['article_title']);
							echo '</span>';
							echo '</li>';
							echo '</a>';
							$count++;
							array_push($arr,$relateRow['article_uniqid']);
						}
						// else
						// {
						// 	continue;
						// }
					}
				}
			}
			else
			{
				// echo $len."<br/>";
				for (; $count < $len-1;) 
				{ 
					// 移动指针到随机一行，0~$len,索引从0开始
					$relateResults->data_seek(mt_rand(0,$len-1));
					$relateRow = $relateResults->fetch_assoc();
					if($relateRow['article_uniqid'] != intval($artuni))
					{
						if(!in_array($relateRow['article_uniqid'],$arr))
						{
							echo '<a target="_blank"  title="'.stripslashes($relateRow['article_title']).'" href="'.JA_URL.'/articles/'.stripslashes($relateRow['article_uniqid']).'">';
							echo '<li>';
							echo '<img title="'.stripslashes($relateRow['article_title']).'" src="'.stripslashes($relateRow['article_img']).'" />';
							echo '<span>';
							echo stripslashes($relateRow['article_title']);
							echo '</span>';
							echo '</li>';
							echo '</a>';
							$count++;
							array_push($arr,$relateRow['article_uniqid']);
						}
						// else
						// {
						// 	continue;
						// }
					}
				}
			}
			$jadb->freeResult($relateResults);	
		}
		else
 		{
 			echo "no data";
 		}
		
	}
	// 更新阅读次数
	function updateShowViews($artuni,$oldviews)
	{
		global $jadb;           //声明全局变量

		$newViews = $oldviews+1;
		$updateSql = "update articles set article_views= $newViews where article_uniqid=$artuni";
		$jadb->getQuery($updateSql);
		return $newViews;
	}

	// 404页面随机推荐文章
	function getRandErrorArticles()
 	{
 		global $jadb;           //声明全局变量
 		$idErrorArr = array();
 		$idErrorSql = "select article_id from articles";
 		$idSqlErrorResults = $jadb->getQuery($idErrorSql);
 		if($jadb->affectedRows($idSqlErrorResults))
 		{
 			while ($idErrorRow = $jadb->getRowsAssoc($idSqlErrorResults)) 
 			{
 				array_push($idErrorArr,$idErrorRow['article_id']);
 			}
 			// 不要用array_rand获取随机元素，会产生原数组中不存在的0
 			shuffle($idErrorArr);
 			$randIdErrorArrLen = count($idErrorArr);
 			if($randIdErrorArrLen > 10)
 			{
	 			$randIdErrorArr = array_slice($idErrorArr,0,10);
	 			for ($i=0 ; $i < 10 ; $i++ ) 
	 			{
	 				$randErrorSql = 'select article_title,article_img,article_uniqid from articles where article_id='.$randIdErrorArr[$i];
	 				$randErrorArticle = $jadb->getRow($randErrorSql);
	 				echo '<li>';
	 				echo '<img src="./images/error.png" />';
	 				echo '<a  title="'.stripslashes($randErrorArticle['article_title']).'" target="_blank" href='.JA_URL.'/articles/'.stripslashes($randErrorArticle['article_uniqid']).'>';
	 				echo ' '.stripslashes($randErrorArticle['article_title']);
	 				echo '</a>';
	 				echo '</li>';
	 			}
	 		}
	 		else
	 		{
	 			for ($i=0 ; $i < $randIdErrorArrLen ; $i++ ) 
	 			{
	 				$randErrorSql = 'select article_title,article_img,article_uniqid from articles where article_id='.$idArr[$i];
	 				$randErrorArticle = $jadb->getRow($randErrorSql);
	 				echo '<li>';
	 				echo '<img src="./images/error.png" />';
	 				echo '<a title="'.stripslashes($randErrorArticle['article_title']).'" target="_blank" href='.JA_URL.'/articles/'.stripslashes($randErrorArticle['article_uniqid']).'>';
	 				echo ' '.stripslashes($randErrorArticle['article_title']);
	 				echo '</a>';
	 				echo '</li>';
	 			}
	 		}
 		}
 		else
 		{
 			echo "no data";
 		}
 	}

 	// 搜索页获取随机文章
 	function getRandArticlesInSearch()
 	{
 		global $jadb;           //声明全局变量
 		$idArr = array();
 		$idSql = "select article_id from articles";
 		$idSqlResults = $jadb->getQuery($idSql);
 		if($jadb->affectedRows($idSqlResults))
 		{
 			while ($idRow = $jadb->getRowsAssoc($idSqlResults)) 
 			{
 				array_push($idArr,$idRow['article_id']);
 			}
 			// 不要用array_rand获取随机元素，会产生原数组中不存在的0
 			shuffle($idArr);
 			$randIdArrLen = count($idArr);
 			if($randIdArrLen > 5)
 			{
	 			$randIdArr = array_slice($idArr,0,5);
	 			for ($i=0 ; $i < 5 ; $i++ ) 
	 			{
	 				$randSql = 'select article_uniqid,article_title,article_img,article_source,article_date,article_views,article_content from articles where article_id='.$randIdArr[$i];
	 				$randArticle = $jadb->getRow($randSql);
	 				echo '<div class="articlelist">';
	 					echo '<header class="articletitle">';
	 						echo '<a target="_blank" href="'.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'" title="'.stripslashes($randArticle['article_title']).'">';
	 							echo stripslashes($randArticle['article_title']);
	 						echo '</a>';
	 					echo '</header>';
	 					echo '<div class="articleimg">';
	 						echo '<a target="_blank" href="'.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'" title="'.stripslashes($randArticle['article_title']).'">';
	 							echo '<img src="'.stripslashes($randArticle['article_img']).'" title="'.stripslashes($randArticle['article_title']).'" />';
	 						echo '</a>';
	 					echo '</div>';
	 					echo '<div class="articledata">';
	 						echo '<div class="articlemeta minijianyingbikaishu">';
	 							echo '<img src="'.JA_URL.'/images/author.png"/>&nbsp;'.stripslashes($randArticle['article_source']);
	 							echo '<img src="'.JA_URL.'/images/time.png"/>&nbsp;'.substr(stripslashes($randArticle['article_date']), 0,-9);
	 							echo '<img src="'.JA_URL.'/images/read.png"/>&nbsp;'.stripslashes($randArticle['article_views']);
	 						echo '</div>';
	 						echo '<div class="articlesumary">';
	 							echo strip_tags(stripslashes($randArticle['article_content']));
	 						echo '</div>';
	 						echo '<div class="articleread">';
	 							echo '<a target="_blank" href="'.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'" title="'.stripslashes($randArticle['article_title']).'">';
	 								echo "阅读全文>>";
	 							echo '</a>';
	 						echo '</div>';
	 					echo '</div>';
	 				echo '</div>';
	 			}
	 		}
	 		else
	 		{
	 			for ($i=0 ; $i < $randIdArrLen ; $i++ ) 
	 			{
	 				$randSql = 'select article_title,article_img,article_source,article_date,article_views,article_content from articles where article_id='.$idArr[$i];
	 				$randArticle = $jadb->getRow($randSql);
	 				echo '<div class="articlelist">';
	 					echo '<header class="articletitle">';
	 						echo '<a target="_blank" href="'.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'" title="'.stripslashes($randArticle['article_title']).'">';
	 							echo stripslashes($randArticle['article_title']);
	 						echo '</a>';
	 					echo '</header>';
	 					echo '<div class="articleimg">';
	 						echo '<a target="_blank" href="'.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'" title="'.stripslashes($randArticle['article_title']).'">';
	 							echo '<img src="'.stripslashes($randArticle['article_img']).'" title="'.stripslashes($randArticle['article_title']).'" />';
	 						echo '</a>';
	 					echo '</div>';
	 					echo '<div class="articledata">';
	 						echo '<div class="articlemeta minijianyingbikaishu">';
	 							echo '<img src="./images/author.png"/>&nbsp;'.stripslashes($randArticle['article_source']);
	 							echo '<img src="./images/time.png"/>&nbsp;'.substr(stripslashes($randArticle['article_date']), 0,-9);
	 							echo '<img src="./images/read.png"/>&nbsp;'.stripslashes($randArticle['article_views']);
	 						echo '</div>';
	 						echo '<div class="articlesumary">';
	 							echo strip_tags(stripslashes($randArticle['article_content']));
	 						echo '</div>';
	 						echo '<div class="articleread">';
	 							echo '<a target="_blank" href="'.JA_URL.'/articles/'.stripslashes($randArticle['article_uniqid']).'" title="'.stripslashes($randArticle['article_title']).'">';
	 								echo "阅读全文>>";
	 							echo '</a>';
	 						echo '</div>';
	 					echo '</div>';
	 				echo '</div>';
	 			}
	 		}
 		}
 		else
 		{
 			echo "no data";
 		}
 	}
 ?>