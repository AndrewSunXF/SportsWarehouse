<?php
	require_once "classes/Product.php";
	require_once "classes/ShoppingCart.php";
	session_start();
	require_once "classes/DBAccess.php";
	include "settings/db.php";
	$db = new DBAccess($dsn, $username, $password);
	$pdo = $db->connect();
	$sql = "select categoryID, categoryName from category";
	$stmt = $pdo->prepare($sql);
	$rows = $db->executeSQL($stmt);
	ob_start();
	include "templates/categoriesTop.html.php";
	$outputTopCategory = ob_get_clean();
	ob_start();
	include "templates/categoriesBottom.html.php";
	$outputBottomCategory = ob_get_clean();

	$title = "Order confirmed";
	$sectionTitle = "Thank you for shopping";
	
	$orderId = 0;

	if(isset($_POST["pay"]) && isset($_SESSION["cart"]))
	{
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$creditcard = $_POST["creditcard"];
		$csv = $_POST["csv"];
		$email = $_POST["email"];
		$expiry = $_POST["expiry"];
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$nameOnCard = $_POST["nameOnCard"];
		
		$cart = $_SESSION["cart"];
		$orderId = $cart->saveCart($address, $phone, $creditcard, $csv, $email, $expiry, $firstName, $lastName, $nameOnCard);
		
		session_destroy();
	}
	
	ob_start();
	
	include "templates/orderConfirmation.html.php";
	$output = ob_get_clean();
	if (!isset($_SESSION["cart"])) {
				$cart = new ShoppingCart();
			}
			else {
				$cart = $_SESSION["cart"];
			}

	$countTotalItems = $cart->count();
	include "templates/layout.html.php";
	?>