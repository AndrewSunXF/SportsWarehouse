<?php 
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

$title = "Create user";

$message = "";

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
	$message = Authentication::createUser($_POST["username"], $_POST["password"]);
}

ob_start();

include "templates/createUserForm.html.php";

$output = ob_get_clean();

include "templates/layout.html.php";
 ?>