<?php
try {
  $conn = new PDO("mysql:host=localhost;dbname=rpw_ecommerce","root","");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  $_SESSION['notice'] = "There is a problem with your connection" . $e->getMessage();
  die();
}
 ?>
