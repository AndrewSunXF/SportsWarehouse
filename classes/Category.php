<?php 

require_once("DBAccess.php");

class Category {
	private $_categoryName;
	private $_categoryID;
	private $_db;

	public function __construct() {
		include "settings/db.php";

		try {
			$this->_db = new DBAccess($dsn, $username, $password);
		}
		catch (PDOException $e) {
			die("Unable to connect to database, ". $e->message());
		}
	}

	public function getCategoryID() {
		return $this->_categoryID;
	}

	public function getCategoryName() {
		return $this->_categoryName;
	}

	public function setCategoryName($categoryName) {
		$this->_categoryName = trim($categoryName);
	}

	public function getCategory($id) {
		try {
			$pdo = $this->_db->connect();

			$sql = "select * from category where categoryID =:categoryID";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':categoryID', $id, PDO::PARAM_INT);

			$rows = $this->_db->executeSQL($stmt);

			$row = $rows[0];

			$this->_categoryID = $row["categoryID"];
			$this->_categoryName = $row["categoryName"];
		}
		catch (PDOException $e) {
			throw $e;
		}
	}

	public function getCategories() {
		try {
			$pdo = $this->_db->connect();

			$sql = "select * from category";
			$stmt = $pdo->prepare($sql);

			$rows = $this->_db->executeSQL($stmt);
			return $rows;
		}
		catch (PDOException $e) {
			throw $e;
		}
	}

	public function getNumberOfCategories() {
		try {
			$pdo = $this->_db->connect();

			$sql = "select count(*) from category";
			$stmt = $pdo->prepare($sql);

			$value = $this->_db->executeSQLReturnOneValue($stmt);

			return $value;
		}
		catch (PDOException $e) {
			throw $e;
		}
	}

	public function insertCategory() {
		try {
			$pdo = $this->_db->connect();

			$sql = "Insert into category(categoryName) values(:categoryName)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':categoryName', $this->_categoryName, PDO::PARAM_STR);

			$value = $this->_db->executeNonQuery($stmt, true);
			return $value;
		}
		catch (PDOException $e) {
			throw $e;
		}
	}

	public function updateCategory($id) {
		try {
			$pdo = $this->_db->connect();

			$sql = "update category set categoryName=:categoryName where categoryID=:categoryID";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":categoryName", $this->_categoryName, PDO::PARAM_STR);
			$stmt->bindParam(":categoryID", $id, PDO::PARAM_INT);

			$value = $this->_db->executeNonQuery($stmt, false);
			return $value;
		}
		catch (PDOException $e) {
			throw $e;
		}
	}

	public function deleteCategory($id) {
		try {
			$pdo = $this->_db->connect();

			$sql = "delete from category where categoryID = :categoryID";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':categoryID', $id, PDO::PARAM_INT);

			$value = $this->_db->executeNonQuery($stmt, false);

			return $value;
		}
		catch (PDOException $e) {
			throw $e;
		}
	}
}

 ?>