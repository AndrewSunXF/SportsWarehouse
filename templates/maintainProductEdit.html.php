<?php 
	$showModal = isset($_GET['action']) && $_GET['action'] == 'edit';
?>

	<div id="productModal" class="modal <?= $showModal ? 'show' : '' ?>">
	<div class="modal-content">
		<span class="close">&times;</span>

		<h1>Add/Edit Product</h1>

		<form action="maintainProduct.php" method="post" enctype="multipart/form-data" id="itemEditForm">
			<fieldset>		

				<?php if (!empty($product->getPhotoPath())): ?>
					<img src="<?= "images/items/" . $product->getPhotoPath() ?>" alt="Photo of Product" width=200 class="imgEditDisplay">
				<?php endif; ?>

				<p>
				<label for="photo">Please select the product photo:</label>
				<input type="file" name="photoPath" id="photo">
				<input type="hidden" name="oldPhoto" value="<?= $product->getPhotoPath() ?>">
				</p>

				<p>
					<label for="productName">Product Name:</label>
					<input type="text" name="productName" id="productName" value="<?= $product->getProductName() ?>" size="35">
				</p>

				<p>
					<label for="category">Category:</label>
					<select name="category" id="category">
						<?php 
							foreach($categoryRows as $categoryRow):
							$categoryId = $categoryRow["CategoryID"];
							$categoryName = $categoryRow["CategoryName"];

							if($categoryId == $product->getCategoryID()):
						 ?>
							 	<option value="<?= $categoryId ?>" selected><?= $categoryName ?></option>
							 <?php else: ?>
							 	<option value="<?= $categoryId ?>"><?= $categoryName ?></option>
							 <?php endif; ?>
							<?php endforeach; ?>
					</select>
				</p>

				<p>
					<label for="price">Price: $</label>
					<input type="number" name="price" id="price" value="<?= $product->getPrice() ?>" min="0" step="any">
				</p>

				<p>
					<label for="salePrice">Sale Price: $</label>
					<input type="number" name="salePrice" id="salePrice" value="<?= $product->getSalePrice() ?>" min="0" step="any" id="salePrice">
				</p>

				<p>
					<label for="description">Description:</label>
					<textarea name="description" id="description" rows="10" cols="100"><?= $product->getDescription() ?></textarea>
				</p>

				<p>
					<label for="featured">Set product featured?</label>
					<select name="featured" id="featured">
						<?php if($product->getFeatured() == 1): ?>
						<option value="1" selected>Yes</option>
						<?php else: ?>
						<option value="1">Yes</option>
						<?php endif;
						if($product->getFeatured() == 0): ?>
						<option value="0" selected>No</option>
						<?php else: ?>
						<option value="0">No</option>
						<?php endif; ?>
					</select>
				</p>

				<input type="hidden" name="productID" value="<?= $product->getProductID() ?>">
				<input type="hidden" name="operation" value="<?= $submitType ?>">
				<p><input type="submit" value="Save" name="submit" class="button"></p>
				
			</fieldset>
		</form>
	</div>
</div>


<script>
// Get the modal
var modal = document.getElementById("productModal");

// Get the button that opens the modal
var addBtn = document.getElementById("addItemBtn");

var editBtn = document.getElementById("editItemBtn");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
addBtn.onclick = function() {
  modal.classList.add("show");
}
editBtn.onclick = function() {
  modal.classList.add("show");
}

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function() {
  modal.classList.remove("show");
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.classList.remove("show");
  }
}
</script>

<script>
  tinymce.init({
    selector: "#description",
    plugins: "lists emoticons",
  	toolbar: "numlist bullist"
  });
  </script>