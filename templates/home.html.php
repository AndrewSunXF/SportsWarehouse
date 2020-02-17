<div id="slideShow">
	<ul class="bxslider">
		<li>
			<img src="images/slideshow/image_1.png" alt="Buy sports balls" title="Brand new balls!">
			<div class="overlay">
				<p class="slideShowText">View our brand new range of<br><span>Sports balls</span></p>
				<p class="slideShowLink"><a href="homePage.php?id=5">Shop now</a></p>
			</div>
		</li>
		<li>
			<img src="images/slideshow/image_2.png" alt="Buy protective helmets" title="Brand new helmets!">
			<div class="overlay">
				<p class="slideShowText">Get protected with the new range of<br><span>Protective helmets</span></p>
				<p class="slideShowLink"><a href="homePage.php?id=2">Shop now</a></p>
			</div>
		</li>
		<li>
			<img src="images/slideshow/image_3.png" alt="Buy training gears" title="Brand new gears!">
			<div class="overlay">
				<p class="slideShowText">Get ready to race with our professional<br><span>Training gear</span></p>
				<p class="slideShowLink"><a href="homePage.php?id=7">Shop now</a></p>
			</div>
		</li>
	</ul>
</div>

<!-- Include jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
	<!-- Include jQuery plugins AFTER including the jQuery library -->
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<!-- Initialisation code for jQuery plugins -->
	<script>

		// Using jQuery - wait until the page has finished loading before running the JS code
		$(document).ready(function(){

			// Activate and customise the bxSlider slideshow
			$('.bxslider').bxSlider({
				mode: 'horizontal',	// 'horizontal', 'vertical', 'fade'
				captions: false,
				pager: true,
				auto: true,
				pause: 4000, 		// how long each slide stays visible for = 4s
				speed: 2000,		// transition speed 1s
				autoHover: true		// pause slideshow on mouse hover
			});
		});

	</script>
		

		<section id="featureProducts">
		<?php include "products.html.php"; ?>
		</section>

		<section id="ourBrands">
			<h1>Our brands and partnerships</h1>
			<div id="brandWrap">
				<p id="brandsIntro">These are some of our top brands and partnerships.<br><span id="bestIntro">The best of the best is here.</span></p>
				<div id="brands">
					<a href="https://www.nike.com/au/" target="_blank"><img src="images/brands/logo_nike.png" alt="logo nike"></a>
					<a href="https://www.adidas.com.au/" target="_blank"><img src="images/brands/logo_adidas.png" alt="logo adidas"></a>
					<a href="https://www.news.com.au/finance/business/retail/australian-sportswear-manufacturer-applies-for-bankruptcy/news-story/41fe674f0633794bccf561b5653453b4" target="_blank"><img src="images/brands/logo_skins.png" alt="logo skins"></a>
					<a href="https://www.asics.com/au/en-au/" target="_blank"><img src="images/brands/logo_asics.png" alt="logo asics"></a>
					<a href="https://www.newbalance.com.au/" target="_blank"><img src="images/brands/logo_newbalance.png" alt="logo newbalance"></a>
					<a href="https://au.wilson.com/" target="_blank"><img src="images/brands/logo_wilson.png" alt="logo wilson"></a>
				</div>
			</div>
		</section>