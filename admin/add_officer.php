<?php 
$toRoot = '../';
$currentPage = 'add-officer';
include($toRoot.'_header_admin.php'); 
include($toRoot."chromephp/ChromePhp.php");

$newYear = false;
$currentYear = $_SESSION["year"];
if(isset($_POST['currentYear'])) {
    $newYear = true;
    $currentYear = (string)$_POST['currentYear']." - ".strval($_POST['currentYear'] + 1);
    $_POST = array();
}

?>

<div class="wrapper">
    <div class="container">
        <section>
            <a href="officers.php" style="float:right;">Go Back</a>
            <h3>Add Officer</h3>
            <form id="editOfficer" method="post" enctype="multipart/form-data">
            <?php echo display_error(); ?>
                <div class="row uniform 50%">
                    <div class="12u$">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="" placeholder="Name" />
                    </div>
                    <div class="12u$">
                        <label for="selectYear">Year</label>
                        <div class="select-wrapper" name="selectYear">
                            <select name="year" id="year">
                                <option selected disabled>Select A Year</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="12u$">
                        <label for="major">Major</label>
                        <input type="text" name="major" id="major" value="" placeholder="Major" />
                    </div>
                    <div class="12u$">
                        <label for="info">Fun Fact</label>
                        <textarea name="info" id="info" placeholder="What's a fun fact?" rows="6"></textarea>
                    </div>
                    <div class="12u$">
                        <label for="title">Position</label>
                        <div class="select-wrapper" name="title">  
                        <select name="category" id="category">
                            <option selected disabled>Select A Position</option>
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
                                echo' value="'.$role['title'].'">'.$role['title'].'</option>';
                            }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="12u$">
                        <label for="officer-year">Officer Board Year</label>
                        <div class="select-wrapper" name="officer-year">  
                        <select name="officer-year" id="officer-year">
                            <option selected disabled>Select a Year</option>
                            <?php
                            require($toRoot.'includes/mysqli_connect.php');
                            $years = [];
                            $sql = "SELECT officer_year FROM officers GROUP BY officer_year ORDER BY officer_year ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                // $roles = $result->fetch_assoc();
                                while($row = $result->fetch_assoc()) {
                                    array_push($years, $row);
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();

                            if($newYear) {
                                $addedYear = array();
                                $addedYear['officer_year'] = $currentYear;
                                array_push($years, $addedYear);
                            }

                            foreach($years as $opt) {
                                echo '<option ';
                                if($opt['officer_year'] == $currentYear) {
                                    echo 'selected';
                                }
                                echo' value="'.$opt['officer_year'].'">'.$opt['officer_year'].'</option>';
                            }
                            ?>
                        </select>
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
        $addSuccess;
        $uploadSuccess;
        $noUpload = false;
        if (isset($_POST['editOfficer_btn'])) {
            addOfficer();
            
            if(($addSuccess && $uploadSuccess) || ($addSuccess && $noUpload)) {
                echo "<script>window.location.replace('officers.php')</script>";
            } else {
                foreach($errors as $message) {
                    echo $message;
                    echo "<br>";
                }
            }
        }

        // LOGIN USER
        function addOfficer(){
            global $db, $errors, $eventId, $addSuccess, $events, $noUpload;

            // grap form values
            $name = $_POST['name'];
            $year = $_POST['year'];
            $major = $_POST['major'];
            $description = $_POST['info'];
            $title = $_POST['category'];
            $officer_year = $_POST['officer-year'];
            if(isset($_FILES['fileToUpload']['name']) && $_FILES['fileToUpload']['name'] != '') {
                $image = "images/officers/" . basename($_FILES["fileToUpload"]["name"]);
            } else {
                $image = NULL;
            } 
            $created = date('Y-m-d');

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
            if(empty($officer_year)) {
                array_push($errors, "Officer Year is required");
            }
            if(isset($_FILES['fileToUpload']['name'])) {
                uploadImage();
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
                
                $query = "INSERT INTO officers (name, year, major, description, image, title, created, officer_year, isExec, isAdvisor) 
                VALUES ('$name', '$year', '$major', '$description', '$image', '$title', TIMESTAMP('$created'), '$officer_year', '$isExec', '$isAd' )";

                if ($db->query($query) === TRUE) {
                    // echo "Updated event successfully";
                    $addSuccess = true;
                    
                } else {
                    echo "Error: " . $query . "<br>" . $db->error;
                    $addSuccess = false;
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
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                array_push($errors, "Sorry, your file is larger than 5MB");
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