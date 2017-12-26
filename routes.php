<?php 
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'home')                 { include "view/home.php"; }
} else {
  include "view/home.php";
}
?>