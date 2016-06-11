<?php
	session_start();
	if(!empty($_GET['action'])  && $_GET['action'] === "logout")
	{
		if($_GET["uni"] === $_SESSION["uniqid"])
		{
			unset($_SESSION["jiuaiuser"]);
			session_destroy();
			header("location:../index");
		}
	}
?>