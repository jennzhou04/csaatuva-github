<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
require('includes/mysqli_connect.php');
$count = 0;
$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql)
or die("Error: ".mysqli_error($conn));

while ($row=mysqli_fetch_array($result)) {
	$id = $row['id'];
	$month = date('M', strtotime($row['date']));
	$date = date('d', strtotime($row['date'])); 
	$event = $row['event']; 
	if ($row['time']) {
		$time = date('g:i A', strtotime($row['time']) );
	}
	else {
		$time = $row['time'];
	}
	if ($row['to_time']) {
		$to_time = date('g:i A', strtotime($row['to_time']) );
	}
	else {
		$to_time = $row['to_time'];
	}
	$image = $row['image']; 
	$fb_link = $row['fb_link'];
	$location = $row['location'];
	$info = $row['info'];
	$more = $row['more'];
	$hidden = $row['hidden'];
	if ($hidden == 0) {
		$data[$count] = array($month, $date, $event, $time, $to_time, $image, $fb_link, $location, $info, $more);
		$count = $count + 1;
	}
	if ($hidden == 1) {
		$past[$count] = array($month, $date, $event, $time, $to_time, $image, $fb_link, $location, $info, $more);
		$count = $count + 1;
	}
}
?>


<html>
	<head>
		<title>Events</title>
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
						<h2>Upcoming Events</h2>
					</header>
						<div class="event-grid">
							<div id="replace" class="event">
							
							</div>
						</div>
				</div>
			</section>
			<script>
				var data = <?php echo json_encode($data);?>;
				var hb = "";
				//hb is a html builder string
				
				for(var i = 0; i < data.length; i++) {
					hb += '<div class="event">';
					hb += '<div class="date"><h6>';
					hb += data[i][0];
					hb += '</h6><p>';
					hb += data[i][1];
					hb += '</p></div>';
					if(data[i][6]) {
						hb += '<div class="event image"><a href="'+data[i][6]+'" target="_blank"><img src="';
						hb += data[i][5];
						hb += '" alt="" /></a></div><div class="content"><header><h4>';
					}
					else {
						hb += '<div class="event image"><img src="';
						hb += data[i][5];
						hb += '" alt="" /></div><div class="content"><header><h4>';
					}
					hb += data[i][2];
					hb += '</h4><h6>';
					hb += data[i][7];
					if(data[i][3]) {
						hb += ' | ' + data[i][3];
						if(data[i][4]) {
							hb += ' - ' + data [i][4];
						}
					}
					hb += '</h6></header>';
					hb += '<p>';
					hb += data[i][8];
					hb += '</p></div></div>';
				}
												
				document.getElementById("replace").innerHTML = hb;

			</script>
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