<!DOCTYPE HTML>
<?php require_once($toRoot.'loadFromDatabase.php'); ?>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<title>Chinese Student Association</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo $toRoot; ?>assets/css/main.css" />
		<link rel="stylesheet" href="<?php echo $toRoot; ?>assets/css/csa.css" />
		<meta property="og:site_name" content="CSA at UVA"/>
		<meta property="og:title" content="Chinese Student Association"/>
		<meta property="og:image" content="http://www.csaatuva.com/previewimage.jpg" />
		<link rel="icon"  type="image/png" href="<?php echo $toRoot; ?>favicon.png" />
	</head>
	<body class="landing">
		<!-- Header -->
			<header id="header" class="alt">
			<!-- <div class = "headerimage">
				<img src="images/header.png" alt="" style="width:260px;height:65px;">
			</div> -->
			<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
			<!-- <h1>CSA<span>AT</span>UVA</h1> -->
			<div class="header-logo">
				<?php include('assets/knot-logo.svg'); ?>
			</div>
			
			<nav id="nav">
				<ul>
					<li><a href="<?php echo $toRoot; ?>index.php" class="hidden"><img src="images/header.png" alt="" style="width:75%;height:auto;"></a></a></li>
					<li><a href="<?php echo $toRoot; ?>about.php">About</a>
					</li>
					<li><a href="<?php echo $toRoot; ?>officers.php">Officers</a></li>
					<li><a href="<?php echo $toRoot; ?>events.php">Events</a></li>
					<li><a href="<?php echo $toRoot; ?>gallery.php">Gallery</a></li>
				</ul>
			</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>