<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
//conn with db (application)
require 'connection.php';
$query2=$conn->query("SELECT * FROM pay_client WHERE id=$id ");
	$result=$query2->fetch(PDO::FETCH_ASSOC);
	extract($result);
//delete supplier 
$sql="DELETE FROM pay_client WHERE id=$id";
$query=$conn->prepare($sql);
if ($query->execute()) {
    $query3=$conn->prepare("UPDATE clients SET deserved=deserved + $money WHERE id=$client_id");
    if ($query3->execute()) {
    	header("location: showpayclient.php?msg=data_deleted");die();
    }
	header("location: showpayclient.php?msg=error_data");die();
}
header("lcocation: showpayclient.php?msg=error_data");die();
 ?>