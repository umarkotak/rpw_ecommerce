<?php include "connection.php"; ?>

  <?php 
  $query = $conn->prepare("SELECT * FROM items ORDER BY id DESC");
  $query->execute();
  $items = $query->fetchAll();
  ?>
