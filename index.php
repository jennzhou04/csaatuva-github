<?php 
$toRoot = './';
$currentPage = 'index';
include($toRoot.'_header_alt.php');

$ipaddress = $_SERVER['REMOTE_ADDR'];
$query = "INSERT INTO hits (ip) VALUES ('$ipaddress')";

$result = $db->query($query);

$resourceCall = "SELECT * FROM resources WHERE tags LIKE '%$currentPage%'";
$result = $db->query($resourceCall);
$resources = array();

if ($result->num_rows > 0) {
	// output data of each row
	// $roles = $result->fetch_assoc();
	while($row = $result->fetch_assoc()) {
		$resources[$row['Name']] = $row;
	}
} else {
	echo "0 results";
}

$db->close();
?>

<?php
    echo '<style>#banner { background-image: url("'.$toRoot.$resources['Homepage Background']['Link'].'")}</style>';
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
					<div class="title">
						<h1>Chinese</h1>
						<h1>Student</h1>
						<h1 class="thin">Association</h1>
					</div>					
					<!-- <h1>Chinese<br>Student<br>Association</h1> -->
					<h4>University Of Virginia </h4>
					<!-- <div class="knot-logo"><?php include('assets/knot-logo.svg')?></div> -->
				</div>
				<!-- <div class="half-banner">
					<h4>University Of Virginia </h4>
				</div> -->
				</div>
				<!-- <svg class="line">
					<line x1="0" y1="0" x2="0" y2="400" style="stroke:rgb(255,255,255);stroke-width:5" />
				</svg> -->
			</section>

			<!-- One -->
				<section id="one" class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<div class="4u 12u$(small)">
								<header class="major left">
									<h2>Who we are</h2>
								</header>
							</div>
							<div class="8u$ 12u$(small))">
								<div class="paragraph major">
									<p>The Chinese Student Association (CSA) at the University of Virginia is a social and cultural student organization that provides a social community and puts on many events throughout the year. CSA is an easy way to meet other students at UVA with similar interests and bond through our family-like community.</p>
								</div>
							</div>
						</div>
						<br>
						<div class="row 200%">
							<div class="12u$">
								<header class="major center" style="margin-bottom: 2em;">
									<h2>Join our community</h2>
									<h3 class="thin">sign up for a family</h3>
								</header>
								<ul id="sign-up" class="actions center" >
									<li><a href="<?php echo $resources['New Members']['Link']; ?>" class="button special big" target="_blank">New Members</a></li>
									<li><a href="<?php echo $resources['Returning Members']['Link']; ?>" class="button big" target="_blank">Returning Members</a></li>
								</ul>
							</div>
						</div>
					</div>
				</section>

			<!-- Two -->
				<section id="two" class="wrapper style2 special">
					<div class="container">
						<header class="major">
							<h2>Upcoming events</h2>
						</header>
						<div class="row 150%">
							<?php
							require($toRoot.'includes/mysqli_connect.php');
							$now = date('Y-m-d');
                            $upcoming = [];
                            $sql = "SELECT * FROM events WHERE date > TIMESTAMP('$now') ORDER BY date DESC LIMIT 2";
                            $result = $conn->query($sql);
                            if (!empty($result) && $result->num_rows > 0) {
                                // output data of each row
                                // $roles = $result->fetch_assoc();
                                while($row = $result->fetch_assoc()) {
                                    array_push($upcoming, $row);
                                }
                            } else {
                                // echo "0 results";
                            }
							$conn->close();
							
							if(empty($upcoming)) {
								echo '<div class="no-events"><h3>More Exciting Events Coming Soon!</h3></div>';
								// echo '<div class="6u 12u$(xsmall)"><div class="image square captioned">';
								// echo '<img src="images/upcoming/more.png" />';
								// echo '<h3>Stay Tuned!</h3></div></div>';
							} else {
								foreach($upcoming as $event) {
									echo '<div class="6u 12u$(xsmall)"><div class="image square captioned">';
									echo '<img src="'.$event['image'].'" />';
									echo '<h3>'.$event['event'].'</h3></div></div>';
								}
							}
							
							?>
							<!-- <div class="6u 12u$(xsmall)">
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
							</div> -->
						</div>
					</div>
				</section>
			<!-- Three -->
				<!-- <section id = "three" class= "wrapper">
					<div class="container"  style="text-align:center;">
						<header class="major">
							<h2>Make a contribution</h2>
							<p>we accept donations through paypal</p>
						</header>
						<ul class="actions">
							<li><a href="#" class="button">Donate</a></li>
						</ul>
					</div>
				</section> -->
			<!-- Four -->
				<section id="four" class="wrapper style3 special">
					<div class="container">
						<header class="major">
							<h2>Sign up for Our Newsletter Emails</h2>
							<h4 class="thin" style="color:white;">UVA Emails only</h4>
						</header>
						<ul class="actions">
							<li><a href="https://goo.gl/forms/oJnobf1yXGz1vtiD3" class="button fit alt small" target="_blank">Sign-up</a></li>
						</ul>
					</div>
				</section>

		<!-- Footer -->
			<?php include($toRoot.'footer.php');?>