<?php 
$toRoot = '../';
$currentPage = 'edit-event';
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
		<form id="editEvent" method="post" enctype="multipart/form-data">
        <?php echo display_error(); ?>
			<div class="row uniform 50%">
				<div class="12u$">
                    <label for="name">Event Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $events['event'];?>" placeholder="Event Name" />
                </div>
                <div class="12u$">
                    <label for="date">Event Date</label>
					<input type="date" name="date" id="date" value="<?php echo $events['date']; ?>" placeholder="Event Date" />
                </div>
                <div class="2u 12u$(small)">
                    <label for="time">Start Time</label>
                    <input type="time" name="time" id="time" value="<?php echo $events['time']; ?>" placeholder="Event Time" />
                </div>
                <div class="2u 12u$(small)">
                    <label for="to-time">End Time</label>
                    <input type="time" name="to-time" id="to-time" value="<?php echo $events['to_time']; ?>" />
                </div>
                <div class="12u$">
                    <label for="location">Event Location</label>
                    <input type="text" name="location" id="location" value="<?php echo $events['location']; ?>" placeholder="Event Location"/>
                </div>
				<div class="12u$">
                    <label for="info">Event Description</label>
					<textarea name="info" id="info" placeholder="Enter your event description here" rows="6"><?php echo $events['info']; ?></textarea>
                </div>
                <div class="12u$">
                    <label for="fb-link">Link to Facebook Event</label>
                    <input type="text" name="fb-link" id="fb-link" value="<?php echo $events['fb_link']; ?>" placeholder="Facebook Event Link" />
                </div>
                <div class="event-preview">
                    <?php if($events['image']) {
                        echo '<label for="event-image">Event Flyer</label>';
                        echo '<img src="'.$toRoot.$events['image'].'" alt="'.$events['event'].'" name="event-image"/>';
                        }
                    ?>
                </div>
				<div class="12u$">
                    Upload New Event Flyer
                    <input type="file" name="fileToUpload" id="fileToUpload"/>
				</div>
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
    $editSuccess;
    $uploadSuccess;
    $noUpload = false;
    if (isset($_POST['editEvent_btn'])) {
        editEvent();
        if(isset($_FILES['fileToUpload']['name'])) {
            uploadImage();
        }
        if(($editSuccess && $uploadSuccess) || ($editSuccess && $noUpload)) {
            echo "<script>window.location.replace('events.php')</script>";
        } else {
            foreach($errors as $message) {
                echo $message;
            }
        }
    }

    // LOGIN USER
    function editEvent(){
        global $db, $errors, $eventId, $editSuccess, $events, $noUpload;

        // grap form values
        $name = $_POST['name'];
        $date = $_POST['date'];
        $time = $_POST['time'].':00';
        $to_time = $_POST['to-time'].':00';
        $location = $_POST['location'];
        $fb_link = $_POST['fb-link'];
        if(isset($_FILES['fileToUpload']['name']) && $_FILES['fileToUpload']['name'] != '') {
            $image = "images/events/" . basename($_FILES["fileToUpload"]["name"]);
        } else {
            $image = $events['image'];
            $noUpload = true;
        }
        $info = $_POST['info'];

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
        if(empty($location)) {
            array_push($errors, "Location is required");
        }
        // if($events['image'] && empty($image)) {
        //     $image = $events['image'];
        // } else if (empty($image)) {
        //     $image = NULL;
        // }
        

        // attempt login if no errors on form
        if (count($errors) == 0) {
            // $password = md5($password);
            $query = "UPDATE events SET event = '$name', date = '$date', time = '$time',
            to_time='$to_time', location='$location', fb_link='$fb_link', image = '$image', info = '$info' WHERE id=$eventId";

            if ($db->query($query) === TRUE) {
                // echo "Updated event successfully";
                $editSuccess = true;
                
            } else {
                // echo "Error: " . $query . "<br>" . $db->error;
                $editSuccess = false;
            }
            $db->close();
            $name = '';
            $date = '';
            $time = '';
            // echo '<meta http-equiv="refresh" content="0">';
        }
    }
    function uploadImage() {
        global $uploadSuccess, $errors;
        $target_dir = "../images/events/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                // array_push($errors, "File is an image - " . $check["mime"] . ".");
                $uploadOk = 1;
            } else {
                array_push($errors, "File is not an image");
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            array_push($errors, "Sorry, your file is larger than 1MB");
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $_FILES["fileToUpload"]["name"] ) {
            array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            array_push($errors, "Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && count($errors) == 0) {
                // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $uploadSuccess = true;
            } else {
                $uploadSuccess = false;
                // echo "<p>Sorry, there was an error uploading your image.</p>";
            }
        }
    }
    ?>
<?php include($toRoot."footer_admin.php");?>