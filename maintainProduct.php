<?php 
session_start();
	require_once "classes/Authentication.php";
  	Authentication::protect();
	require_once "classes/Product.php";
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

	$title = "Maintain Product";
	$message = "";
	$imgMessage = "";
	$theme = "";
	$product = new Product();

	$submitType = "insert";

if (isset($_POST["submit"]) && ($_POST["operation"] == "insert")) {
	if (!empty($_POST["productName"]) && !empty($_POST["category"])) {
		$product->setProductName($_POST["productName"]);
		$product->setCategoryID($_POST["category"]);
		$product->setPrice($_POST["price"]);
		$product->setSalePrice($_POST["salePrice"]);
		$product->setDescription($_POST["description"]);
		$product->setFeatured($_POST["featured"]);

		$id = $product->insertProduct();

		$imgMessage = imgUpload($id);

		$product = new Product();
		$message = "The product was added";
	}
}

if (!empty($_GET["id"]) && $_GET["action"] == "delete") {
	$result = $product->deleteProduct($_GET["id"]);
	if ($result == true) {
			$message = "The category was deleted";
		}
		else {
			$message = "The category was not deleted";
		}
}

if (!empty($_GET["id"]) && $_GET["action"] == "edit") {
	$product->getProduct($_GET["id"]);
	$submitType = "update";
}

if (isset($_POST["submit"]) && ($_POST["operation"] == "update")) {
		$product->getProduct($_POST["productID"]);
		$product->setProductName($_POST["productName"]);
		$product->setCategoryID($_POST["category"]);
		$product->setPrice($_POST["price"]);
		$product->setSalePrice($_POST["salePrice"]);
		$product->setDescription($_POST["description"]);
		$product->setFeatured($_POST["featured"]);

		$imgMessage = imgUpload($_POST["productID"]);
			
		$product->updateProduct($_POST["productID"]);
		$message = "The product was updated";
		$product = new Product();

}

function imgUpload($imgToId) {
	if (!empty($_FILES["photoPath"]["name"])) {
			$error = false;

			require_once "classes/DBAccess.php";
			include "settings/db.php";
			$db = new DBAccess($dsn, $username, $password);
			$pdo = $db->connect();

			$targetDirectory = "images/items/";

			$photoPath = basename($_FILES["photoPath"]["name"]);
			$targetFile = $targetDirectory . $photoPath;
			$imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
		
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			return "Sorry, only JPG, PNG, JPEG & GIF files are allowed.";
			$error = true;
		}
		if ($_FILES["photoPath"]["error"] == 1) {
			return "Sorry, your file is too large. Max of 2M is allowed.";
			$error = true;
		}
		if ($error == false) {
			if (move_uploaded_file($_FILES["photoPath"]["tmp_name"], $targetFile)) {
				if (!empty($_POST["oldPhoto"])) {
					$file = "images/items/" . $_POST["oldPhoto"];
					unlink($file);
				}
				$sql = "update item set PhotoPath =:PhotoPath where ItemID=:ItemID";
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(":ItemID", $imgToId, PDO::PARAM_INT);
				$stmt->bindValue(":PhotoPath", $photoPath, PDO::PARAM_STR);
				$id = $db->executeNonQuery($stmt, false);

				return "The image has been added.";
			}
			else {
				return "Sorry, there was an error uploading your file. Error Code:" . $_FILES["photoPath"]["error"];
				$photoPath = "";
			}
		}
	}
}

	$sql = "select CategoryName, CategoryID from category";
	$stmt = $pdo->prepare($sql);
	$categoryRows = $db->executeSQL($stmt);
	ob_start(); 

	$sectionTitle = "Product Maintain";

	include "templates/maintainProductDisplay.html.php";
	include "templates/maintainProductEdit.html.php";

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