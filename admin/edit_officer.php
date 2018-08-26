<?php 
$toRoot = '../';
$currentPage = 'edit-officer';
include($toRoot.'_header_admin.php'); 
require($toRoot.'includes/mysqli_connect.php');
$officer = [];
$officerId = 0;
if(isset($_GET['officer'])) {
    $officerId = $_GET['officer'];
} else {
    $officerId = null;
}

$sql = "SELECT * FROM officers WHERE id = '$officerId'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $officer = $result->fetch_assoc();
} else {
    // echo "0 results";
}
$conn->close();

?>

<div class="wrapper">
    <div class="container">
        <section>
            <h3>Edit Officer</h3>
            <form id="editOfficer" method="post" enctype="multipart/form-data">
            <?php echo display_error(); ?>
                <div class="row uniform 50%">
                    <div class="12u$">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $officer['name'];?>" placeholder="Name" />
                    </div>
                    <div class="12u$">
                        <label for="selectYear">Year</label>
                        <div class="select-wrapper" name="selectYear">
                            <select name="year" id="year">
                                <option value="1st Year" <?php if($officer['year']== '1st Year') echo 'selected' ;?>>1st Year</option>
                                <option value="2nd Year" <?php if($officer['year']== '2nd Year') echo 'selected' ;?>>2nd Year</option>
                                <option value="3rd Year" <?php if($officer['year']== '3rd Year') echo 'selected' ;?>>3rd Year</option>
                                <option value="4th Year" <?php if($officer['year']== '4th Year') echo 'selected' ;?>>4th Year</option>
                            </select>
                        </div>
                        <!-- <input type="text" name="year" id="year" value="<?php echo $officer['year'];?>" placeholder="Year" /> -->
                    </div>
                    <div class="12u$">
                        <label for="major">Major</label>
                        <input type="text" name="major" id="major" value="<?php echo $officer['major'];?>" placeholder="Major" />
                    </div>
                    <div class="12u$">
                        <label for="info">Fun Fact</label>
                        <textarea name="info" id="info" placeholder="What's a fun fact?" rows="6"><?php echo $officer['description']; ?></textarea>
                    </div>
                    <div class="12u$">
                        <label for="title">Position</label>
                        <div class="select-wrapper" name="title">  
                        <select name="category" id="category">
                            <?php
                            require($toRoot.'includes/mysqli_connect.php');
                            $roles = [];
                            $sql = "SELECT title FROM officers GROUP BY title ORDER BY title ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                // $roles = $result->fetch_assoc();
                                while($row = $result->fetch_assoc()) {
                                    array_push($roles, $row);
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            foreach($roles as $role) {
                                echo '<option ';
                                if($role['title'] == $officer['title']) {
                                    echo 'selected';
                                }
                                echo' value="'.$role['title'].'">'.$role['title'].'</option>';
                            }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="12u$">
                        <div class="circle-crop">
                            <?php if($officer['image']) {
                                // echo '<label for="officer-image">Profile Picture</label>';
                                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'" name="officer-image"/>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="12u$">
                        Upload New Profile Picture
                        <input type="file" name="fileToUpload" id="fileToUpload"/>
                    </div>
                    <div class="12u$">
                        <ul class="actions">
                            <li><input type="submit" value="Submit" class="special" name="editOfficer_btn"/></li>
                            <li><input type="reset" value="Reset" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </section>
        <?php
        $editSuccess;
        $uploadSuccess;
        $noUpload = false;
        if (isset($_POST['editOfficer_btn'])) {
            editEvent();
            if(isset($_FILES['fileToUpload']['name'])) {
                uploadImage();
            }
            if(($editSuccess && $uploadSuccess) || ($editSuccess && $noUpload)) {
                echo "<script>window.location.replace('officers.php')</script>";
            } else {
                foreach($errors as $message) {
                    echo $message;
                }
            }
        }

        // LOGIN USER
        function editEvent(){
            global $db, $errors, $eventId, $editSuccess, $events, $noUpload, $officerId, $officer;

            // grap form values
            $name = $_POST['name'];
            $year = $_POST['year'];
            $major = $_POST['major'];
            $description = $_POST['info'];
            $title = $_POST['category'];
            if(isset($_FILES['fileToUpload']['name']) && $_FILES['fileToUpload']['name'] != '') {
                $image = "images/officers/" . basename($_FILES["fileToUpload"]["name"]);
            } else {
                $image = $officer['image'];
                $noUpload = true;
            }
            $info = $_POST['info'];

            // make sure form is filled properly
            if(empty($name)) {
                array_push($errors, "Name is required");
            }
            if(empty($year)) {
                array_push($errors, "Year is required");
            }
            if(empty($major)) {
                array_push($errors, "Major is required");
            }
            if(empty($description)) {
                array_push($errors, "Fun Fact is required");
            }
            if(empty($title)) {
                array_push($errors, "Position is required");
            }
            
            $exec_titles=['President', 'Vice President', 'Treasurer', 'Secretary'];
            $advisor_titles=['Advisor', 'Head Advisor'];
            // attempt login if no errors on form
            if (count($errors) == 0) {
                // $password = md5($password);

                if(in_array($title, $exec_titles)) {
                    $isExec = true;
                } else {
                    $isExec = false;
                }

                if(in_array($title, $advisor_titles)) {
                    $isAd = true;
                } else {
                    $isAd = false;
                }
                
                $query = "UPDATE officers SET name = '$name', year = '$year', major = '$major', title = '$title',
                description = '$description', image = '$image', isExec = '$isExec', isAdvisor = '$isAd' WHERE id=$officerId";

                if ($db->query($query) === TRUE) {
                    // echo "Updated event successfully";
                    $editSuccess = true;
                    
                } else {
                    // echo "Error: " . $query . "<br>" . $db->error;
                    $editSuccess = false;
                }
                $db->close();
                // echo '<meta http-equiv="refresh" content="0">';
            }
        }
        function uploadImage() {
            global $uploadSuccess, $errors;
            $target_dir = "../images/officers/";
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
    </div>
</div>


<?php include($toRoot."footer_admin.php");?>