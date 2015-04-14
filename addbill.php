<?php session_start();


var_dump($_POST); die();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
	header('location: login.php'); die();
}
//var user add it .
if (isset($_POST['submit'])) {
	$client=$_POST['client'];
	$date=date("Y-m-d");
	$bill_num=rand(2,100000);
	$total_of_bill=array();
	for ($i=0; $i < count($_POST['quantity']); $i++) { 
		$quantity=htmlspecialchars($_POST['quantity'][$i]);
		$price=htmlspecialchars($_POST['price'][$i]);
		$product=$_POST['products'][$i];
		for ($r=0; $r < count($_POST['quantity']); $r++) { 
			if (empty($quantity) || empty($price) || empty($product)) {
				header("location: bill.php?msg=empty_data");die();
			} // empty of if to check vars empty ~!!
		}
			//connection with db (application)
		require 'connection.php';
		$conn->beginTransaction();
		try {
	//bill number

//check if this product's price add before or no .
// 			$query=$conn->query("SELECT price FROM bills WHERE product_id=$product && client_id=$client");
// //if price exist price1 is this number
// 			if ($query->rowCount() != 0) {
// 				$result=$query->fetch(PDO::FETCH_ASSOC);
// 				extract($result);

// 			}
//total1 = $quantity1 * $price1
			$total=bcmul($quantity, $price);
//in this case quantity and date empty 
//and price1 is not exist before and empty in inouts too
// if (empty($quantity1) || empty($price1) || empty($date)) {
// 	header("location: bill.php?msg=empty_data");die();
// }
//insert data of price1 in row
// array_push($total_of_bill, $total);
			// var_dump($total_of_bill);die();

			$query1=$conn->prepare("INSERT INTO bills VALUES ('',?,?,?,?,?,?,?) ");
			$query1->bindValue(1,$client,PDO::PARAM_INT);
			$query1->bindValue(2,$product,PDO::PARAM_INT);
			$query1->bindValue(3,$quantity,PDO::PARAM_INT);
			$query1->bindValue(4,$date,PDO::PARAM_INT);
			$query1->bindValue(5,$price,PDO::PARAM_INT);
//num of this bill
			$query1->bindValue(6,$bill_num,PDO::PARAM_INT);
			$query1->bindValue(7,$total,PDO::PARAM_INT);
			$query1->execute();
	//data inserted done -> update the realty quantuity in products table

			$update=$conn->prepare("UPDATE products SET quantity=quantity - $quantity WHERE id='$product' ");
			$update->execute();
			$update_debts=$conn->prepare("UPDATE clients SET deserved= deserved+$total WHERE id=$client");
			$update_debts->execute();
			$update_pay=$conn->prepare("UPDATE pay_client SET elbaky=elbaky+$total WHERE client_id=$client");
			$update_pay->execute();
			$conn->commit();
			

		} catch (Exception $e) {
			$conn->rollBack();	
		}
		// var_dump($total_of_bill);die();

	}// end of for (vars)

	// var_dump($total_of_bill); die();
	header("location: showbill.php?msg=data_inserted");die();
} // end of if isset


?>