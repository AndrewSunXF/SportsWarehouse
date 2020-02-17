<h1><?= empty($sectionTitle) ? 'Login' : $sectionTitle ?></h1>

<form action="login.php" method="post" id="loginForm">
	<fieldset>
		<p>
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required>
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required>
		</p>
		<p>
			<input type="submit" name="loginSubmit" value="Login" class="button">
		</p>
	</fieldset>
</form>
<?php if(isset($error)): ?>
	<p class="error"><?= $message ?></p>
<?php endif; ?>