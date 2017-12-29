<?php 
include "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$pdo = $conn->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
$pdo->execute(array(':username' => $username,
                    ':password' => $password));
$count = $pdo->rowcount();
$row = $pdo->fetch(PDO::FETCH_OBJ);

if ($count==0) {
  $_SESSION['notice'] = "Wrong username or password";
  header("location: ?page=login");
  
} else {
  $_SESSION['notice'] = "Login success";
  $_SESSION['username'] = $username;
  $_SESSION['user_id'] = $row->id;
  $_SESSION['auth'] = $row->status;

  header("location: ?page=home");
}
?>
