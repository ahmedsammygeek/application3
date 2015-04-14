<?php 

require 'connection.php';

$product_id = $_POST['product_id'];

$client_id = $_POST['client_id'];

$res = array('type' => '' , 'price'=> '');

$query = $conn->prepare("SELECT price FROM bills WHERE client_id = ? AND product_id = ?");
$query->bindValue(1,$client_id , PDO::PARAM_INT);
$query->bindValue(2,$product_id, PDO::PARAM_INT);
$query->execute();
if($query->rowCount()) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $price = $result['price'];
    $res['price'] = $price;
    $res['type'] = 1;
     echo json_encode($res);
}
else {
    $query = $conn->prepare("SELECT product_price FROM products WHERE  id = ?");
    $query->bindValue(1,$product_id , PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $price = $result['product_price'];
    $res['price'] = $price;
    $res['type'] = 0;
     echo json_encode($res);
}
?>