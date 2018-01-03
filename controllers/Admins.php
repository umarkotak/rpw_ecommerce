<?php
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'dashboard') {
    $items = items_by_all();
  }

// ACTION
} elseif (isset($_POST['submit'])) {

} else {
  echo "No direct access allowed";
  die();
}
?>
