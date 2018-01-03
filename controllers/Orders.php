<?php
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'order_history') {
    $order_histories = orders_by_user_id();
  }

// ACTION
} elseif (isset($_POST['submit'])) {
  if ($_POST['submit'] == 'checkout_order') { checkout_order(); }
} else {
  echo "No direct access allowed";
  die();
}
?>

<?php 
function checkout_order(){
  include "Connection.php";

  $user_id        = $_SESSION['user_id'];
  $date_created   = date('Ymd');
  $total_payment  = $_POST['total_payment'];

  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('INSERT INTO orders (user_id, date_created, total_price)
           values (:user_id, :date_created, :total_payment)');

    $data = array(':user_id' => $user_id,
                        ':date_created' => $date_created,
                        ':total_payment' => $total_payment);
    $sql->execute($data);

    complete_item($user_id);
  } catch (PDOexception $e) {
    $_SESSION['notice'] = "Errors : " . $e->getMessage() . "<br/>";
    header("location: ?page=order_food");
  }
}
?>

<?php 
function complete_item($user_id){
  include 'Connection.php';

  $sql = $conn->prepare('SELECT MAX(id) as order_id FROM orders WHERE user_id = :user_id');
  $sql->execute(array(':user_id' => $user_id ));
  $order = $sql->fetch(PDO::FETCH_OBJ);
  
  $order_id = $order->order_id;

  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare('UPDATE carts SET
                          orders_id = :order_id
                          WHERE users_id = :user_id AND status = :current_status');
    $updatedata = array(':order_id' => $order_id,
                        ':current_status' => 'on_cart',
                        ':user_id' => $user_id);
    $sql->execute($updatedata);

    $sql = $conn->prepare("UPDATE carts SET
                          status = 'complete'
                          WHERE users_id = :user_id AND status = 'on_cart'");
    $updatedata = array(':user_id' => $user_id);
    $sql->execute($updatedata);

    $_SESSION['notice'] = "Transaction Success";
    header("location: ?page=order_food");
  } catch (PDOexception $e) {
    $_SESSION['notice'] = "Transaction Failed : " . $e->getMessage();
    header("location: ?page=order_food");
  }
}
?>
