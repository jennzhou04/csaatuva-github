<?php 
$toRoot='./';
$currentPage='login';
require_once('loadFromDatabase.php');
include($toRoot.'_header.php');
?>

<div class="wrapper">
	<div class="container">
		<div class="header">
			<h2>Login</h2>
		</div>
		
		<form method="post" action="login.php">

			<?php echo display_error(); ?>
			<div class="row uniform 50%">
			<div class="6u$">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="6u$">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="6u$">
				<button type="submit" class="btn" name="login_btn">Login</button>
			</div>
			</div>
		</form>
		
	</div>
</div>


<?php include($toRoot.'footer.php') ?>