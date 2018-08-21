<?php 
$toRoot = '../';
$currentPage = 'add-events';
include($toRoot.'_header_admin.php'); 
require($toRoot.'includes/mysqli_connect.php');
$events = [];
$eventId = 0;
if(isset($_GET['event'])) {
    $eventId = $_GET['event'];
} else {
    $eventId = null;
}
$count = 0;
$countpast = 0;
$sql = "SELECT * FROM events WHERE id = '$eventId'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $events = $result->fetch_assoc();
} else {
    echo "0 results";
}
$conn->close();

?>

<div class="wrapper">
    <div class="container">
<section>
		<h3>Edit Event</h3>
		<form method="post">
        <?php echo display_error(); ?>
			<div class="row uniform 50%">
				<div class="12u$">
					<input type="text" name="name" id="name" value="<?php echo $events['event'];?>" placeholder="Event Name" />
                </div>
                <div class="12u$">
					<input type="date" name="date" id="date" value="<?php echo $events['date']; ?>" placeholder="Event Date" />
                </div>
                <div class="12u$">
					<input type="time" name="time" id="time" value="<?php echo $events['time']; ?>" placeholder="Event Time" />
				</div>
				<!-- <div class="12u$">
					<textarea name="message" id="message" placeholder="Enter y  our message" rows="6"></textarea>
				</div> -->
				<div class="12u$">
					<ul class="actions">
						<li><input type="submit" value="Submit" class="special" name="editEvent_btn"/></li>
						<li><input type="reset" value="Reset" /></li>
					</ul>
				</div>
			</div>
		</form>
    </section>
    </div>
    </div>
    <?php
    // call the login() function if register_btn is clicked
    if (isset($_POST['editEvent_btn'])) {
        editEvent();
    }

    // LOGIN USER
    function editEvent(){
        global $db, $errors, $eventId;

        // grap form values
        $name = $_POST['name'];
        $date = $_POST['date'];
        $time = $_POST['time'].':00';

        // make sure form is filled properly
        if(empty($name)) {
            array_push($errors, "Event name is required");
        }
        if(empty($date)) {
            array_push($errors, "Date is required");
        }
        if(empty($time)) {
            array_push($errors, "Time is required");
        }

        // attempt login if no errors on form
        if (count($errors) == 0) {
            // $password = md5($password);
            $query = "UPDATE events SET event = '$name', date = '$date', time = '$time' WHERE id=$eventId";

            if ($db->query($query) === TRUE) {
                echo "Updated event successfully";
                
            } else {
                echo "Error: " . $query . "<br>" . $db->error;
                ChromePhp::log($db->error);
            }
            $db->close();
            $name = '';
            $date = '';
            $time = '';
            echo '<meta http-equiv="refresh" content="0">';
        }
    }
    ?>
<?php include($toRoot."footer_admin.php");?>