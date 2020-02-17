<?php 
session_start();
	require_once "classes/Authentication.php";
  	Authentication::protect();
	require_once "classes/DBAccess.php";

	$title = "Theme";
	
	include "settings/db.php";
	$db = new DBAccess($dsn, $username, $password);
	$pdo = $db->connect();
	$sql = "select categoryID, categoryName from category";
	$stmt = $pdo->prepare($sql);
	$rows = $db->executeSQL($stmt);
	ob_start();
	include "templates/categoriesBottom.html.php";
	$outputBottomCategory = ob_get_clean();

	$sectionTitle = "Select Theme";

	if (isset($_SESSION["theme"])) {
		$theme = $_SESSION["theme"] . ".css";
	}
	elseif (isset($_COOKIE["theme"])) {
		$theme = $_COOKIE["theme"] . ".css";
	}
	else {
		$theme = "style_plain.css";
	}

	if (isset($_POST["submit"])) {
		$_SESSION["theme"] = $_POST["theme"];
		$theme = $_SESSION["theme"] . ".css";

		setcookie("theme", $_POST["theme"], time()+ 60*60*24*365);
	}

	ob_start();

	include "templates/themeForm.html.php";

	$output = ob_get_clean();

	include "templates/layoutMaintain.html.php";

 ?>