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
				<p>2017 - 2018</p>
			</section>
			<section id="officer info" class="wrapper style1">
				<div class="container">
					<div id="replace"> </div>
				</div>
			</section>
			<?php 
			require('includes/mysqli_connect.php');
			$now = date('Y').'-01-01';
			$count = 0;
			$sql = "SELECT * FROM officers WHERE (title='President' OR title='Vice President' OR title='Treasurer' OR title='Secretary')
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

			echo '<header class="center"><p>Executive Board</p></header><div class="feature-grid">';
			foreach($exec as $officer) {
				echo '<div class="feature"><div class="image rounded"><img src="'.$officer['image'].'"></div>';
				echo '<div class="content"><header><h4>'.$officer['name'].'<span class="small"> - '.$officer['year'].'</span></h4>';
				echo '<p>'.$officer['title'].'</p><p>'.$officer['major'].'</p></header>';
				echo '<p>'.$officer['description'].'</p></div></div>';
			}
			echo '</div>';

			// $community = '<header class="center"><p>Community</p></header><div class="feature-grid">';
			// $culture = '<header class="center"><p>Culture</p></header><div class="feature-grid">';
			// $fundraising = '<header class="center"><p>Fundraising</p></header><div class="feature-grid">';
			// $historic = '<header class="center"><p>Historic</p></header><div class="feature-grid">';
			// $publicity = '<header class="center"><p>Publicity</p></header><div class="feature-grid">';
			// $social = '<header class="center"><p>Social</p></header><div class="feature-grid">';
			// $sports = '<header class="center"><p>Sports</p></header><div class="feature-grid">';
			// $headAdvisors = '<header class="center"><p>Head Advisors</p></header><div class="feature-grid">';
			// $advisors = '<header class="center"><p>Advisors</p></header><div class="feature-grid">';
			// while ($row=mysqli_fetch_array($result)) {
			// 	if($row['title']=="President") {
			// 		$pres = '<div class="feature"><div class="image rounded"><img src="';
			// 		$pres .= $row['image'];
			// 		$pres .= '" alt="" /></div><div class="content"><header><h4>';
			// 		$pres .= $row['name'];
			// 		$pres .= '<span style="font-style:italic;font-size: .8em;font-weight:500;text-transform:none;"> - ';
			// 		$pres .= $row['year'];
			// 		$pres .= '</span></h4><p>';
			// 		$pres .= $row['title'];
			// 		$pres .= '</p><p>';
			// 		$pres .= $row['major'];
			// 		$pres .= '</p></header><p>';
			// 		$pres .= $row['description'];
			// 		$pres .= '</o></div></div>';
			// 	}
			// 	elseif($row['title']=="Vice President") {
			// 		$vice = '<div class="feature"><div class="image rounded"><img src="';
			// 		$vice .= $row['image'];
			// 		$vice .= '" alt="" /></div><div class="content"><header><h4>';
			// 		$vice .= $row['name'];
			// 		$vice .= '<span style="font-style:italic;font-size: .8em;font-weight:500;text-transform:none;"> - ';
			// 		$vice .= $row['year'];
			// 		$vice .= '</span></h4><p>';
			// 		$vice .= $row['title'];
			// 		$vice .= '</p><p>';
			// 		$vice .= $row['major'];
			// 		$vice .= '</p></header><p>';
			// 		$vice .= $row['description'];
			// 		$vice .= '</o></div></div>';
			// 	}
			// 	elseif($row['title']=="Secretary") {
			// 		$sec = '<div class="feature"><div class="image rounded"><img src="';
			// 		$sec .= $row['image'];
			// 		$sec .= '" alt="" /></div><div class="content"><header><h4>';
			// 		$sec .= $row['name'];
			// 		$sec .= '<span style="font-style:italic;font-size: .8em;font-weight:500;text-transform:none;"> - ';
			// 		$sec .= $row['year'];
			// 		$sec .= '</span></h4><p>';
			// 		$sec .= $row['title'];
			// 		$sec .= '</p><p>';
			// 		$sec .= $row['major'];
			// 		$sec .= '</p></header><p>';
			// 		$sec .= $row['description'];
			// 		$sec .= '</o></div></div>';
			// 	}
			// 	elseif($row['title']=="Treasurer") {
			// 		$tres = '<div class="feature"><div class="image rounded"><img src="';
			// 		$tres .= $row['image'];
			// 		$tres .= '" alt="" /></div><div class="content"><header><h4>';
			// 		$tres .= $row['name'];
			// 		$tres .= '<span style="font-style:italic;font-size: .8em;font-weight:500;text-transform:none;"> - ';
			// 		$tres .= $row['year'];
			// 		$tres .= '</span></h4><p>';
			// 		$tres .= $row['title'];
			// 		$tres .= '</p><p>';
			// 		$tres .= $row['major'];
			// 		$tres .= '</p></header><p>';
			// 		$tres .= $row['description'];
			// 		$tres .= '</o></div></div>';
			// 	}
				// $id = $row['id']; 
				// $name = $row['name']; 
				// $year = $row['year'];
				// $major = $row['major']; 
				// $description = $row['description'];
				// $image = $row['image']; 
				// $title = $row['title'];
				// if ($id > 0) {
				// 	$data[$count] = array($name, $year, $major, $description, $image, $title);
				// 	$count = $count + 1;
				// }
			
			// $EXEC .= $pres . $vice . $sec . $tres . '</div>';
			?>

			<?php
			require('includes/mysqli_connect.php');
			$now = date('Y').'-01-01';
			$count = 0;
			$sql = "SELECT * FROM officers WHERE (title='President' OR title='Vice President' OR title='Treasurer' OR title='Secretary')
			AND created > (SELECT year(created) FROM officers GROUP BY created ORDER BY created DESC LIMIT 1)";
			$result = $conn->query($sql);
			$officers = [];
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					array_push($officers, $row);
				}
			} else {
				// echo "0 results";
			}
			$conn->close();
			?>
			<header class="center"><p>Executive Board</p></header>
			<div class="officer-grid">
				<div class="officer">
					<div class="circle-crop">
						<img src="images/officers/JenniferZhou.jpg" alt="Jenn"/>
					</div>
					<div class="content">
						<header>
							<h4>Jennifer Zhou</h4>
							<p>Treasurer</p>
							<p>Computer Science<span> - 3rd Year</span></p>
						</header>
						<p>Something funny</p>
					</div>
				</div>
				<div class="officer">
					<div class="circle-crop">
						<img src="images/officers/JenniferZhou.jpg" alt="Jenn"/>
					</div>
					<div class="content">
						<header>
							<h4>Jennifer Zhou</h4>
							<p>Treasurer</p>
							<p>Computer Science<span> - 3rd Year</span></p>
						</header>
						<p>Something funny</p>
					</div>
				</div>
				<div class="officer">
					<div class="circle-crop">
						<img src="images/officers/JenniferZhou.jpg" alt="Jenn"/>
					</div>
					<div class="content">
						<header>
							<h4>Jennifer Zhou<span> - 3rd Year</span></h4>
							<p>Treasurer</p>
							<p>Computer Science</p>
						</header>
						<p>Something funny</p>
					</div>
				</div>
			</div>
			
			<script>
				// this code is to insert into the div with id "replace"
				
				var data = <?php echo json_encode($data);?>;
				var htmlbuilder = "";
				
				//these are formatted in the feature-grid
				//EXEC BOARD
				htmlbuilder+= '<header class="center"><p>Executive Board</p></header><div class="feature-grid">';
				//President
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "President") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '<span style="font-style:italic;font-size: .8em;font-weight:500;text-transform:none;"> - ';
						htmlbuilder += data[i][1];
						htmlbuilder += '</span></h4><p>';
						htmlbuilder +=  data[i][5];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				//Vice President
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Vice President") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '<span style="font-style:italic;font-size: .8em;font-weight:500;text-transform:none;"> - ';
						htmlbuilder += data[i][1];
						htmlbuilder += '</span></h4><p>';
						htmlbuilder +=  data[i][5];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				//Secretary
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Secretary") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '<span style="font-style:italic;font-size: .8em;font-weight:500;text-transform:none;"> - ';
						htmlbuilder += data[i][1];
						htmlbuilder += '</span></h4><p>';
						htmlbuilder +=  data[i][5];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				//Treasurer
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Treasurer") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '<span style="font-style:italic;font-size: .8em;font-weight:500;text-transform:none;"> - ';
						htmlbuilder += data[i][1];
						htmlbuilder += '</span></h4><p>';
						htmlbuilder +=  data[i][5];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				htmlbuilder+= '</div>';
				
				//OFFICER BOARD
				
				//Community
				htmlbuilder+= '<header class="center"><p>Community</p></header><div class="feature-grid">';
				for(var i = 0; i < data.length; i++) {
					var count = 0;
					if(data[i][5] == "Community") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';	
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder += '</div>';
						htmlbuilder += '</div>';
						count ++;
					}
					
				}
				
				htmlbuilder+= '</div>';
				
				//Culture
				htmlbuilder+= '<header class="center"><p>Culture</p></header><div class="feature-grid">';
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Culture") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				
				htmlbuilder+= '</div>';
				
				//Fundraising
				htmlbuilder+= '<header class="center"><p>Fundraising</p></header><div class="feature-grid">';
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Fundraising") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				
				htmlbuilder+= '</div>';
				
				//Historic
				htmlbuilder+= '<header class="center"><p>Historic</p></header><div class="feature-grid">';
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Historic") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				
				htmlbuilder+= '</div>';
				
				//Publicity
				htmlbuilder+= '<header class="center"><p>Publicity</p></header><div class="feature-grid">';
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Publicity") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				
				htmlbuilder+= '</div>';
				
				//Social
				htmlbuilder+= '<header class="center"><p>Social</p></header><div class="feature-grid">';
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Social") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				
				htmlbuilder+= '</div>';
				
				//Sports
				htmlbuilder+= '<header class="center"><p>Sports</p></header><div class="feature-grid">';
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Sports") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				
				htmlbuilder+= '</div>';
				
				//Head Advisors
				htmlbuilder+= '<header class="center"><p>Head Advisors</p></header><div class="feature-grid">';
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Head Advisor") {
						htmlbuilder += '<div class="feature">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				
				htmlbuilder+= '</div>';
				
				//Advisors
				//these are formatted in the adviser-grid
				htmlbuilder+= '<header class="center"><p>Advisors</p></header><div class="advisor-grid">';
				for(var i = 0; i < data.length; i++) {
					if(data[i][5] == "Advisor") {
						htmlbuilder += '<div class="advisor">';
						htmlbuilder += '<div class="image rounded"><img src="'+data[i][4]+'" alt="" /></div>';
						htmlbuilder += '<div class="content"><header><h4>';
						htmlbuilder +=  data[i][0];
						htmlbuilder += '</h4><p style="text-transform: none;">';
						htmlbuilder +=  data[i][1];
						htmlbuilder += '</p><p>';
						htmlbuilder +=  data[i][2];
						htmlbuilder += '</p></header>';
						htmlbuilder	+= '<p>' + data[i][3] + '</o>';
						htmlbuilder+= '</div>';
						htmlbuilder+= '</div>';
					}
					
				}
				
				htmlbuilder+= '</div>';
				document.getElementById("replace").innerHTML = htmlbuilder;
				
			</script>

		<!-- Footer -->
			<?php include('footer.php');?>