<?php 
session_start();
require_once "classes/Authentication.php";
require_once "classes/DBAccess.php";

include "settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

$sql = "select categoryID, categoryName from category";
$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);
ob_start();
include "templates/categoriesBottom.html.php";
$outputBottomCategory = ob_get_clean();
ob_start();
include "templates/categoriesTop.html.php";
$outputTopCategory = ob_get_clean();

$title = "Successful login";

$loginName = $_SESSION["username"];

ob_start();

include "templates/success.html.php";

$output = ob_get_clean();

if (isset($_SESSION["theme"])) {
	$theme = $_SESSION["theme"] . ".css";
}
elseif (isset($_COOKIE["theme"])) {
	$theme = $_COOKIE["theme"] . ".css";
}
else {
	$theme = "style_plain.css";
}

include "templates/layoutMaintain.html.php";

 ?>