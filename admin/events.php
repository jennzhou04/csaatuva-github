<?php 
$toRoot = '../';
$currentPage = 'events';
include($toRoot.'_header_admin.php'); 

require($toRoot.'includes/mysqli_connect.php');
$count = 0;
$countpast = 0;
$sql = "SELECT * FROM events WHERE date >= DATE_SUB(NOW(),INTERVAL 1 YEAR) Order By date DESC";
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
    <!-- <a href="add_event.php">Add Event</a> -->
    
    <section>
    <span class="add">Add Event  <i class="far fa-calendar-plus"></i></span>
        <h3>Events</h3>
        
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>To Time</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($events as $event) {
                        echo '<tr>';
                        echo '<td class="event"><a value="'.$event['id'].'"">'.$event['event'].'</a></td>';
                        echo '<td>'.$event['date'].'</td>';
                        echo '<td>'.$event['time'].'</td>';
                        echo '<td>'.$event['to_time'].'</td>';
                        echo '<td>'.$event['location'].'</td>';
                        echo '<td><button id="deleteEvent" value="'.$event['id'].'"><i class="fas fa-times-circle"></i></button></td>';
                        echo '</tr>';
                    }
                ?>
               
                <!-- <tbody>
                    <tr>
                        <td>Item 1</td>
                        <td>Ante turpis integer aliquet porttitor.</td>
                        <td>29.99</td>
                    </tr>
                </tbody> -->
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </section>
    <div id="deleteModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Are you sure you want to delete this event?</p>
            <h3></h3>
            <button class="small">Delete</button>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var id = 0;
            $('span.add').click(function(e) {
                console.log('add');
                window.location.replace("add_event.php");
            });
			$('.table-wrapper table tbody td a').click(function(e) {
                e.preventDefault();
                sessionStorage.setItem("eventId", $(this).attr('value'));
                var url = "edit_event.php?event="+$(this).attr('value');
                window.location.replace(url);
            });

            $("button#deleteEvent").click(function(e) {
                $('#deleteModal').show();
                id = $(this).attr('value');
                const name = $(this).closest('tr').find('.event').text()
                console.log($(this).closest('tr').find('.event').text())
                $('#deleteModal .modal-content h3').text(name);
            });

            $('#deleteModal .modal-content button').click(function(e) {
                console.log("button");
                $.post("delete_event.php", {id: id}, function(data) {
                    console.log(id);   
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

<?php include($toRoot."footer_admin.php");?>