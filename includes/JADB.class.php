<?php
	if(!defined("JA_DWQS"))
	{
		header("location:../index");
	}
?>
<?php
	/**
	* 数据库操作类
	*/
	// define在类外定义常量，const在类内定义常量
	class JADB
	{
		// 私有变量
		private $db_host;
		private $db_user;
		private $db_pwd;
		private $db_name;
		private $mysqli_conn;             //连接资源符号
		private $errorInfo;                   //返回连接信息
		
		// 构造函数
		function __construct($db_host,$db_user,$db_pwd,$db_name)
		{
			$this->db_host = $db_host;
			$this->db_user = $db_user;
			$this->db_pwd = $db_pwd;
			$this->db_name = $db_name;
		}

		// 连接数据库
		private function connectDB()
		{
			return new mysqli($this->db_host,$this->db_user,
				$this->db_pwd,$this->db_name);
		}

		// 连接错误
		function isConnectError()
		{
			$this->mysqli_conn = $this->connectDB();
			// 设置编码
			$this->mysqli_conn->query("set names utf8");
			// 没有出错时返回0
			if(!$this->mysqli_conn->connect_errno)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		// 错误信息
		function getErrorInfo()
		{
			if(!$this->isConnectError())
			{
				$this->errorInfo = 'Visited Failed:'.md5($this->mysqli_conn->connect_error);
			}
			return $this->errorInfo;
		}

		// 查询，获取结果集
		function getQuery($sql)
		{
			// 关闭自动提交
			$this->mysqli_conn->autocommit(false);
			// 开启事务
			if($this->mysqli_conn->begin_transaction())
			{
				$results = $this->mysqli_conn->query($sql);
				if($this->mysqli_conn->affected_rows)
				{
					// 提交事务
					$this->mysqli_conn->commit();
					return $results;
				}
				else
				{
					// 回滚事务
					$this->mysqli_conn->rollback();
				}
			}
		}

		// 获取结果集的具体数据,多条数据,用于列表循环
		function getRowsAssoc($results)
		{
			return $results->fetch_assoc();
		}

		// 获取一条数据
		function getRow($sql)
		{
			if($this->getQuery($sql))
			{
				return $this->getQuery($sql)->fetch_array(MYSQLI_ASSOC);
			}
			else
			{
				return 0;
			}
			
		}

		// 返回查询影响的行数
		function affectedRows($results)
		{
			return $results->num_rows;
		}

		// 释放结果集
		function freeResult($results)
		{
			$results->free();
		}
		// 关闭连接
		function closeDB()
		{
			$this->mysqli_conn->close();
		}

		// 操作出错
		function errorOperation()
		{
			header("location:../404.php");
		}

		// 以下方法专门给后台savepost.php调用,其他页面不能调用
		function closeAuto()
		{
			$this->mysqli_conn->autocommit(false);
		}
		function beginTransaction()
		{
			$this->mysqli_conn->begin_transaction();
		}
		// 返回插入的id
		function saveQueryOperation($sql)
		{
			$this->mysqli_conn->query($sql);
			return $this->mysqli_conn->insert_id;
		}
		// 返回插入、更新等操作影响的行数
		function operationAffectedRows()
		{
			return $this->mysqli_conn->affected_rows;
		}
		function commitTransaction()
		{
			$this->mysqli_conn->commit();
		}
		function rollBackTransaction()
		{
			$this->mysqli_conn->rollback();
		}
	}
?>