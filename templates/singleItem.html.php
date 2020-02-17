<?php 
	$idPassed = $_GET['id'];
	$showModal = isset($_GET['id']);
?>
<div id="singleItemModal" class="modal <?= $showModal ? 'show' : '' ?>">
	<div class="modal-content">
		<span class="close">&times;</span>

		<h1><?= empty($sectionTitle) ? 'Product' : $sectionTitle ?></h1>

		<section id="singleItem">
			<?php foreach ($rows as $row):
			$photoPath = "images/items/" . $row["photoPath"];
			$itemName = $row["itemName"];
			$itemID = $row["itemID"];
			$price = $row["price"];
			$salePrice = $row["salePrice"];
			$description = $row["description"];
		 ?>

		 	<div class="singleImg"><img src="<?= $photoPath ?>" alt="product image" width=200></div>
		 	<div id="itemSpecs">
		 		<p class="singleItemName"><?= $itemName ?></p>

		 		<?php if ($salePrice !=0 ): ?>
		 		<p class="oldPrice">Price: $<?= $price ?></p>		
		 		<p class="singleSalePrice">Sale Price: $<?= $salePrice ?></p>
		 		<?php else: ?>
		 		<p class="singlePrice">Price: $<?= $price ?></p>
		 		<?php endif ?>
		 		
		 		<p class="singleDescription"><?= $description ?></p>
		 	</div>


		 	<article>
		 	<form action="shopping.php" method="post">
		 		<p class="clearfix" id="singleItemQty">
		 			<label for="qty<?= $itemID ?>">Quantity:</label>
		 		   <input type="number" name="qty" class="qty" id="qty<?= $itemID ?>" value="1" min="1">
		 		</p>
		 		<p id="buyButton">
		 			<input type="submit" name="buy" class="buy button" value="Add to cart" id="buy">
		 		</p>
		 		<input type="hidden" name="itemID" value="<?= $itemID ?>">
		 	</form>
		 	</article>

		 <?php endforeach; ?>
		</section>
	</div>
</div>

<script>

// Get the modal
var modal = document.getElementById("singleItemModal");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];



// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.classList.remove("show");
  window.history.back();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.classList.remove("show");
  	window.history.back();
  }
}
var buy = document.getElementById("buy");

buy.onclick = function() {
  modal.classList.remove("show");
  window.history.back();
}
</script>