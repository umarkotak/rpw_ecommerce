<?php
include 'connection.php';

$user_id = $_SESSION['user_id'];
$date_created = date('Ymd');
$total_price = $_POST['total_price'];

try {
  $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $pdo = $conn->prepare('INSERT INTO orders (user_id, date_created, total_price)
         values (:user_id, :date_created, :total_price)');

  $insertdata = array(':user_id' => $user_id,
                      ':date_created' => $date_created,
                      ':total_price' => $total_price);
  $pdo->execute($insertdata);

  complete_item($user_id);
} catch (PDOexception $e) {
  $_SESSION['notice'] = "Errors : " . $e->getMessage() . "<br/>";
  header("location: ?page=products");
}

?>

<?php 
function complete_item($user_id){
  include 'connection.php';
  $pdo = $conn->prepare('SELECT MAX(id) as order_id FROM orders WHERE user_id = :user_id');
  $pdo->execute(array(':user_id' => $user_id ));
  $order = $pdo->fetch(PDO::FETCH_OBJ);
  
  $order_id = $order->order_id;

  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo = $conn->prepare('UPDATE carts SET
                          orders_id = :order_id
                          WHERE users_id = :user_id AND status = :current_status');
    $updatedata = array(':order_id' => $order_id,
                        ':current_status' => 'on_cart',
                        ':user_id' => $user_id);
    $pdo->execute($updatedata);

    $pdo = $conn->prepare("UPDATE carts SET
                          status = 'complete'
                          WHERE users_id = :user_id AND status = 'on_cart'");
    $updatedata = array(':user_id' => $user_id);
    $pdo->execute($updatedata);

    $_SESSION['notice'] = "Transaction Success";
    header("location: ?page=products");
  } catch (PDOexception $e) {
    $_SESSION['notice'] = "Transaction Failed : " . $e->getMessage();
    header("location: ?page=products");
  }
}
?>
