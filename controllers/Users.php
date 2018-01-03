<?php
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'order_food') {

    $items = items_by_all();
  }

// ACTION
} elseif (isset($_POST['submit'])) {
  if ($_POST['submit'] == 'signup')  { signup(); }
} else {
  echo "No direct access allowed";
  die();
}
?>

<?php 
function signup() {
  include "Connection.php";

  $username  = $_POST['username'];
  $password  = $_POST['password'];
  $full_name = $_POST['full_name'];
  $email     = $_POST['email'];
  $phone     = $_POST['phone'];
  $status    = 'user';

  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('INSERT INTO users (username, password, full_name, email, phone, status)
           values (:username, :password, :full_name, :email, :phone, :status)');
    $data = array(':username' => $username,
                  ':password' => $password,
                  ':full_name' => $full_name,
                  ':phone' => $phone,
                   ':email' => $email,
                   ':status' => $status);
    $sql->execute($data);

    $_SESSION['notice'] = 'Your user account has been registered';
    header("location: ?page=login");
  } catch (PDOexception $e) {
    $_SESSION['notice'] = "Errors : " . $e->getMessage();
    header("location: ?page=signup");
  }
}
?>