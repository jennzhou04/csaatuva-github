<?php 
$toRoot = '../';
$currentPage = 'resources';
include($toRoot.'_header_admin.php'); 

require($toRoot.'includes/mysqli_connect.php');
include($toRoot."chromephp/ChromePhp.php");

$resources = array();

if (isset($_POST['homepage_btn'])) {
    // echo 'start';
    ChromePhp::log(count($resources));
    // prepareUpload($resources['Homepage Background']['Name']);
    // unset($_POST['homepage_btn']);
}

$sql = "SELECT r.*, s.value location FROM resources r LEFT JOIN settings s ON r.Name = s.setting WHERE tags LIKE '%$currentPage%'";
$result = $conn->query($sql);
// $resources = array();

if ($result->num_rows > 0) {
    // output data of each row
    // ChromePhp::log("has results");
    
    while($row = $result->fetch_assoc()) {
        // $addLink = 
        $resources[$row['Name']] = $row;
        // ChromePhp:: log($row['Link']);
        if($row['Name'] == 'Homepage Background') {
            ChromePhp::log($row['Link']);
        }
        // array_push($resources, $row);
    }
} else {
    echo "0 results";
}

$conn->close();



?>

<div class="wrapper">
<div class="container">
    <div class="help-info">
        <h3>Image Upload Guidelines</h3>
        <ol>
            <li>Image must be a JPG, JPEG, PNG, or GIF</li>
            <li>File size must be under 5MB</li>
        </ol>
        <?php
            if(isset($_SESSION['errors'])) {
                foreach($_SESSION['errors'] as $message) {
                    echo $message;
                    echo "<br>";
                }
                unset($_SESSION['errors']);
            } else {
                
                // header("Refresh:0");
            }
        ?>
    </div>
        <div class="resource-wrapper">
            <div class="resource">
                <h4>Homepage Background</h4>
                <form id="uploadImage" method="post" enctype="multipart/form-data">
                    <div class="row uniform 50%">
                        <div class="12u$">
                            <?php
                                if($resources["Homepage Background"]) {
                                    echo '<img src="'.$toRoot. $resources["Homepage Background"]["Link"].'">';
                                }
                            ?>
                        </div>
                        <div class="12u$">
                            <input type="file" name="fileToUpload" id="fileToUpload"/>
                        </div>
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Submit" class="small" name="homepage_btn"/></li>
                                <li><input type="reset" class="small alt" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>

                </form>
            </div>
            <div class="resource">
                <h4>About Banner</h4>
                    <form id="uploadImage" method="post" enctype="multipart/form-data">
                        <div class="row uniform 50%">
                            <div class="12u$">
                                <?php
                                    if($resources["About Banner"]) {
                                        echo '<img src="'.$toRoot. $resources["About Banner"]["Link"].'">';
                                    }
                                ?>
                            </div>
                            <div class="12u$">
                                <input type="file" name="fileToUpload" id="fileToUpload"/>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" class="small" name="about_btn"/></li>
                                    <li><input type="reset" class="small alt" value="Reset" /></li>
                                </ul>
                            </div>
                        </div>

                </form>
            </div>
            <div class="resource">
                <h4>Officers Banner</h4>
                    <form id="uploadImage" method="post" enctype="multipart/form-data">
                        <div class="row uniform 50%">
                            <div class="12u$">
                                <?php
                                    if($resources["Officers Banner"]) {
                                        echo '<img src="'.$toRoot. $resources["Officers Banner"]["Link"].'">';
                                    }
                                ?>
                            </div>
                            <div class="12u$">
                                <input type="file" name="fileToUpload" id="fileToUpload"/>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" class="small" name="officers_btn"/></li>
                                    <li><input type="reset" class="small alt" value="Reset" /></li>
                                </ul>
                            </div>
                        </div>

                </form>
            </div>
        </div>

        <div class="links-wraper">
            <div class="link">
                <h4>New Members</h4>
                <form id="updateLink" method="post" enctype="multipart/form-data">
                    <div class="row uniform 50%">
                        <div class="12u$">
                            <input type="url" value="<?php echo $resources['New Members']['Link']; ?>"name="link" id="link"/>
                        </div>
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Submit" class="small" name="newMembers_btn"/></li>
                                <li><input type="reset" class="small alt" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="link">
                <h4>Returning Members</h4>
                <form id="updateLink" method="post" enctype="multipart/form-data">
                    <div class="row uniform 50%">
                        <div class="12u$">
                            <input type="url" value="<?php echo $resources['Returning Members']['Link']; ?>"name="link" id="link"/>
                        </div>
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Submit" class="small" name="returningMembers_btn"/></li>
                                <li><input type="reset" class="small alt" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        // include($toRoot."chromephp/ChromePhp.php");

        $editSuccess;
        $uploadSuccess;

        // Homepage
        if (isset($_POST['homepage_btn'])) {
            // echo 'start';
            prepareUpload($resources['Homepage Background']['Name']);
            // unset($_POST['homepage_btn']);
        }

        // About
        if (isset($_POST['about_btn'])) {
            prepareUpload($resources['About Banner']['Name']);
        }

        // Officers
        if (isset($_POST['officers_btn'])) {
            prepareUpload($resources['Officer Banner']['Name']);
        }

        // New Member
        if (isset($_POST['newMembers_btn'])) {
            prepareUpdate($resources['New Members']['Name']);
        }

        // Returning Member
        if (isset($_POST['returningMembers'])) {
            prepareUpdate($resources['Returning Members']['Name']);
        }

        function prepareUpload($name) {
            global $db, $errors, $resources, $uploadSuccess, $editSuccess, $fin;

            uploadImage($resources[$name]['location']);

            if($uploadSuccess) {
                $imageLink = $resources[$name]['location'].$_FILES['fileToUpload']['name'];
                $query = "UPDATE resources SET Link = '$imageLink' WHERE Name = '$name'";
                if ($db->query($query) === TRUE) {
                    // echo "Updated event successfully";
                    $editSuccess = true;
                } else {
                    echo "Error: " . $query . "<br>" . $db->error;
                }

                $db->close();
            } else {
                $_SESSION['errors'] = $errors;
                // foreach($errors as $message) {
                //     echo $message;
                //     echo "<br>";
                // }
            }
        }

        function prepareUpdate($name) {
            global $db, $errors, $resources, $uploadSuccess, $editSuccess, $fin;

            editLink($name);
        }

        // Edit Link
        function editLink($name){
            global $db, $errors, $editSuccess;

            $link = $_POST['link'];

            // make sure form is filled properly
            if(empty($link)) {
                array_push($errors, "Link is required");
            }


            if (count($errors) == 0) {
                
                $query = "UPDATE resources SET Link = '$link' WHERE Name='$name'";

                if ($db->query($query) === TRUE) {
                    $editSuccess = true;
                    
                } else {
                    $editSuccess = false;
                }
                $db->close();
            }
        }

        function uploadImage($location) {
            global $uploadSuccess, $errors, $toRoot;
            $target_dir = $toRoot.$location;
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
                array_push($errors, "Sorry, your file is larger than 5MB. Please try again.");
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $_FILES["fileToUpload"]["name"] ) {
                array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed. Please try again.");
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // array_push($errors, "Sorry, your file was not uploaded.");
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