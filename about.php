<?php 
$toRoot = './';
$currentPage = 'about';
include($toRoot.'_header.php');

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
    echo '<style>#about { background-image: url("'.$toRoot.'images/overlay.png"), url("'.$toRoot.$resources['About Banner']['Link'].'")}</style>';
?>

		<!-- Main -->
			<section id="about">
				<div class="title">
					<h1>About CSA</h1>
					<p class="thin">Chinese Student Association</p>
				</div>
					<!-- <header class="major special">
						<h2>About CSA</h2>
						<p>The Chinese Student Association at the University of Virginia</p>
					</header> -->
			</section>
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
			<section id="info" class="wrapper style2" >
				<div class="container">
					<p>The main goal of the Chinese Student Association at the University of Virginia is to create an atmosphere where Chinese, Chinese-Americans, and all those interested in Chinese culture can come together. From organizing small get-togethers to large-scale events integrated with college and community life, CSA allows students to meet others to whom they can relate in various community, cultural, and social settings. As an awareness and promoting organization, CSA also addresses and discusses issues concerning Chinese and Chinese-Americans as students and as a community.</p>
					<p>While CSA is devoted to Chinese culture and community within the University, it welcomes and encourages people of all ages, races, and backgrounds to participate in, contribute to, and become part of the organization.</p>
					<p>Although this organization has members who are University of Virginia students and may have University employees associated or engaged in its activities and affairs, the organization is not a part of or an agency of the University. It is a separate and independent organization which is responsible for and manages its own activities and affairs. The University does not direct, supervise or control the organization and is not responsible for the organization’s contracts, acts or omissions.</p>

				</div>
			</section>

		<!-- Footer -->
			<? require 'footer.php';?>