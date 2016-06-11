<?php
	if(!defined("JA_DWQS"))
	{
		header("location:../index");
	}
?>
<?php
	// 分页类
	class PAGE
	{
		private $totalPage;    //总页数
		private $totalData;    //影响的总的记录数
		private $curPage=1;      //当前页,默认是1
		private $perPage;      //每一页显示的条数

		//来自showcat.php/showtag.php/search.php页的当前分页中自带的参数
		private $paramName;             
		// 当前目录
		private $curPath;

		function __construct($perPage,$paramName,$curPath)
		{
			$this->perPage = $perPage;
			$this->paramName = $paramName;
			$this->curPath = $curPath;
		}

		// 设置总数据
		function setTotalData($totalData)
		{
			$this->totalData = $totalData;
		}
		
		// 获取总的页数
		function getTotalPage()
		{
			$this->totalPage = ceil($this->totalData / $this->perPage);
			return $this->totalPage;
		}

		// 获取当前页
		function getCurPage()
		{
			return $this->curPage;
		}

		// 设置当前页
		function setCurPage($curPage)
		{
			// echo $curPage;
			if($curPage <= 0)            //页数小于0
			{
				$this->curPage = 1;
			}
			else if($curPage > $this->getTotalPage())  //页数大于总页数
			{
				$this->curPage = $this->getTotalPage();
			}
			else
			{
				$this->curPage = $curPage;
			}
		}

		// 输出分页列表
		function getPages()
		{
			if($this->totalData <= $this->perPage)
			{
				echo '<li>';
				echo '<a class="curpage" >'.$this->curPage;
				echo '</a>';
				echo '</li>';
			}
			else
			{
				$allPage = $this->getTotalPage();
				for ($i=1; $i <= $allPage; $i++) 
				{ 
					echo '<li>';
					if($this->getCurPage() == $i)
					{
						echo '<a class="curpage">'.$i;
						echo '</a>';
					}
					else
					{
						echo '<a href="'.$this->curPath.'/page/'.$i.'-'.$this->paramName.'">'.$i;
						// echo '<a href="'.$this->curPath.'/page.php?num='.$i.'&pq='.$this->paramName.'">'.$i;
						echo '</a>';
					}
					echo '</li>';
					echo ' ';
				}
			}
		}
	}
?>