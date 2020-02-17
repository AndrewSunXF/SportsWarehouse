<h1><?= empty($sectionTitle) ? 'Password change' : $sectionTitle ?></h1>

<form action="changePassword.php" method="post" id="passwordForm">
	<fieldset>
		<p>
			<label>Please enter your username:</label>	
			<input type="text" name="username" id="username" required>
		</p>

		<p>
			<label>Please enter your current password:</label>
			<input type="password" name="oldPassword" id="oldPassword" required>
		</p>

		<p>
			<label>Please enter your new password:</label>
			<input type="password" name="newPassword" id="newPassword" required>
		</p>

		<p>
			<input type="submit" value="Update password" class="button">
		</p>
	</fieldset>
</form>
<p><?= $message ?></p>
