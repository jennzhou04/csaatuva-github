<?php 
$toRoot = '../';
$currentPage = 'add-events';
include($toRoot.'_header_admin.php'); 

require($toRoot.'includes/mysqli_connect.php');
$count = 0;
$countpast = 0;
$sql = "SELECT * FROM events Order By date";
$result = $conn->query($sql);
$events = [];

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        array_push($events, $row);
    }
} else {
    echo "0 results";
}

$conn->close();


?>
<div class="wrapper">
    <div class="container">
<section>
		<h3>Add Event</h3>
		<form method="post">
		<?php echo display_error(); ?>
			<div class="row uniform 50%">
				<div class="12u$">
					<input type="text" name="name" id="name" value="" placeholder="Event Name" />
                </div>
                <div class="12u$">
					<input type="date" name="date" id="date" value="" placeholder="Event Date" />
                </div>
                <div class="12u$">
					<input type="time" name="time" id="time" value="" placeholder="Event Time" />
				</div>
				<!-- <div class="12u$">
					<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
				</div> -->
				<div class="12u$">
					<ul class="actions">
						<li><input type="submit" value="Submit" class="special" name="addEvent_btn"/></li>
						<li><input type="reset" value="Reset" /></li>
					</ul>
				</div>
			</div>
		</form>
    </section>
    <?php
    // call the login() function if register_btn is clicked
    if (isset($_POST['addEvent_btn'])) {
        addEvent();
    }

    // LOGIN USER
    function addEvent(){
        global $db, $errors;

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

            $query = "INSERT INTO events (event, date, time)
            VALUES ('$name', '$date', '$time')";
            // $results = mysqli_query($db, $query);
            if ($db->query($query) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $query . "<br>" . $db->error;
            }
            $db->close();
            $name = '';
            $date = '';
            $time = '';
            echo '<meta http-equiv="refresh" content="0">';
        }
    }
    ?>
    </div>
    </div>

<?php include($toRoot."footer_admin.php");?>