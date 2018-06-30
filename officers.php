<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
require('includes/mysqli_connect.php');
$count = 0;
$sql = "SELECT * FROM 1718officers";
$result = mysqli_query($conn, $sql)
or die("Error: ".mysqli_error($conn));

while ($row=mysqli_fetch_array($result)) {
	$id = $row['id']; 
	$name = $row['name']; 
	$year = $row['year'];
	$major = $row['major']; 
	$description = $row['description'];
	$image = $row['image']; 
	$title = $row['title'];
	if ($id > 0) {
		$data[$count] = array($name, $year, $major, $description, $image, $title);
		$count = $count + 1;
	}
}

?>
<html>
	<head>
		<title>Officers</title>
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
			<section id="officer">
				<h2>Officer Board</h2>
				<p>2017 - 2018</p>
			</section>
			<section id="officer info" class="wrapper style1">
				<div class="container">
					<div id="replace"> </div>
				</div>
			</section>
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
			<? require 'footer.php';?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>