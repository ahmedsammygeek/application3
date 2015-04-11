<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
	header('location: login.php'); die();
}
//var user add it .
if (isset($_POST['submit'])) {
	$client=$_POST['client'];
	$bill_num=$_POST['num_bill'];
// 	$product=$_POST['product'];
// 	$quantity=$_POST['quantity'];
// 	$price=$_POST['price'];
// 	foreach ($quantity as  $value) {
// 		echo "$value" ."<br>";
// 	}
// 	var_dump($quantity);
// var_dump($price);die();
	$product1=$_POST['product'];
	$product2=$_POST['product1'];
	$product3=$_POST['product2'];
	$quantity1=$_POST['quantity'];
	$quantity2=$_POST['quantity1'];
	$quantity3=$_POST['quantity2'];
	$price1=$_POST['price'];
	$price2=$_POST['price1'];
	$price3=$_POST['price2'];
	$date=$_POST['date'];
}
//connection with db (application)
require 'connection.php';
//check if this product's price add before or no .
$query=$conn->query("SELECT price FROM bills WHERE product_id=$product1 && client_id=$client");
//if price exist price1 is this number
if ($query->rowCount() != 0) {
	$result=$query->fetch(PDO::FETCH_ASSOC);
	extract($result);
	$price1=$price;
}
//total1 = $quantity1 * $price1
$total1=bcmul($quantity1, $price1);
//in this case quantity and date empty 
//and price1 is not exist before and empty in inouts too
if (empty($quantity1) || empty($price1) || empty($date)) {
	header("location: bill.php?msg=empty_data");die();
}
//insert data of price1 in row
$query1=$conn->prepare("INSERT INTO bills VALUES ('',?,?,?,?,?,?,?) ");
$query1->bindValue(1,$client,PDO::PARAM_INT);
$query1->bindValue(2,$product1,PDO::PARAM_INT);
$query1->bindValue(3,$quantity1,PDO::PARAM_INT);
$query1->bindValue(4,$date,PDO::PARAM_INT);
$query1->bindValue(5,$price1,PDO::PARAM_INT);
//num of this bill
$query1->bindValue(6,$bill_num,PDO::PARAM_INT);
$query1->bindValue(7,$total1,PDO::PARAM_INT);
if ($query1->execute()) {
	//data inserted done -> update the realty quantuity in products table
	$update=$conn->prepare("UPDATE products SET quantity=quantity - $quantity1 WHERE id='$product1' ");
	$update->execute();
}
//check price2 exist or no
	$query2=$conn->query("SELECT price from bills WHERE product_id=$product2 && client_id=$client");
if ($query2->rowCount() != 0) {
	$result2=$query2->fetch(PDO::FETCH_ASSOC);
	extract($result2);
	$price2=$price;
}
//total = price * quantity
$total2=bcmul($quantity2, $price2);
if (empty($quantity2) || empty($price2)) {
	header("location: bill.php?msg=empty_data");die();
}
//insert data about second product
$query3=$conn->prepare("INSERT INTO bills VALUES ('',?,?,?,?,?,?,?) ");
$query3->bindValue(1,$client,PDO::PARAM_INT);
$query3->bindValue(2,$product2,PDO::PARAM_INT);
$query3->bindValue(3,$quantity2,PDO::PARAM_INT);
$query3->bindValue(4,$date,PDO::PARAM_INT);
$query3->bindValue(5,$price2,PDO::PARAM_INT);
$query3->bindValue(6,$bill_num,PDO::PARAM_INT);
$query3->bindValue(7,$total2,PDO::PARAM_INT);
if ($query3->execute()) {
	//update the realty quantity in products table
	$update1=$conn->prepare("UPDATE products SET quantity='quantity-$quantity2' WHERE id='$product2' ");
	$update1->execute();
}
//check price of product3 exist before or no ..
	$query4=$conn->query("SELECT price from bills WHERE product_id=$product3 && client_id=$client");
if ($query4->rowCount() != 0) {
	$result4=$query4->fetch(PDO::FETCH_ASSOC);
	extract($result4);
	$price3=$price;
}
//total=price * quantity
$total3=bcmul($quantity3, $price3);
if (empty($quantity3) || empty($price3)) {
	header("location: bill.php?msg=empty_data");die();
}
//insert data about product3
$query5=$conn->prepare("INSERT INTO bills VALUES ('',?,?,?,?,?,?,?) ");
$query5->bindValue(1,$client,PDO::PARAM_INT);
$query5->bindValue(2,$product3,PDO::PARAM_INT);
$query5->bindValue(3,$quantity3,PDO::PARAM_INT);
$query5->bindValue(4,$date,PDO::PARAM_INT);
$query5->bindValue(5,$price3,PDO::PARAM_INT);
$query5->bindValue(6,$bill_num,PDO::PARAM_INT);
$query5->bindValue(7,$total3,PDO::PARAM_INT);
if ($query5->execute()) {
	//update the realty quantity for product3 in products table
	$update2=$conn->prepare("UPDATE products SET quantity='quantity-$quantity3' WHERE id='$product3' ");
	if ($update2->execute()) {
		header("location: showbill.php?msg=data_inserted");die();
	}
	
}
header("location: bill.php?msg=error_data");die();













?>