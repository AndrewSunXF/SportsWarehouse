<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/<?= $theme ?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
	<script src="https://cdn.tiny.cloud/1/7shr52uf3tkf7x2c9aj0mo1g6aucevfuf30hkgbqdswph3qz
/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<script src="https://kit.fontawesome.com/9ee2d3461f.js" crossorigin="anonymous"></script>
	<!-- Include bxSlider CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
	
	<title><?= $title ?></title>
</head>
<body>
	<header>
		<div>
			<nav id="topNav">

				<a href="javascript:void(0);" class="burger" onclick="myFunction()"><i class="fas fa-bars"></i><div id="textMenu">Menu</div></a>
				
				<div id="burgerLinks">
					<a href="logout.php" id="loginIcon"><i class="fas fa-lock"></i>Logout</a>
					<a href="homePage.php"><i class="far fa-circle"></i>Home</a>
					<a href="maintainCategory.php"><i class="far fa-circle"></i>Maintain Category</a>
					<a href="maintainProduct.php"><i class="far fa-circle"></i>Maintain Product</a>
					<a href="changePassword.php"><i class="far fa-circle"></i>Change Password</a>
					<a href="changeTheme.php"><i class="far fa-circle"></i>Theme</a>
					<a href="viewAllProducts.php"><i class="far fa-circle"></i>View Products</a>
				</div>
			</nav>
		</div>

		<div class="wrapper">
			<div id="logoSearch">
				<a href="homePage.php"><img src="images/sports-warehouse-logo-600.png" alt="Company logo" id="logo"></a>

				<form action="search.php" id="searchBar" method="get">
					<input type="text" name="search" id="search" placeholder="Search products">
					<label class="screenreader" for="search">search</label>
					<button type="submit" name="submitButton" aria-label="Search submit"><i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>		
	</header>
		

<div class="wrapper">
	<main>

		<?= $output ?>

	</main>
</div>

	<footer>
		<div id="footerWrap">
		<h1 class="screenreader">Footer</h1>
		<section class="siteNav">
			<nav>
				<h2 class="navTitle">Site navigation</h2>
				<ul class="navList">
					<li><a href="homePage.php">Home</a></li>
					<li><a href="#">About SW</a></li>
					<li><a href="contactPage.php">Contact Us</a></li>
					<li><a href="#">View Products</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>
			</nav>
		</section>

		<section class="siteNav" id="footerCategory">
			<nav>
				<h2 class="navTitle">Product categories</h2>
				<ul class="navList">

					<?= $outputBottomCategory ?>	
								
				</ul>
			</nav>
		</section>

		<section id="contactInfo">
				<nav>
					<h2 id="contactTitle">Contact Sports Warehouse</h2>
					<div id="icons">
						<ul>
							<li><a href="https://www.facebook.com" target="_blank"><div class="contactIcon"><div class="circle"><i class="fab fa-facebook-f"></i></div><div class="iconName">Facebook</div></div></a></li>
							<li><a href="https://twitter.com" target="_blank"><div class="contactIcon"><div class="circle"><i class="fab fa-twitter"></i></div><div class="iconName">Twitter</div></div></a></li>
							<li><a href="#" target="_blank"><div class="contactIcon"><div class="circle"><i class="fas fa-paper-plane"></i></div><div class="iconName">Other</div></div></a></li>
						</ul>
					</div>
					<div id="otherContact">
						<ul>
							<li><a href="#">Online form</a></li>
							<li><a href="#">Email</a></li>
							<li><a href="#">Phone</a></li>
							<li><a href="#">Address</a></li>
						</ul>
					</div>
				</nav>
		</section>
		</div>

		<div id="copyright">&copy; Copyright 2020 Sports Warehouse.<br class="brRemove"> All rights reserved.<br class="brRemove"> Website made by Awesomesauce Design.</div>
	</footer>




<script type="text/javascript">
	function myFunction() {
	  var x = document.getElementById("burgerLinks");
	  if (x.style.display === "block") {
	    x.style.display = "none";
	  } 
	  else {
	    x.style.display = "block";
	  }
	}
</script>


</body>
</html>