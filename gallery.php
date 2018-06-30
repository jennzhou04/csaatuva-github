<!DOCTYPE HTML>

<html>
	<head>
		<title>Gallery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon"  type="image/png" href="favicon.png" />
	</head>
	<body>
	
		<!-- Header -->
			<header id="header">
				<?php require('navigation.php'); ?>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
								
					<header class="major special">
						<h2>Gallery</h2>
						<p>This page is still under construction</p>
					</header>
					<p>Check out our Facebook page for more pictures!</p>
			
			<!-- Slideshow -->
			 <div class="slideshow-container">
			  <div class="mySlides fade">
				<div class="numbertext">1 / 8</div>
				<img src="slideshow/img1.jpg" style="width:100%">
				<div class="text">CSA Beach Week 2017</div>
			  </div>

			  <div class="mySlides fade">
				<div class="numbertext">2 / 8</div>
				<img src="slideshow/img2.jpg" style="width:100%">
				<div class="text">Chinafest: Ribbon Dance</div>
			  </div>

			  <div class="mySlides fade">
				<div class="numbertext">3 / 8</div>
				<img src="slideshow/img3.jpg" style="width:100%">
				<div class="text">Swooping Swallows Family</div>
			  </div>
			  <div class="mySlides fade">
				<div class="numbertext">4 / 8</div>
				<img src="slideshow/img4.jpg" style="width:100%">
				<div class="text">Chinafest: Chinamodern</div>
			  </div>
			  <div class="mySlides fade">
				<div class="numbertext">5 / 8</div>
				<img src="slideshow/img5.jpg" style="width:100%">
				<div class="text">Family Week: Carter Mountain</div>
			  </div>
			  <div class="mySlides fade">
				<div class="numbertext">6 / 8</div>
				<img src="slideshow/img6.jpg" style="width:100%">
				<div class="text">CSA Frisbee Game</div>
			  </div>
			  <div class="mySlides fade">
				<div class="numbertext">7 / 8</div>
				<img src="slideshow/img7.jpg" style="width:100%">
				<div class="text">CSA Paint Wars</div>
			  </div>
			  <div class="mySlides fade">
				<div class="numbertext">8 / 8</div>
				<img src="slideshow/img8.jpg" style="width:100%">
				<div class="text">Chinafest: Fan Dance</div>
			  </div>
			
			  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			  <a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>
			<br>

			<div style="text-align:center">
			  <span class="dot" onclick="currentSlide(1)"></span>
			  <span class="dot" onclick="currentSlide(2)"></span>
			  <span class="dot" onclick="currentSlide(3)"></span>
			  <span class="dot" onclick="currentSlide(4)"></span>
			  <span class="dot" onclick="currentSlide(5)"></span>
			  <span class="dot" onclick="currentSlide(6)"></span>
			  <span class="dot" onclick="currentSlide(7)"></span>
			  <span class="dot" onclick="currentSlide(8)"></span>
			</div> 
		</section>
		<script>
			//code for making the slideshow
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}    
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";  
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";  
			  dots[slideIndex-1].className += " active";
			}
		</script>

		<!-- Footer -->
			<? require 'footer.php';?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>