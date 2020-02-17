<?php 
require_once "classes/DBAccess.php";
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
session_start();
$title = "Product details";
$sectionTitle = "Product information";

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

$sql = "select itemID, photoPath, itemName, price, salePrice, description from item where itemID = :id";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":id", $_GET["id"]);

$rows = $db->executeSQL($stmt);

ob_start();
include "templates/singleItem.html.php";
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
