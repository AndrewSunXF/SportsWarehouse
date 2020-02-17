<?php 
session_start();
require_once "classes/Authentication.php";
Authentication::protect();
require_once "classes/Category.php";
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

$title = "Maintain Category";
$message = "";

$category = new Category();

$submitType = "insert";

	if (isset($_POST["submit"]) && ($_POST["operation"] == "insert")) {
		if (!empty($_POST["categoryName"])) {
			$category->setCategoryName($_POST["categoryName"]);
			$id = $category->insertCategory();
			$message = "The category was added";
			$category = new Category();
		}
	}

	if (!empty($_GET["id"]) && $_GET["action"] == "delete") {
		$result = $category->deleteCategory($_GET["id"]);

		if ($result === -1) {
			$message = "This category cannot be deleted as it contains products";
		}
		elseif ($result == true) {
			$message = "The category was deleted";
		}
		else {
			$message = "The category was not deleted";
		}
	}

	if (!empty($_GET["id"]) && $_GET["action"] == "edit") {
		$category->getCategory($_GET["id"]);
		$submitType = "update";
	}

	if (isset($_POST["submit"]) && ($_POST["operation"] == "update")) {
		if (!empty($_POST["categoryName"]) && !empty($_POST["categoryID"])) {
			$category->setCategoryName($_POST["categoryName"]);
			$category->updateCategory($_POST["categoryID"]);
			$message = "The category was updated";
			$category = new Category();
		}
	}

	$categoryRows = $category->getCategories();

	ob_start();

	$sectionTitle = "Category Maintain";

	include "templates/maintainCategoryDisplay.html.php";

	include "templates/maintainCategoryEdit.html.php";

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