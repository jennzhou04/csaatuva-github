<?php 
$toRoot = '../';
$currentPage = 'officers';
include($toRoot.'_header_admin.php');

if(isset($_POST['year'])) {
    $currentYear = $_POST['year'];
} else {
    $currentYear = date('Y');
}


?>


<div class="wrapper">
    <div class="container">
        
    <section>
    <?php
    require($toRoot.'includes/mysqli_connect.php');
    $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear'";
    $result = $conn->query($sql);
    $officers = [];

    if ($result->num_rows > 0) {
        // output data of each row
        
        while($row = $result->fetch_assoc()) {
            array_push($officers, $row);
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
    <span class="add">Add Officer <i class="fas fa-user-circle"></i></span>
        <h1>Officer Board</h1>

        <div class="12u$">
            <form id="selectYear" method="post">
                <div class="select-year">
                    <div class="select-wrapper 2u 12u$(small)">        
                    <select name="year" id="year">
                        <?php 
                        require($toRoot.'includes/mysqli_connect.php');
                        $sql = "SELECT year(created) year FROM officers o GROUP BY YEAR(o.created) DESC";
                        $result = $conn->query($sql);
                        $years = [];
                    
                        if ($result->num_rows > 0) {
                            // output data of each row
                            
                            while($row = $result->fetch_assoc()) {
                                array_push($years, $row);
                            }
                        } else {
                            echo "0 results";
                        }
                    
                        $conn->close();

                        foreach($years as $year) {
                            echo '<option';
                            if($currentYear == $year['year']) {
                                echo ' selected';
                            }
                            $toYear = DateTime::createFromFormat('Y', $year['year'])->modify('+1 year')->format('Y');
                            echo ' value="'.$year['year'].'">'.$year['year']."-".$toYear.'</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <input type="submit" value="Update" class="small" name="selectYear_btn"/>
                </div>  
            </form>
        </div>

        <?php
        if(isset($_POST['selectYear_btn'])) {
            $currentYear = $_POST['year'];
        }
        ?>
        
        <h3>Exec</h3>
        <!-- <label for="exec">Exec</label> -->
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' 
            AND (title='President' OR title='Vice President' OR title='Secretary' OR title='Treasurer')";
            $result = $conn->query($sql);
            $exec = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    if($row['title'] == 'President') {
                        $p = $row;
                    } 
                    if($row['title'] == 'Vice President') {
                        $vp = $row;
                    }
                    if($row['title'] == 'Treasurer') {
                        $t = $row;
                    }
                    if($row['title'] == 'Secretary') {
                        $s = $row;
                    }
                    // array_push($exec, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            if(!empty($p)) {
                array_push($exec, $p);
            }
            if(!empty($vp)) {
                array_push($exec, $vp);
            }
            if(!empty($t)) {
                array_push($exec, $t);
            }
            if(!empty($s)) {
                array_push($exec, $s);
            }

            foreach($exec as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4>';
                echo '<p>'.$officer['title'].'</p></div>';
            }
            ?>
        </div>
    
        <h3>Community</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Community'";
            $result = $conn->query($sql);
            $community = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($community, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($community as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>

        <h3>Culture</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Culture'";
            $result = $conn->query($sql);
            $culture = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($culture, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($culture as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>

        <h3>Fundraising</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Fundraising'";
            $result = $conn->query($sql);
            $fundraising = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($fundraising, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($fundraising as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>

        <h3>Historic</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Historic'";
            $result = $conn->query($sql);
            $historic = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($historic, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($historic as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>

        <h3>Publicity</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Publicity'";
            $result = $conn->query($sql);
            $publicity = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($publicity, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($publicity as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>

        <h3>Social</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Social'";
            $result = $conn->query($sql);
            $social = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($social, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($social as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>

        <h3>Sports</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Sports'";
            $result = $conn->query($sql);
            $sports = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($sports, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($sports as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>

        <h3>Head Advisors</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Head Advisor'";
            $result = $conn->query($sql);
            $ha = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($ha, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($ha as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>

        <h3>Advisors</h3>
        <div class="officers">
            <?php
            require($toRoot.'includes/mysqli_connect.php');
            $sql = "SELECT * FROM officers WHERE YEAR(created) = '$currentYear' AND title='Advisor'";
            $result = $conn->query($sql);
            $advisor = [];
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    array_push($advisor, $row);
                }
            } else {
                echo "0 results";
            }            
            $conn->close();

            foreach($advisor as $officer) {
                echo '<div class="officer-display">';
                echo '<div class="delete-officer"><div class="circle-crop" value="'.$officer['id'].'">';
                echo '<img src="'.$toRoot.$officer['image'].'" alt="'.$officer['name'].'">';
                echo '</div><i class="fas fa-times-circle delete" value="'.$officer['id'].'" value="'.$officer['id'].'"></i>';
                echo '</div><h4 class="name">'.$officer['name'].'</h4></div>';
            }
            ?>
        </div>
        
    </section>
    <div id="deleteModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Are you sure you want to delete this officer?</p>
            <h3></h3>
            <button class="small">Delete</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var id = 0;
            $('span.add').click(function(e) {
                window.location.replace("add_officer.php");
            });
			$('.circle-crop').click(function(e) {
                e.preventDefault();
                sessionStorage.setItem("officerId", $(this).attr('value'));
                var url = "edit_officer.php?officer="+$(this).attr('value');
                window.location.replace(url);
            });

            $(".delete").click(function(e) {
                $('#deleteModal').show();
                id = $(this).attr('value');
                const name = $(this).parent().parent().find('.name').text();
                // console.log($(this).parent().parent().find('.name').text())
                $('#deleteModal .modal-content h3').text(name);
            });

            $('#deleteModal .modal-content button').click(function(e) {
                $.post("delete_officer.php", {id: id}, function(data) {
                    location.reload();
                })
            })

            $('#deleteModal .modal-content .close').click(function(e) {
                $('#deleteModal').hide();
            });

            $(window).click(function(e) {
                if($(event.target).attr('id') == $('#deleteModal').attr('id')) {
                    $('#deleteModal').hide();
                }
            });
        });
        
    </script>

    </div>
</div>

<?php include($toRoot."footer_admin.php");?>