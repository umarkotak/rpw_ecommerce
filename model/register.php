<?php
include 'connection.php';

$username  = $_POST['username'];
$password  = $_POST['password'];
$full_name = $_POST['full_name'];
$email     = $_POST['email'];
$phone     = $_POST['phone'];
$status    = 'user';

try {
  $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $pdo = $conn->prepare('INSERT INTO users (username, password, full_name, email, phone, status)
         values (:username, :password, :full_name, :email, :phone, :status)');

  $insertdata = array(':username' => $username,
                      ':password' => $password,
                      ':full_name' => $full_name,
                      ':phone' => $phone,
                      ':email' => $email,
                      ':status' => $status);
  $pdo->execute($insertdata);

  $_SESSION['notice'] = 'Your user account has been registered';
  header("location: ?page=login");
} catch (PDOexception $e) {
  $_SESSION['notice'] = "Errors : " . $e->getMessage();
  header("location: ?page=register");
}

?>
