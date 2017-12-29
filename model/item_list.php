<?php include "connection.php"; ?>

<?php 
$query = $conn->prepare("SELECT * FROM items ORDER BY id DESC");
$query->execute();
$items = $query->fetchAll();
?>

<?php
function get_item($id){
  include "connection.php";

  $query = $conn->prepare("SELECT * FROM items WHERE id = '$id'");
  $query->execute();
  $item_info = $query->fetch(PDO::FETCH_OBJ);
  return $item_info;
}
?>
