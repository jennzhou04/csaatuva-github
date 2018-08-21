<?php 
$toRoot = './';
$currentPage = 'index';
include($toRoot.'_header_alt.php');
?>
		<!-- Banner -->
			<!-- <section id="banner">
				<h2>Chinese Student Association</h2>
				<p>University Of Virginia </p>
			</section> -->
			<section id="banner">
				<div class="inner">
					<!-- <p>Data Visualization • Data Management • Custom Applications</p>
					<ul class="actions special">
						<li><a href="#about" class="button medium wide scrolly-middle">About Us</a></li>
					</ul> -->
					<h1>Chinese Student Association</h1>
					<h4>University Of Virginia </h4>
					<div class="knot-logo"><?php include('assets/knot-logo.svg')?></div>
				</div>
				<!-- <div class="half-banner">
					<h4>University Of Virginia </h4>
				</div> -->
				</div>
				<svg class="line">
					<line x1="0" y1="0" x2="0" y2="400" style="stroke:rgb(255,255,255);stroke-width:5" />
				</svg>
			</section>

			<!-- One -->
				<section id="one" class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<div class="4u 12u$(small)">
								<header class="major">
									<h2>Who we are</h2>
								</header>
							</div>
							<div class="8u$ 12u$(small))">
								<p>The Chinese Student Association (CSA) at the University of Virginia is a social and cultural student organization that provides a social community and puts on many events throughout the year. CSA is an easy way to meet other students at UVA with similar interests and bond through our family-like community.</p>
							</div>
					<div class="container" style="margin-top: 2em; text-align:center;">
						<header class="major" style="margin-bottom: 2em;">
							<h2 style="margin-bottom: .5em;">Want to join our community?</h2>
							<p>sign up for a family</p>
						</header>
						<ul class="actions" >
							<li><a href="https://goo.gl/forms/6o1Bm2WNYIwxVDpi2" class="button special big" target="_blank">New Members</a></li>
							<li><a href="https://goo.gl/forms/NAImZtkJxDXzCIjJ2" class="button big" target="_blank">Returning Members</a></li>
						</ul>
					</div>
				</section>

			<!-- Two -->
				<section id="two" class="wrapper style2 special">
					<div class="container">
						<header class="major">
							<h2>Upcoming events</h2>
						</header>
						<div class="row 150%">
							<div class="6u 12u$(xsmall)">
								<div class="image fit captioned">
									<img src="images/upcoming/DDS.png" alt="" />
									<h3>Dollar Dim Sum</h3>
								</div>
							</div>
							<div class="6u$ 12u$(xsmall)">
								<div class="image fit captioned">
									<img src="images/upcoming/more.png" alt="" />
									<h3>Stay Tuned!</h3>
								</div>
							</div>
						</div>
					</div>
				</section>
			<!-- Three -->
				<section id = "three" class= "wrapper">
					<div class="container"  style="text-align:center;">
						<header class="major">
							<h2>Make a contribution</h2>
							<p>we accept donations through paypal</p>
						</header>
						<ul class="actions">
							<li><a href="#" class="button">Donate</a></li>
						</ul>
					</div>
				</section>
			<!-- Four -->
				<section id="four" class="wrapper style3 special">
					<div class="container">
						<header class="major">
							<h2>Sign up for Our Newsletter Emails</h2>
							<p>UVA Emails only</p>
						</header>
						<ul class="actions">
							<li><a href="https://goo.gl/forms/oJnobf1yXGz1vtiD3" class="button fit alt small" target="_blank">Sign-up</a></li>
						</ul>
					</div>
				</section>

		<!-- Footer -->
			<?php include($toRoot.'footer.php');?>