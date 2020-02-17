<?php 
session_start();
require_once "classes/Authentication.php";
Authentication::protect();
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

$title = "Change password";
$sectionTitle = "Change password";
$message = "";

if ((!empty($_POST["username"])) && (!empty($_POST["oldPassword"])) && (!empty($_POST["newPassword"]))) {
	if (Authentication::verifyOldPassword($_POST["username"], $_POST["oldPassword"])) {
		$message = Authentication::updatePassword($_POST["username"], $_POST["newPassword"]);
	}
	else {
		$message = "Please enter the correct current passowrd";
	}
}

ob_start();

include "templates/changePasswordForm.html.php";

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