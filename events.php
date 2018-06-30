<!DOCTYPE HTML>

<?php
//create connection to database
require('includes/mysqli_connect.php');
$count = 0;
$countpast = 0;
$sql = "SELECT * FROM events Order By date";
$result = mysqli_query($conn, $sql)
or die("Error: ".mysqli_error($conn));

//create json data from table information
while ($row=mysqli_fetch_array($result)) {
	$id = $row['id'];
	$month = date('M', strtotime($row['date']));
	$date = date('d', strtotime($row['date'])); 
	$event = $row['event']; 
	//all time is formatted as "6:30AM/PM"
	//check if there is a time, otherwise put in as null
	if ($row['time']) {
		$time = date('g:i A', strtotime($row['time']) );
	}
	else {
		$time = $row['time'];
	}
	//check if there is a time, otherwise put in as null
	if ($row['to_time']) {
		$to_time = date('g:i A', strtotime($row['to_time']) );
	}
	else {
		$to_time = $row['to_time'];
	}
	$image = $row['image']; 
	//fb-link will be mapped to the image
	$fb_link = $row['fb_link'];
	$location = $row['location'];
	$info = $row['info'];
	$more = $row['more'];
	$hidden = $row['hidden'];
	//hidden is denoted by either a 0 or 1(hidden) in the table
	if ($hidden == 0) {
		$data[$count] = array($month, $date, $event, $time, $to_time, $image, $fb_link, $location, $info, $more);
		$count = $count + 1;
	}
	else {
		$past[$countpast] = array($month, $date, $event, $time, $to_time, $image, $fb_link, $location, $info, $more);
		$countpast = $countpast + 1;
	}

}
?>


<html>
	<head>
		<title>Events</title>
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
						<h2>Upcoming Events</h2>
					</header>
						<div class="event-grid">
							<div id="replace" class="event">
							
							</div>
						</div>
				</div>
			</section>
			<script>
				//this code is to insert into the div with id "replace"
				
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
					//create a link out of the event image that opens to a new page
					if(data[i][6]) {
						hb += '<div class="event image"><a href="'+data[i][6]+'" target="_blank"><img src="';
						hb += data[i][5];
						hb += '" alt="" /><div class="event overlay"></div></a></div><div class="content"><header><h4>';
					}
					else {
						hb += '<div class="event image"><img src="';
						hb += data[i][5];
						hb += '" alt="" /></div><div class="content"><header><h4>';
					}
					hb += data[i][2];
					hb += '</h4><h6>';
					hb += data[i][7];
					//formatting the location and time into "location | time"
					if(data[i][3]) {
						hb += ' | ' + data[i][3];
						if(data[i][4]) {
							hb += ' - ' + data [i][4];
						}
					}
					hb += '</h6></header>';
					hb += '<p>';
					hb += data[i][8];
					hb += '</p><p>' ;
					hb += data[i][9];
					hb += '</p></div></div>';
				}
				document.getElementById("replace").innerHTML = hb;

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