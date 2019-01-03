<?php 
$toRoot = '../';
$currentPage = 'delete_officer';
include($toRoot.'_header_admin.php'); 
global $db;

$officerId = 0;
if(isset($_POST['id'])) {
    $officerId = $_POST['id'];
} else {
    $officerId = null;
}
$sql = "DELETE FROM officers WHERE id = '$officerId'";
$result = $db->query($sql);
if ($db->query($sql) === TRUE) {
    echo "Deleted officer successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
$db->close();

?>