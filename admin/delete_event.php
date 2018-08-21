<?php 
$toRoot = '../';
$currentPage = 'delete_event';
include($toRoot.'_header_admin.php'); 
global $db;

$eventId = 0;
if(isset($_POST['id'])) {
    $eventId = $_POST['id'];
} else {
    $eventId = null;
}
ChromePhp::log($eventId);
$sql = "DELETE FROM events WHERE id = '$eventId'";
$result = $db->query($sql);
if ($db->query($sql) === TRUE) {
    echo "Deleted event successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
$db->close();

?>