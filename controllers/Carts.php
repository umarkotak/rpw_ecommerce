<?php
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'my_cart') {

    $cart_items = carts_by_user_id($_SESSION['user_id']);
  }

// ACTION
} elseif (isset($_POST['submit'])) {
  if ($_POST['submit'] == 'add_to_cart')      { add_to_cart(); }
  if ($_POST['submit'] == 'remove_from_cart') { remove_from_cart(); }
} else {
  echo "No direct access allowed";
  die();
}
?>

<?php 
function add_to_cart(){
  include "Connection.php";

  $order_id = null;
  $user_id  = $_SESSION['user_id'];
  $item_id  = $_POST['item_id'];
  $quantity  = (int)$_POST['quantity'];

  if ($quantity < 1) {
    $_SESSION['notice'] = 'Cannot add negative or zero quantity.';
    header("location: ?page=order_food");
    die();
  }

  if (check_stock($item_id, $quantity) == false) {
    $_SESSION['notice'] = 'Not enough stock.';
    header("location: ?page=order_food");
    die();
  }

  $sql = $conn->prepare('SELECT * FROM items WHERE id = :id');
  $sql->execute(array(':id' => $item_id));
  $count = $sql->rowcount();
  $row = $sql->fetch(PDO::FETCH_OBJ);

  $total = $row->price * $quantity;
  $status = 'on_cart';

  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('INSERT INTO carts (orders_id, users_id, items_id, quantity, total, status)
           values (:order_id, :user_id, :item_id, :quantity, :total, :status)');

    $insertdata = array(':user_id' => $user_id,
                        ':order_id' => $order_id,
                        ':item_id' => $item_id,
                        ':quantity' => $quantity,
                        ':total' => $total,
                        ':status' => $status);
    $sql->execute($insertdata);

    decrease_stock($item_id, $quantity);

    $_SESSION['notice'] = 'Your items has been added to cart';
    header("location: ?page=order_food");
  } catch (PDOexception $e) {
    $_SESSION['notice'] = "Errors : " . $e->getMessage() . "<br/>";
    header("location: ?page=order_food");
  }
}
 
function decrease_stock($item_id, $quantity) {
  include 'Connection.php';

  $sql = $conn->prepare('UPDATE items SET
                        stock = stock - :quantity
                        WHERE id = :item_id');
  $updatedata = array(':quantity' => $quantity,
                      ':item_id' => $item_id);
  $sql->execute($updatedata);
}

function remove_from_cart() {
  include 'Connection.php';

  $id       = $_POST['id'];
  $item_id  = $_POST['item_id'];
  $quantity = $_POST['quantity'];

  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("DELETE FROM carts WHERE id = :id AND status = 'on_cart'");
    $data = array(':id' => $id);
    $sql->execute($data);

    increase_stock($item_id, $quantity);

    $_SESSION['notice'] = 'Delete item from carts successfull.';
    header("location: ?page=my_cart");

  } catch (PDOexception $e) {
    $_SESSION['notice'] = "Delete failed : " . $e->getMessage();
    header("location: ?page=my_cart");
  }
}

function increase_stock($item_id, $quantity) {
  include 'Connection.php';

  $sql = $conn->prepare('UPDATE items SET
                        stock = stock + :quantity
                        WHERE id = :item_id');
  $data = array(':quantity' => (int)$quantity,
                ':item_id' => $item_id);
  $sql->execute($data);
}
?>
