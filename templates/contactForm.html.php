<h1><?= empty($sectionTitle) ? 'Contact us' : $sectionTitle ?></h1>

		<form action="contactPage.php" method="post" id="contactForm">
		<fieldset>

			<p>
			<label for="firstName" <?= $form->setErrorClass("firstName") ?>>First name *</label>
			<input type="text" name="firstName" id="firstName" value="<?= $form->setValue("firstName") ?>">
			<span class="message"><?= $firstNameMessage ?></span>
			</p>

			<p>
			<label for="lastName" <?= $form->setErrorClass("lastName") ?>>Last name *</label>
			<input type="text" name="lastName" id="lastName" value="<?= $form->setValue("lastName") ?>">
			<span class="message"><?= $lastNameMessage ?></span>
			</p>
			

			<p>
			<label for="contactNumber">Contact number</label>
			<input type="text" name="contactNumber" id="contactNumber" value="<?= $form->setValue("contactNumber") ?>">
			</p>

            <p>
			<label for="email" <?= $form->setErrorClass("email") ?>>Email *</label>
			<input type="email" name="email" id="email" value="<?= $form->setValue("email") ?>">
			<span class="message"><?= $emailMessage ?></span>
			</p>
			<p>
			<label for="questions">Do you have any questions?</label>
			<textarea name="questions" id="questions" rows="4" cols="50"><?= $form->setValue("questions") ?></textarea>
			</p>

			</fieldset>

				<p id="contactButton">
				<input type="submit" name="submitButton" id="submitButton" value="Send Details">
				<input type="reset" name="resetbutton" id="resetbutton" value="Reset Form">
				</p>

		</form>