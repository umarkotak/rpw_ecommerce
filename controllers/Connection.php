<?php
try {
  $host     = 'localhost';
  $dbname   = 'rpw_ecommerce';
  $user     = 'root';
  $password = '';

  $conn = new PDO("mysql:host=$host;dbname=$dbname","$user","$password");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  
  $_SESSION['notice'] = "There is some trouble in your connection" . $e->getMessage();
  die();
}
?>
