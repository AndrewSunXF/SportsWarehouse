<h1><?= empty($sectionTitle) ? 'Product' : $sectionTitle ?></h1>
<section id="productContainer">
	<?php 
	//$rows = empty($rows) ? [] : $rows;
	foreach ($rows as $row):
	$itemID = $row["itemID"];
	$photoPath = "images/items/" . $row["photoPath"];
	$itemName = $row["itemName"];
	$price = $row["price"];
	$salePrice = $row["salePrice"];
 ?>
			<a href="displaySingleItem.php?id=<?= $itemID ?>" id="itemDisplayBtn">
				<article class="product">
					<div class="imgContainer"><img src="<?= $photoPath ?>" class="responsive" alt="product"></div>
					<p class="adjustPrice">
						<?php if ($salePrice != 0): ?>
									<span class="special">$<?= $salePrice ?></span>
									<span class="was">WAS</span>
									<span class="originalPrice linethroughPrice">$<?=$price ?></span>
						<?php else: ?>
									<span class="originalPrice">$<?=$price ?></span>
													
						<?php endif; ?>
					</p>
					<h2 class="productText"><?= $itemName ?></h2>
				</article>
			</a>				
	<?php endforeach; ?>
</section>

<script type="text/javascript">
	// Get the button that opens the modal
var itemDisplayBtn = document.getElementById("itemDisplayBtn");
	// When the user clicks the button, open the modal 
itemDisplayBtn.onclick = function() {
  modal.classList.add("show");
}
</script>