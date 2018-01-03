<?php 
function items_by_all() {
  include "Connection.php";

  $sql = $conn->prepare("SELECT * FROM items ORDER BY id DESC");
  $sql->execute();
  $items = $sql->fetchAll();

  return $items;
}

function items_by_id($id) {
  include "Connection.php";

  $sql = $conn->prepare("SELECT * FROM items WHERE id = '$id'");
  $sql->execute();
  $items = $sql->fetch(PDO::FETCH_OBJ);

  return $items;
}

function check_stock($item_id, $quantity) {
  include 'Connection.php';
  
  $sql = $conn->prepare('SELECT * FROM items WHERE id = :item_id');
  $sql->execute(array(':item_id' => $item_id));
  $row = $sql->fetch(PDO::FETCH_OBJ);

  if ($row->stock > $quantity) {
    return true;
  } else {
    return false;
  }
}

function carts_by_user_id($user_id){
  include 'Connection.php';

  $sql = $conn->prepare("SELECT * FROM carts WHERE users_id = '$user_id' AND status = 'on_cart' ORDER BY id DESC");
  $sql->execute();
  $cart_items = $sql->fetchAll();

  return $cart_items;
}

function carts_by_order_id($order_id){
  include "Connection.php";

  $sql = $conn->prepare("SELECT * FROM carts WHERE orders_id = '$order_id' ORDER BY id DESC");
  $sql->execute();
  $order_details = $sql->fetchAll();

  return $order_details;
}

function carts_notification_item($user_id){
  include 'Connection.php';

  $sql = $conn->prepare("SELECT * FROM carts WHERE users_id = '$user_id' AND status = 'on_cart' ORDER BY id DESC");
  $sql->execute();

  $notification_item = $sql->rowcount();

  return $notification_item;
}

function orders_by_user_id(){
  include "Connection.php";

  $user_id = $_SESSION['user_id'];
  $sql = $conn->prepare("SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC");
  $sql->execute();
  $order_histories = $sql->fetchAll();

  return $order_histories;
}
?>
