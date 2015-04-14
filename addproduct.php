<?php  session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
//info about productes
if (isset($_POST['submit'])) {
	$supplier_id=$_POST['supplier'];
	$name=htmlspecialchars($_POST['name']);
	//reciveed price
	$original_price=htmlspecialchars($_POST['original_price']);
	$quantity=htmlspecialchars($_POST['quantity']);
	$product_price=htmlspecialchars($_POST['product_price']);
}
//array used to be sure user complete data
$inputs = array("$name" , "$original_price" , "$quantity" , "$product_price" );
foreach ($inputs as $key => $value) {
	if (empty($value)) {
		header("location: product.php?msg=empty_data"); die();
	}
}
// connection with db (application)
require 'connection.php';
$check=$conn->query("SELECT product_name FROM products WHERE product_name='$name' ");
if ($check->rowCount()) {
	
header("location: product.php?msg=data_exist&pro=$name");die();
}
//insert info about data in products table
$sql="INSERT INTO products VALUES('',?,?,?,?,?) ";
$query=$conn->prepare($sql);
$query->bindValue(1,$name,PDO::PARAM_STR);
$query->bindValue(2,$supplier_id,PDO::PARAM_INT);
$query->bindValue(3,$original_price,PDO::PARAM_INT);
$query->bindValue(4,$quantity,PDO::PARAM_INT);
$query->bindValue(5,$product_price,PDO::PARAM_INT);
if ($query->execute()) {
	header("location: showproduct.php?msg=data_inserted");die();
}
header("location: product.php?msg=error_data"); die();
?>