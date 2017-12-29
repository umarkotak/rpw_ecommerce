<?php
include 'connection.php';

$orders_id = null;
$users_id  = $_SESSION['user_id'];
$items_id  = $_POST['items_id'];
$quantity  = $_POST['quantity'];

$pdo = $conn->prepare('SELECT * FROM items WHERE id = :id');
$pdo->execute(array(':id' => $items_id));
$count = $pdo->rowcount();
$row = $pdo->fetch(PDO::FETCH_OBJ);

$total = $row->price * $quantity;
$status = 'on_cart';

try {
  $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $pdo = $conn->prepare('INSERT INTO carts (orders_id, users_id, items_id, quantity, total, status)
         values (:orders_id, :users_id, :items_id, :quantity, :total, :status)');

  $insertdata = array(':users_id' => $users_id,
                      ':orders_id' => $orders_id,
                      ':items_id' => $items_id,
                      ':quantity' => $quantity,
                      ':total' => $total,
                      ':status' => $status);
  $pdo->execute($insertdata);

  $_SESSION['notice'] = 'Your items has been added to cart';
  header("location: ?page=products");
} catch (PDOexception $e) {
  $_SESSION['notice'] = "Errors : " . $e->getMessage() . "<br/>";
  header("location: ?page=products");
}

?>
