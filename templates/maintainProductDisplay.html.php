<h1><?= empty($sectionTitle) ? 'Maintain' : $sectionTitle ?></h1>
	<p class="showMessage"><?= $message ?></p>
	<p class="showMessage"><?= $imgMessage ?></p>
<table class="tableLink">
 	<tr>		
 		<th>Category</th>
 		<th>Product ID</th>
 		<th>Product</th>
 		<th>Edit</th>
 		<th>Delete</th>
 	</tr>

<?php 

$sql = "select CategoryName, ItemID, ItemName from item, category where item.CategoryID = category.CategoryID";

$stmt = $pdo->prepare($sql);
$itemRows = $db->executeSQL($stmt);

foreach ($itemRows as $row):
	$categoryName = $row["CategoryName"];
	$itemId = $row["ItemID"];
	$itemName = $row["ItemName"];
 ?>

<tr>
	<td><?= $categoryName ?></td>
	<td><?= $itemId ?></td>
	<td><?= $itemName ?></td>
	<td><a href="maintainProduct.php?action=edit&id=<?= $itemId ?>" id="editItemBtn"><i class="fas fa-edit"></i></a></td>
	<td><a href="maintainProduct.php?action=delete&id=<?= $itemId ?>" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a></td>
</tr>

<?php endforeach; ?>
</table>

<button id="addItemBtn" type="button">Add product</button>