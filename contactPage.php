<?php 
	require_once "classes/FormValidation.php";
	require_once "classes/Product.php";
	require_once "classes/ShoppingCart.php";
	session_start();

	$title = "Contact Us";

	$outputTopCategory = "";

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

	$sectionTitle = "Contact Us";
	$form = new FormValidation();

	ob_start();

	if (isset($_POST["submitButton"])) {
		$firstNameMessage = $form->checkEmpty("firstName");
		$firstNameMessage = $firstNameMessage . " " . $form->checkName("firstName");

		$lastNameMessage = $form->checkEmpty("lastName");
		$lastNameMessage = $lastNameMessage . " " . $form->checkName("lastName");

		$emailMessage = $form->checkEmail("email");

		if ($form->valid == true) {
			include "templates/confirmation.html.php";
		}
		else {
			include "templates/contactForm.html.php";
		}
	}

	else {
		$form->valid = true;
		$firstNameMessage = "";
		$lastNameMessage = "";
		$emailMessage = "";
		include "templates/contactForm.html.php";
	}

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