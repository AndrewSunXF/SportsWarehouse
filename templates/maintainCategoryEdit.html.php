<?php 
	$showModal = isset($_GET['action']) && $_GET['action'] == 'edit';
?>
<div id="categoryModal" class="modal <?= $showModal ? 'show' : '' ?>">
	<div class="modal-content">
		<span class="close">&times;</span>
		<h1>Add/Edit category</h1>
		<form action="maintainCategory.php" method="post" id="cateEditForm">
			<p>
				<label for="categoryName">Category Name:</label>
				<input type="text" name="categoryName" id="categoryName" required value="<?= $category->getCategoryName() ?>">
			</p>
			<input type="hidden" name="categoryID" value="<?= $category->getCategoryID() ?>">
			<input type="hidden" name="operation" value="<?= $submitType ?>">
			<p><input type="submit" name="submit" value="Save" class="button"></p>
			
		</form>
	</div>
</div>


<script>
// Get the modal
var modal = document.getElementById("categoryModal");

// Get the button that opens the modal
var addBtn = document.getElementById("addCategoryBtn");
var editBtn = document.getElementById("editCategoryBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
addBtn.onclick = function() {
  modal.classList.add("show");
}
editBtn.onclick = function() {
  modal.classList.add("show");
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.classList.remove("show");
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.classList.remove("show");
  }
}
</script>