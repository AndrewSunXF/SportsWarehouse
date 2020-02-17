<nav id="categoryNav">
	<?php foreach ($rows as $row):
		$id = $row["categoryID"];
		$name = $row["categoryName"];
	 ?>

	<a href="homePage.php?id=<?= $id ?>"><?= $name ?><i class="fas fa-angle-right"></i></a>

	<?php endforeach; ?>
</nav>
