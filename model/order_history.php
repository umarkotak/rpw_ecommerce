<?php include "connection.php"; ?>

<?php
$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC");
$query->execute();
$order_histories = $query->fetchAll();
?>

<?php 
function get_order_details($orders_id) {
  include "connection.php";

  $query = $conn->prepare("SELECT * FROM carts WHERE orders_id = '$orders_id' ORDER BY id DESC");
  $query->execute();
  $order_details = $query->fetchAll();
  return $order_details;
}
?>