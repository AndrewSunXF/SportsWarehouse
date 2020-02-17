<?php 
require_once "classes/DBAccess.php";
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
session_start();
$title = "Search Results";

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

if (isset($_GET["submitButton"]) && isset($_GET["search"])) {
	
	$search = $_GET["search"];

	$sql = "select itemID, photoPath, itemName, price, salePrice from item where itemName like :itemName";

	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(":itemName", "%$search%");

	$rows = $db->executeSQL($stmt);

	if (empty($rows)): ?>
		<p id="noItem">Sorry, we couldn't find the item. Please try another one : )</p>
	<?php else: 
		$sectionTitle = "Search result";
		include "templates/products.html.php";
		endif;
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