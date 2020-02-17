<?php 

require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
session_start();
$title = "Homepage";

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

if (isset($_GET["id"])) {
			$sql = "select itemID, photoPath, itemName, price, salePrice from item where categoryID = :id";

			$stmt = $pdo->prepare($sql);

			$stmt->bindValue(":id", $_GET["id"]);

			$rows = $db->executeSQL($stmt);

			$sectionTitle = "Products";

			include "templates/products.html.php";
	}

else {
			$sql = "select itemID, photoPath, itemName, price, salePrice from item where featured = 1";

			$stmt = $pdo->prepare($sql);

			$rows = $db->executeSQL($stmt);

			$sectionTitle = "Featured products";

			include "templates/home.html.php";
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