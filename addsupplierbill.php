<?php session_start();
//if the user is login or not
if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
	header('location: login.php'); die();
}

require 'connection.php';
if (isset($_POST['submit'])) {
	$supplier_id_bill=$_POST['supplier'];
	$date=date("Y-m-d");

	
	for ($i=0; $i <count($_POST['quantity']) ; $i++) { 
		$product_id=$_POST['products'][$i];
		$quantity_bill=htmlspecialchars($_POST['quantity'][$i]);
		$price=htmlspecialchars($_POST['price'][$i]);


		for ($r=0; $r <count($_POST['quantity']) ; $r++) { 
			if(empty($_POST['products'][$r]) || empty($_POST['price'][$r]) || empty($_POST['quantity'][$r])) {
				header("Location: supplierbill.php?msg=empty_data");
				die();
			}
		}



		$conn->beginTransaction();
		try {
			$bill_number = rand(2, 1000);
			//check if this supplier pay this product before or not 
			$check=$conn->query("SELECT * FROM products WHERE id='$product_id' && supplier_id='$supplier_id_bill' ");
			//if not pay this product before add data (this supplier pay this product in table products)
			// var_dump($check->rowCount()); die();
			if ($check->rowCount() == 0) {
			//select product name user add it 
			// $pro_na=$conn->query("SELECT product_name FROM products WHERE id = '$product_id' ");
			// $res_pro_na=$pro_na->fetch(PDO::FETCH_ASSOC);
			// extract($res_pro_na);
			// $query1=$conn->prepare("INSERT INTO products VALUES ('',?,?,?,?,?)");
			// $query1->bindValue(1,$product_name,PDO::PARAM_INT);
			// $query1->bindValue(2,$supplier_id_bill,PDO::PARAM_INT);
			// $query1->bindValue(3,$price,PDO::PARAM_INT);
			// $query1->bindValue(4,$quantity_bill,PDO::PARAM_INT);
			// $query1->bindValue(5,$price,PDO::PARAM_INT);
			// $query1->execute();
				header("location: product.php?msg=data_exist&pro=$product_name");die();
			}
			$total=bcmul($quantity_bill, $price);
			// echo "dddd";
			//insert info about this bill in table
			$sql="INSERT INTO bill_products VALUES ('',?,?,?,?,?,?)";
			$query=$conn->prepare($sql);
			$query->bindValue(1,$product_id,PDO::PARAM_INT);
			$query->bindValue(2,$quantity_bill,PDO::PARAM_INT);
			$query->bindValue(3,$price,PDO::PARAM_INT);
			$query->bindValue(4,$supplier_id_bill,PDO::PARAM_INT);
			$query->bindValue(5,$date,PDO::PARAM_STR);
			$query->bindValue(6,$bill_number,PDO::PARAM_INT);
			$query->execute();
			// var_dump(); die();
			// echo "dds";
			$query2=$conn->query("SELECT * FROM products WHERE supplier_id=$supplier_id_bill
				&& id=$product_id");
			while ($result=$query2->fetch(PDO::FETCH_ASSOC)) {
				extract($result);
			}
			$query3=$conn->prepare("UPDATE products SET quantity= $quantity + $quantity_bill,original_price='$price' WHERE supplier_id=$supplier_id_bill
				&& id=$product_id");
			$query3->execute();
			$update_debts=$conn->prepare("UPDATE suppliers SET debts= debts+$total WHERE id=$supplier_id_bill");
			$update_debts->execute();
			$update_pay=$conn->prepare("UPDATE pay_supplier SET elbaky=elbaky+$total WHERE supplier_id=$supplier_id_bill");
			$update_pay->execute();
			$conn->commit();
			

		} catch (Exception $e) {
			$conn->rollBack();
		}

	}	// end of for loop
	header("location: showsupplierbill.php?msg=data_inserted");die();
} // end of the if of check if the buttun of form clicked






?>