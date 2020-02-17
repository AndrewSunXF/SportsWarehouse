<?php 
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
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

$title = "Login";
$sectionTitle = "Administration Login";

if (isset($_SESSION["username"])) {

	ob_start(); ?>

	<p class="showMessage">You have logged in</p>

	<p class="button"><a href="maintainCategory.php">Maintain category</a></p>
	<p class="button"><a href="maintainProduct.php">Maintain product</a></p>
	<p class="button"><a href="changePassword.php">Change password</a></p>
	<p class="button"><a href="changeTheme.php">Change theme</a></p>	
<?php
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
}
else {

	$message = "";

	if (isset($_POST["loginSubmit"])) {
		if (!empty($_POST["username"]) && !empty($_POST["password"])) {
			$loginSuccess = Authentication::login($_POST["username"], $_POST["password"]);
			if (!$loginSuccess) {
				$message = "Username or password incorrect";
				$error = true;
			}
		}
	}

	ob_start();

	include "templates/loginForm.html.php";

	$output = ob_get_clean();

	if (!isset($_SESSION["cart"])) {
					$cart = new ShoppingCart();
				}
				else {
					$cart = $_SESSION["cart"];
				}

	$countTotalItems = $cart->count();

	include "templates/layout.html.php";
}
 ?>