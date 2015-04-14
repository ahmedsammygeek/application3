<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
//conn with db (application)
require 'connection.php';
//delete this bill
$sql="DELETE FROM bills WHERE id=$id";
$query=$conn->query($sql);
if ($query->execute()) {
	header("location: showbill.php?msg=data_deleted");die();
}
header("lcocation: showbill.php?msg=error_data");die();
 ?>