<?php
if (isset($_POST['submit'])) {
  if ($_POST['submit'] == 'login')  { login(); }
  if ($_POST['submit'] == 'logout') { logout(); }
} else {
  echo "No direct access allowed";
  die();
}
?>

<?php 
function login() {
  include "Connection.php";

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = $conn->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
  $data = array(':username' => $username,
                ':password' => $password);
  $sql->execute($data);

  $count = $sql->rowcount();
  $user = $sql->fetch(PDO::FETCH_OBJ);

  if ($count==0) {
    $_SESSION['notice'] = "Wrong username or password";
    header("location: ?page=login");
    
  } else {
    $_SESSION['notice'] = "Login success";
    $_SESSION['username'] = $user->username;
    $_SESSION['user_id'] = $user->id;
    $_SESSION['auth'] = $user->status;

    header("location: ?page=home");
  }
}

function logout() {
  session_unset();
  $_SESSION['notice'] = 'Logout success';
  header("location: ?page=home");
}
?>