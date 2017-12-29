<?php include "connection.php"; ?>

<?php
$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT * FROM carts WHERE users_id = '$user_id' AND status = 'on_cart' ORDER BY id DESC");
$query->execute();
$cart_items = $query->fetchAll();
?>

<?php 
$notification_item = $query->rowcount();
?>