<?php
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'edit_product') {

    $items = items_by_id($_GET['id']);
  }

// ACTION
} elseif (isset($_POST['submit'])) {
  if ($_POST['submit'] == 'add_product')     { add_product(); }
  if ($_POST['submit'] == 'edit_product')    { edit_product(); }
  if ($_POST['submit'] == 'delete_product')  { delete_product(); }
} else {
  echo "No direct access allowed";
  die();
}
?>

<?php 
function add_product() {
  include "Connection.php";

  $name        = $_POST['name'];
  $description = $_POST['description'];
  $price       = $_POST['price'];
  $stock       = $_POST['stock'];

  $name_image  = $_FILES['image']['name'];
  $loc_image   = $_FILES['image']['tmp_name'];
  $type_image  = $_FILES['image']['type'];

  $link        = explode('.',$name_image);
  $extension   = strtolower(end($link));

  move_uploaded_file($loc_image,"image/items/$name_image");

  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('INSERT INTO items (name, description, image_url, price, stock)
           values (:name, :description, :image_url, :price, :stock)');

    $data = array(':name' => $name,
                        ':description' => $description,
                        'image_url' => "image/items/$name_image",
                        ':price' => $price,
                        ':stock' => $stock);
    $sql->execute($data);

    $_SESSION['notice'] = 'An items has been added';
    header("location: ?page=dashboard");
  } catch (PDOexception $e) {
    $_SESSION['notice'] = "Errors : " . $e->getMessage();
    header("location: ?page=add_product");
  }
}

function edit_product() {
  include "Connection.php";

  $name        = $_POST['name'];
  $description = $_POST['description'];
  $price       = $_POST['price'];
  $stock       = $_POST['stock'];
  $id          = $_POST['id'];

  try {
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('UPDATE items SET name = :name,
                                            description = :description,
                                            price = :price,
                                            stock = :stock
                                        WHERE id = :id');

    $data = array(':name' => $name,
                  ':description' => $description,
                  ':price' => $price,
                  ':stock' => $stock,
                  ':id' => $id);
    $sql->execute($data);

    $_SESSION['notice'] = "Update data successfull";
    header("location: ?page=dashboard");
    
  } catch (PDOexception $e) {
    $_SESSION['notice'] = "Update data failed : " . $e->getMessage();
    header("location: ?page=dashboard");
  }
}

function delete_product() {
  include "Connection.php";

  if (isset($_GET['id'])) {
    $items_id = $_GET['id'];

    try {
      $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = $conn->prepare("DELETE FROM items WHERE id = :items_id");
      $data = array(':items_id' => $items_id);
      $sql->execute($data);

      $_SESSION['notice'] = 'Delete item successfull.';
      header("location: ?page=dashboard");

    } catch (PDOexception $e) {
      $_SESSION['notice'] = "Delete failed : " . $e->getMessage();
      header("location: ?page=dashboard");
    }
  } else {
    $_SESSION['notice'] = "Delete failed : no ID";
    header("location: ?page=dashboard");
  }
}
?>
