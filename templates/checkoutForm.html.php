<form method="post" action="thanks.php" id="checkout">
	<fieldset>
		<legend class="payDetail">Delivery Details</legend>
		<p>
			<label for="firstName">First Name:</label>
			<input type="text" name="firstName" id="firstName" autofocus required>
		</p>
		<p>
			<label for="lastName">Last Name:</label>
			<input type="text" name="lastName" id="lastName" required>
		</p>
		<p>
			<label for="address">Address:</label>
			<input type="text" name="address" id="address" required>
		</p>
		<p>
			<label for="phone">Phone:</label>
			<input type="text" name="phone" id="phone" required>
		</p>
		<p>
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" required>
		</p>
	</fieldset>

	<fieldset>
		<legend class="payDetail">Payment</legend>
		<p>
			<label for="creditcard">Credit card number:</label>
			<input type="text" name="creditcard" id="creditcard" required>
		</p>
		<p>
			<label for="nameOnCard">Name on card:</label>
			<input type="text" name="nameOnCard" id="nameOnCard" required>
		</p>
		<p>
			<label for="expiry">Expiry date:</label>
			<input type="text" name="expiry" id="expiry" required>
		</p>
		<p>
			<label for="csv">CSV:</label>
			<input type="text" name="csv" id="csv" required>
		</p>
		<p><input type="submit" name="pay" value="Pay" class="button"></p>
	</fieldset>
</form>
	
	<!-- Include jQuery library -->
	<script

		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>

	<!-- Include jQuery plugin resources -->
	<script src="plugins/jquery.validate/jquery.validate.min.js"></script>

	<!-- Include custom JS -->
	<script src="scripts/checkoutFormValidation.js"></script>