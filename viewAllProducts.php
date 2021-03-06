<?php 
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";

session_start();

$title = "All products";

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

ob_start();

$sql = "select itemID, photoPath, itemName, price, salePrice from item";

$stmt = $pdo->prepare($sql);

$rows = $db->executeSQL($stmt);

$sectionTitle = "All Products";

include "templates/products.html.php";

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