<!DOCTYPE HTML>

<?php
$toRoot = './';
$currentPage = 'events';
include($toRoot.'_header.php');

require('includes/mysqli_connect.php');
$now = date('Y-m-d');
$sql = "SELECT * FROM events WHERE date > TIMESTAMP('$now') ORDER BY date ASC";
$result = $conn->query($sql);
$events=[];

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		array_push($events, $row);
	}
} else {
	// echo "0 results";
}
$conn->close();

?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">			
					<header class="major special">
						<h2>Upcoming Events</h2>
					</header>
						<div class="event-grid">
							<div id="replace" class="event">
							
							</div>

							<?php
							if(empty($events)) {
								echo '<h4>Stay tuned for more upcoming events!</h4>';
							} else {
								foreach($events as $event) {
									$month = date('M', strtotime($event['date']));
									$date = date('d', strtotime($event['date'])); 
									echo '<div class="event"><div class="date"><h6>'.$month.'</h6><p>'.$date.'</p></div>';
									echo '<div class="event image"><a href="'.$event['fb_link'].'" target="_blank">';
									echo '<img src="'.$event['image'].'"><div class="event overlay"></div></a></div>';
									echo '<div class="content"><header><h4>'.$event['event'].'</h4>';
									$time = date('g:i A', strtotime($event['time']));
									if ($event['to_time']) {
										$to_time = ' - ' . date('g:i A', strtotime($event['to_time']) );
									}
									else {
										$to_time = $event['to_time'];
									}
									echo '<h6>'.$event['location'].' | '.$time.$to_time.'</h6></header>';
									echo '<p>'.$event['info'].'</p>';
									echo '<p>'.$event['more'].'</p></div></div>';
								}
							}
							
							?>
						</div>
				</div>
			</section>
			
		<!-- Footer -->
			<? require 'footer.php';?>