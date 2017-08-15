<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->


<html>
	<head>
		<title>About</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
	<link rel="shortcut icon" href="knot.png" >
		<!-- Header -->
			<header id="header">
				<?php require('navigation.php'); ?>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">
								
					<header class="major special">
						<h2>About CSA</h2>
						<p>The Chinese Student Association at the University of Virginia</p>
					</header>
		<!-- Slideshow -->
		 <div class="slideshow-container">
		  <div class="mySlides fade">
			<div class="numbertext">1 / 3</div>
			<img src="slideshow/img1.jpg" style="width:100%">
			<div class="text">Why won't this work</div>
		  </div>

		  <div class="mySlides fade">
			<div class="numbertext">2 / 3</div>
			<img src="slideshow/img2.jpg" style="width:100%">
			<div class="text">Caption Two</div>
		  </div>

		  <div class="mySlides fade">
			<div class="numbertext">3 / 3</div>
			<img src="slideshow/img3.jpg" style="width:100%">
			<div class="text">Caption Three</div>
		  </div>

		  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  <a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>
		<br>

		<div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span>
		  <span class="dot" onclick="currentSlide(2)"></span>
		  <span class="dot" onclick="currentSlide(3)"></span>
		</div> 
		
		<script>
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
		<section id="one" class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<div class="4u 12u$(small)">
								<header class="major">
									<h2>What are we?</h2>
								</header>
							</div>
							<div class="8u$ 12u$(small))">
								<p>The Chinese Student Association (CSA) at the University of Virginia is a social and cultural student organization that provides a social community and puts on many events throughout the year. CSA is an easy way to meet other students at UVA with similar interests and bond through our family-like community.</p>
							</div>
						</div>
						<div class="row 200%">
							<div class="9u 12u$(small)">
								<p>We put on several major cultural events annually. Our main event in the fall semester is the FullMoonFest, which celebrates the Chinese holiday Mid-Autumn Festival (中秋节). We celebrate by inviting UVA to a short cultural performance, featuring new students as performers, with a feast at the end. Another major event we hold in the spring semester is ChinaFest, which celebrates the Chinese New Year (春节). This event is one of our largest events involving most of our student members in putting on a large cultural performance show. Out show usually features traditional and modern dances, a cultural fashion show, and other guest CIO performances.</p>
							</div>
							<div class="3u$ 12u$(small)">
								<img src="images/culture.jpg" style="width: 100%;" alt="" />
							</div>
						</div>
						<div class="row 200%">
							<div class="3u 12u$(small)">
								<img src="images/community.jpg" style="width: 100%;" alt="" />
							</div>
							<div class="9u$ 12u$(small)">
								<p>CSA also functions as a social organziation, bringing different people together to form our community. In Chinese culture, family is an important concept in the community. We utilize a family system to encourage students to get to know each other better. Each new member is put into one of four families, each with upperclassmen as family heads, aunts, or uncles. Members can easily get to know others in the family and meet new students.</p>
							</div>
						</div>
					</div>
					<div class="container" style="margin-top: 2em; text-align:center;">
						<header class="major" style="margin-bottom: 2em;">
							<h2 style="margin-bottom: .5em;">Want to join our community?</h2>
							<p>Sign up below!</p>
						</header>
						<ul class="actions" >
							<li><a href="#" class="button special big" target="_blank">New Members</a></li>
							<li><a href="#" class="button big" target="_blank">Returning Members</a></li>
						</ul>
					</div>
				</section>
					<p>The main goal of the Chinese Student Association at the University of Virginia is to create an atmosphere where Chinese, Chinese-Americans, and all those interested in Chinese culture can come together. From organizing small get-togethers to large-scale events integrated with college and community life, CSA allows students to meet others to whom they can relate in various community, cultural, and social settings. As an awareness and promoting organization, CSA also addresses and discusses issues concerning Chinese and Chinese-Americans as students and as a community.</p>
					<p>While CSA is devoted to Chinese culture and community within the University, it welcomes and encourages people of all ages, races, and backgrounds to participate in, contribute to, and become part of the organization.</p>
					<p>Although this organization has members who are University of Virginia students and may have University employees associated or engaged in its activities and affairs, the organization is not a part of or an agency of the University. It is a separate and independent organization which is responsible for and manages its own activities and affairs. The University does not direct, supervise or control the organization and is not responsible for the organization’s contracts, acts or omissions.</p>

				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="https://www.facebook.com/csa.uva/" class="icon fa-facebook"></a></li>
						<li><a href="#" class="icon fa-youtube"></a></li>
						<li><a href="#" class="icon fa-instagram"></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>