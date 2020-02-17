<?php 
	require_once "classes/Product.php";
	require_once "classes/ShoppingCart.php";

	session_start();

	$title = "Shop";
	$sectionTitle = "Shopping cart";

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


	$product = new Product();

	$orderMessage = "";

	if(isset($_POST["buy"])) {
		if (!empty($_POST["itemID"]) && !empty($_POST["qty"])) {
			$productId = $_POST["itemID"];
			$qty = $_POST["qty"];
			$product->getProduct($productId);
			if ($product->getSalePrice() != 0) {
				$realPrice = $product->getSalePrice();
			}
			else {
				$realPrice = $product->getPrice();
			}
			$item = new CartItem($product->getPhotoPath(), $product->getProductName(), $qty, $realPrice, $productId);

			if (!isset($_SESSION["cart"])) {
				$cart = new ShoppingCart();
			}
			else {
				$cart = $_SESSION["cart"];
			}

			$cart->addItem($item);

			$_SESSION["cart"] = $cart;
		}
	}

	if (isset($_POST["remove"])) {
		if (!empty($_POST["itemID"]) && isset($_SESSION["cart"])) {
			$productId = $_POST["itemID"];

			$item = new CartItem("", "", 0, 0, $productId);

			$cart = $_SESSION["cart"];
			$cart->removeItem($item);
			$_SESSION["cart"] = $cart;
		}
	}

	if (isset($_POST["itemID"]) && (isset($_POST["qtyAdd"]) || isset($_POST["qtySubtract"]))) {
		$qty = isset($_POST["qtyAdd"]) ? 1 : -1;
		$item = new CartItem("", "", $qty, 0, $_POST["itemID"]);
		$cart = $_SESSION["cart"];
		$orderMessage = $cart->updateItem($item, true);
		$_SESSION["cart"] = $cart;
	}

	if (isset($_POST["itemID"]) && isset($_POST["setQty"])) {
		$qty = $_POST["qtyInCart"];
		$item = new CartItem("", "", $qty, 0, $_POST["itemID"]);
		$cart = $_SESSION["cart"];
		$orderMessage = $cart->updateItem($item, false);	
		$_SESSION["cart"] = $cart;

	}
	ob_start();

	include "templates/displayShoppingCart.html.php";

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