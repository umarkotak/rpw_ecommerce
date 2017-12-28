<?php
include 'connection.php';

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock = $_POST['stock'];

$name_image = $_FILES['image']['name'];
$loc_image  = $_FILES['image']['tmp_name'];
$type_image = $_FILES['image']['type'];

$link        = explode('.',$name_image);
$extension   = strtolower(end($link));

move_uploaded_file($loc_image,"image/items/$name_image");

try {
  $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $pdo = $conn->prepare('INSERT INTO items (name, description, image_url, price, stock)
         values (:name, :description, :image_url, :price, :stock)');

  $insertdata = array(':name' => $name,
                      ':description' => $description,
                      'image_url' => "image/items/$name_image",
                      ':price' => $price,
                      ':stock' => $stock);
  $pdo->execute($insertdata);

  $_SESSION['notice'] = 'An items has been added';
  header("location: ?page=dashboard");
} catch (PDOexception $e) {
  $_SESSION['notice'] = "Errors : " . $e->getMessage() . "<br/>";
  header("location: ?page=add_items");
}

?>
