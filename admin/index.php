<?php 
$toRoot = '../';
$currentPage = 'index';
include($toRoot.'_header_admin.php'); 
?>

<div class="wrapper">
	<div class="container">
		<h2 class="centered">Admin Console</h2>
		<div class="admin-console">
			<div class="action"><a href="officers.php" value="officers">
				<i class="far fa-user-circle"></i>
			</a>
				<p>Officers</p>
			</div>
			<div class="action"><a href="events.php" value="events">
				<i class="far fa-calendar-alt"></i>
			</a>
				<p>Events</p>
			</div>
			<div class="action"><a href="gallery.php" value="gallery">
				<i class="far fa-images"></i>
			</a>
				<p>Gallery</p>
			</div>
		</div>


	
	</div>
</div>

<?php include('../footer_admin.php'); ?>
