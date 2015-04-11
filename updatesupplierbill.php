<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_POST['submit'])) {
	$product_id=$_POST['product'];
	$price=htmlspecialchars($_POST['price']);
	$supplier_id_bill=$_POST['supplier'];
	$date=$_POST['date'];
}
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$inputs = array( $price , $date );
	foreach ($inputs as $key => $value) {
		if (empty($value)) {
			header("location: editsupplierbill.php?id=$id&msg=empty_data");die();
		}
	}
}
require 'connection.php';
$query=$conn->prepare("UPDATE bill_products SET product_id='$product_id',
	price='$price',supplier_id='$supplier_id_bill',time='$date'  WHERE id='$id'");
if ($query->execute()) {
	$query2=$conn->query("SELECT * FROM products WHERE supplier_id=$supplier_id_bill
		&& id=$product_id");
	while ($result=$query2->fetch(PDO::FETCH_ASSOC)) {
		extract($result);
	}
	$query3=$conn->prepare("UPDATE products SET original_price=$price WHERE supplier_id=$supplier_id_bill
		&& id=$product_id");
	if ($query3->execute()) {
		header("location: showsupplierbill.php?msg=data_inserted");die();
	}
}
header("location: supplierbill.php?msg=error_data");die();







?>