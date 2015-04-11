<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
//new data to update
$supplier_id=$_POST['supplier'];
$name=htmlspecialchars($_POST['name']);
$original_price=htmlspecialchars($_POST['original_price']);
$quantity=htmlspecialchars($_POST['quantity']);
$product_price=htmlspecialchars($_POST['product_price']);

$inputs = array("$name" , "$original_price" , "$quantity" , "$product_price" );
foreach ($inputs as $key => $value) {
	if (empty($value)) {
		header("location: editproduct.php?id=$id&msg=empty_data"); die();
	}
}
//conn with (application)
require 'connection.php';
$sql="UPDATE products SET product_name='$name',original_price='$original_price',quantity='$quantity',product_price='$product_price' WHERE id=$id ";
$query=$conn->prepare($sql);
if ($query->execute()) {
	header("location: showproduct.php?msg=data_updated"); die();
} 
header("location: editproduct.php?msg=error_data");die();


?>