<?php
include "connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE user_id= $id";

if($conn->query($sql)==TRUE){
    echo "Deletion successfull";
} else "Error deleting" . $conn->error;

$conn->close();
header("location:select.php");

?>
