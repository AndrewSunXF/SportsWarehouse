
	<?php foreach ($rows as $row):
		$id = $row["categoryID"];
		$name = $row["categoryName"];
	 ?>

	<li><a href="homePage.php?id=<?= $id ?>"><?= $name ?><i class="fas fa-angle-right"></i></a></li>

	<?php endforeach; ?>
