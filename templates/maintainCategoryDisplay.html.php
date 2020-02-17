<h1><?= empty($sectionTitle) ? 'Maintain' : $sectionTitle ?></h1>

<p class="showMessage"><?= $message ?></p>

<table>
	<tr>
		<th>Catergory Name</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 

	foreach ($categoryRows as $row):
		$categoryName = $row["categoryName"];
		$categoryID = $row["categoryID"];
	 ?>

	 <tr>
	 	<td><?= $categoryName ?></td>
	 	<td class="tableLink"><a href="maintainCategory.php?action=edit&id=<?= $categoryID ?>" id="editCategoryBtn"><i class="fas fa-edit"></i></a></td>
	 	<td class="tableLink"><a href="maintainCategory.php?action=delete&id=<?= $categoryID ?>" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash-alt"></i></a></td>
	 </tr>

	<?php endforeach; ?>
</table>

<button id="addCategoryBtn" type="button">Add category</button>
