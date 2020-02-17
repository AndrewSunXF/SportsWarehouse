<section id="cart">

	<h1><?= empty($sectionTitle) ? 'Shopping' : $sectionTitle ?></h1>
	
	<?php if(isset($_SESSION["cart"])):
		$cart = $_SESSION["cart"];
		$cartItems = $cart->getItems();
	 ?>

		<?php if ($cartItems): ?>
		 <table>
		 	<tr>
		 		<th></th>
		 		<th>Product</th>
		 		<th>Price</th>
		 		<th>Quantity</th>
		 		<th></th>
		 	</tr>
		 	<?php foreach ($cartItems as $item):
		 		$photoPath = "images/items/" . $item->getPhotoPath();
		 		$productName = $item->getItemName();
		 		$price = sprintf('%01.2f', $item->getPrice());
		 		$itemID = $item->getItemId();
		 		$qty = $item->getQuantity();
		 	 ?>

		 	 <tr>
		 	 	<td><img src="<?= $photoPath ?>" alt="product" width="150"></td>
		 	 	<td><?= $productName ?></td>
		 	 	<td><?= $price ?></td>

				<td>
				<form action="shopping.php" method="post" class="clearfix" id="cartQtyForm">
				<input type="submit" name="setQty" value="setQty">
		 	 	<input type="submit" name="qtySubtract" value="-">
		 	 	<input type="number" name="qtyInCart" class="qtyInCart" id="qty<?= $itemID ?>" value="<?= $qty ?>" min="1">
		 	 	<input type="submit" name="qtyAdd" value="+">
		 	 	
		 	 	<input type="hidden" name="itemID" value="<?= $itemID ?>">
				</form>
			    </td>

		 	 	<td>
		 	 	<form action="shopping.php" method="post">
		 	 		<input type="submit" name="remove" value="Remove">
		 	 		<input type="hidden" name="itemID" value="<?= $itemID ?>">
		 	 	</form>
		 	 	</td>
		 	 </tr>
		 	
		 	<?php endforeach; ?>

		 </table>
		 <p><?= $orderMessage ?></p>
		 <div id="totalPrice">
		<p id="totalPrice1">Total: <span id="totalPrice2">$<?= sprintf('%01.2f', $cart->calculateTotal()) ?></span></p>
	 	<p class="button" id="checkout"><a href="checkout.php">Checkout</a></p>
	 	 </div>	
		<?php else: ?>
			<p class="showMessage pushFooter">Your shopping cart is empty. <a href="homePage.php" class="linkAppear">Try some of our best offers!</a></p>
		<?php endif; ?>

	<?php else: ?>
			<p class="showMessage pushFooter">Your shopping cart is empty. <a href="homePage.php" class="linkAppear">Try some of our best offers!</a></p>
	<?php endif; ?>

</section>