<h1><?= empty($sectionTitle) ? 'Theme' : $sectionTitle ?></h1>

<form action="changeTheme.php" method="post" class="clearfix pushFooter" id="themeForm">
	<label for="theme">Please select your theme:</label>
	<select id="theme" name="theme">
		<?php if($theme == "style_plain.css"): ?>
			<option value="style_plain" selected>Plain</option>
		<?php else: ?>
			<option value="style_plain">Plain</option>
		<?php endif;?>

		<?php if($theme == "style_light.css"): ?>
			<option value="style_light" selected>Light</option>
		<?php else: ?>
			<option value="style_light">Light</option>
		<?php endif;

			  if($theme == "style_dark.css"): ?>
			<option value="style_dark" selected>Dark</option>
		<?php else: ?>
			<option value="style_dark">Dark</option>
		<?php endif; ?>
	</select>

	<input type="submit" name="submit" value="Change" class="button">
</form>