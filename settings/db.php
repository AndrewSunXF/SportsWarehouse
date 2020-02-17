<?php 
	if($_SERVER["SERVER_NAME"] == "localhost" || $_SERVER["SERVER_ADDR"] == "127.0.0.1") {
		$dsn = "mysql:host=localhost;dbname=sportswarehouse;charset=utf8";
		$username = "root";
		$password = "";
	}
	else {
		$dsn = "mysql:host=localhost;dbname=magenta13;charset=utf8";
		$username = "magenta13";
		$password = "war94";
	}
 ?>