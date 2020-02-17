<?php 

require_once("DBAccess.php");

class Product {
	private $_productName;
	private $_productID;
	private $_price;
	private $_salePrice;
	private $_description;
	private $_featured;
	private $_photoPath;
	private $_categoryID;
	private $_db;

	public function __construct() {
		include "settings/db.php";

		try {
			$this->_db = new DBAccess($dsn, $username, $password);
		}
		catch (PDOException $e){
			die("Unable to connect to database, " . $e->message());
		}
	}

	public function getProductID() {
		return $this->_productID;
	}

	public function getProductName() {
		return $this->_productName;
	}

	public function setProductName($productName) {
		$this->_productName = $productName;
	}

	public function getPrice() {
		return $this->_price;
	}

	public function setPrice($price) {
		$this->_price = $price;
	}

	public function getSalePrice() {
		return $this->_salePrice;
	}

	public function setSalePrice($salePrice) {
		$this->_salePrice = $salePrice;
	}

	public function getDescription() {
		return $this->_description;
	}

	public function setDescription($description) {
		$this->_description = $description;
	}

	public function getFeatured() {
		return $this->_featured;
	}

	public function setFeatured($featured) {
		$this->_featured = $featured;
	}

	public function getPhotoPath() {
		return $this->_photoPath;
	}

	public function setPhotoPath($photoPath) {
		$this->_photoPath = $photoPath;
	}

	public function getCategoryID() {
		return $this->_categoryID;
	}

	public function setCategoryID($categoryID) {
		$this->_categoryID = $categoryID;
	}

	public function getProduct($id) {
		try {
			$pdo = $this->_db->connect();
			$sql = "select CategoryID, PhotoPath, ItemID, ItemName, Price, SalePrice, Description, Featured from item where ItemID = :ItemID";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':ItemID', $id, PDO::PARAM_INT);
			$rows = $this->_db->executeSQL($stmt);
			$row = $rows[0];

			$this->_productID = $row["ItemID"];
			$this->_productName = $row["ItemName"];
			$this->_price = $row["Price"];
			$this->_salePrice = $row["SalePrice"];
			$this->_description = $row["Description"];
			$this->_featured = $row["Featured"];
			$this->_photoPath = $row["PhotoPath"];
			$this->_categoryID = $row["CategoryID"];

		}
		catch (PDOException $e) {
			throw $e;
		}
	}

	public function getProducts() {
		try {
			$pdo = $this->_db->connect();
			$sql = "select ItemID, ItemName, Price from item limit 5";
			$stmt = $pdo->prepare($sql);
			$rows = $this->_db->executeSQL($stmt);

			return $rows;
		}
		catch (PDOException $e) {
			throw $e;
		}
	}

	public function insertProduct() {
		try {
			$pdo = $this->_db->connect();

			$sql = "Insert into item(ItemName, Price, SalePrice, Description, Featured, CategoryID) values(:ItemName, :Price, :SalePrice, :Description, :Featured, :CategoryID)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(":ItemName", $this->_productName, PDO::PARAM_STR);
			$stmt->bindValue(":Price", $this->_price, PDO::PARAM_INT);
			$stmt->bindValue(":SalePrice", $this->_salePrice, PDO::PARAM_INT);
			$stmt->bindValue(":Description", $this->_description, PDO::PARAM_STR);
			$stmt->bindValue(":Featured", $this->_featured, PDO::PARAM_INT);
			$stmt->bindValue(":CategoryID", $this->_categoryID, PDO::PARAM_INT);
			
			$value = $this->_db->executeNonQuery($stmt, true);
			return $value;
		}
		catch (PDOException $e) {
			throw $e;
		}
	}

	public function updateProduct($id) {
		try {
			$pdo = $this->_db->connect();
			$sql = "update item set ItemName=:ItemName, Price=:Price, SalePrice=:SalePrice, Description=:Description, Featured=:Featured, CategoryID=:CategoryID where ItemID=:ItemID";

			$stmt = $pdo->prepare($sql);

			$stmt->bindValue(":ItemName", $this->_productName, PDO::PARAM_STR);
			$stmt->bindValue(":Price", $this->_price, PDO::PARAM_INT);
			$stmt->bindValue(":SalePrice", $this->_salePrice, PDO::PARAM_INT);
			$stmt->bindValue(":Description", $this->_description, PDO::PARAM_STR);
			$stmt->bindValue(":Featured", $this->_featured, PDO::PARAM_INT);
			$stmt->bindValue(":CategoryID", $this->_categoryID, PDO::PARAM_INT);
			$stmt->bindValue(":ItemID", $id, PDO::PARAM_INT);

			$value = $this->_db->executeNonQuery($stmt, false);
			return $value;
		} 
		catch (Exception $e) {
			throw $e;
		}
	}

	public function deleteProduct($id) {
		try {
			$pdo = $this->_db->connect();

			$sql = "delete from item where ItemID=:ItemID";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(":ItemID", $id, PDO::PARAM_INT);

			$value = $this->_db->executeNonQuery($stmt, false);
			return $value;
		} 
		catch (Exception $e) {
			
		}
	}
}

 ?>