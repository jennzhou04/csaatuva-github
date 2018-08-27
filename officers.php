<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
$toRoot = './';
$currentPage = 'officers';
include($toRoot.'_header.php');
?>
		<!-- Main -->
			<section id="officer">
				<h2>Officer Board</h2>
				<?php
				require('includes/mysqli_connect.php');
				$now = date('Y').'-01-01';
				$sql = "SELECT year(created) year FROM officers GROUP BY created ORDER BY created DESC LIMIT 1";
				$result = $conn->query($sql);
				$date;

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$date = $row['year'];
					}
				} else {
					// echo "0 results";
				}
				$conn->close();

				$to_date = DateTime::createFromFormat('Y', $date)->modify('+1 year')->format('Y');

				echo '<p>'.$date.' - '.$to_date.'</p>';
				?>
				<!-- <p>2017 - 2018</p> -->
			</section>
			<section id="officer info" class="wrapper style1">				
			<?php 
			require('includes/mysqli_connect.php');
			$now = date('Y').'-01-01';
			$count = 0;
			$sql = "SELECT * FROM officers WHERE isExec = true
			AND created > (SELECT year(created) FROM officers GROUP BY created ORDER BY created DESC LIMIT 1)";
			$result = $conn->query($sql);
			$exec = [];
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if($row['title'] == 'President') {
                        $p = $row;
                    } 
                    if($row['title'] == 'Vice President') {
                        $vp = $row;
                    }
                    if($row['title'] == 'Treasurer') {
                        $t = $row;
                    }
                    if($row['title'] == 'Secretary') {
                        $s = $row;
                    }
					// array_push($officers, $row);
				}
			} else {
				// echo "0 results";
			}
			$conn->close();
			if(!empty($p)) {
                array_push($exec, $p);
            }
            if(!empty($vp)) {
                array_push($exec, $vp);
            }
            if(!empty($t)) {
                array_push($exec, $t);
            }
            if(!empty($s)) {
                array_push($exec, $s);
            }

			echo '<header class="center"><p>Executive Board</p></header><div class="officer-grid">';
			foreach($exec as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';
			?>

			<?php
			require('includes/mysqli_connect.php');
			$now = date('Y').'-01-01';
			$count = 0;
			$sql = "SELECT * FROM officers WHERE isExec = false AND isAdvisor = false
			AND created > (SELECT year(created) FROM officers GROUP BY created ORDER BY created DESC LIMIT 1)
			ORDER BY title ASC";
			$result = $conn->query($sql);
			$community = [];
			$culture = [];
			$fundraising = [];
			$historic = [];
			$publicity = [];
			$social = [];
			$sports = [];
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if($row['title'] == 'Community') {
						array_push($community, $row);
					}
					if($row['title'] == 'Culture') {
						array_push($culture, $row);
					}
					if($row['title'] == 'Fundraising') {
						array_push($fundraising, $row);
					}
					if($row['title'] == 'Historic') {
						array_push($historic, $row);
					}
					if($row['title'] == 'Publicity') {
						array_push($publicity, $row);
					}
					if($row['title'] == 'Social') {
						array_push($social, $row);
					}
					if($row['title'] == 'Sports') {
						array_push($sports, $row);
					}
					
				}
			} else {
				// echo "0 results";
			}
			$conn->close();

			echo '<header class="center"><p>Community</p></header><div class="officer-grid">';
			foreach($community as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';

			echo '<header class="center"><p>Culture</p></header><div class="officer-grid">';
			foreach($culture as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';

			echo '<header class="center"><p>Fundraising</p></header><div class="officer-grid">';
			foreach($fundraising as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';

			echo '<header class="center"><p>Historic</p></header><div class="officer-grid">';
			foreach($historic as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';
			
			echo '<header class="center"><p>Publicity</p></header><div class="officer-grid">';
			foreach($publicity as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';

			echo '<header class="center"><p>Social</p></header><div class="officer-grid">';
			foreach($social as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';

			echo '<header class="center"><p>Sports</p></header><div class="officer-grid">';
			foreach($sports as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';
			
			?>

			<?php 
			require('includes/mysqli_connect.php');
			$now = date('Y').'-01-01';
			$count = 0;
			$sql = "SELECT * FROM officers WHERE isAdvisor = true
			AND created > (SELECT year(created) FROM officers GROUP BY created ORDER BY created DESC LIMIT 1)";
			$result = $conn->query($sql);
			$headAdvisor = [];
			$advisor = [];
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if($row['title'] == 'Head Advisor') {
                        array_push($headAdvisor, $row);
                    } 
                    if($row['title'] == 'Advisor') {
						array_push($advisor, $row);
                    }
				}
			} else {
				// echo "0 results";
			}
			$conn->close();

			echo '<header class="center"><p>Head Advisors</p></header><div class="officer-grid">';
			foreach($headAdvisor as $officer) {
				echo '<div class="officer"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';

			echo '<header class="center"><p>Advisors</p></header><div class="advisor-grid">';
			foreach($advisor as $officer) {
				echo '<div class="advisor"><div class="circle-crop"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';
			?>
			</section>

		<!-- Footer -->
			<?php include('footer.php');?>