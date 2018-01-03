<?php 
if (isset($_GET['page'])) {
// WEB ROUTING HERE
  if ($_GET['page'] == 'home')                           { include "views/home.php"; }
  if ($_GET['page'] == 'help')                           { include "views/help.php"; }
  if ($_GET['page'] == 'login')                          { include "views/login.php"; }
  if ($_GET['page'] == 'signup')                         { include "views/signup.php"; }

  if ($_GET['page'] == 'dashboard')                      { include "views/admin/dashboard.php"; }
  if ($_GET['page'] == 'add_product')                    { include "views/admin/add_product.php"; }
  if ($_GET['page'] == 'edit_product')                   { include "views/admin/edit_product.php"; }

  if ($_GET['page'] == 'my_cart')                        { include "views/user/my_cart.php"; }
  if ($_GET['page'] == 'order_food')                     { include "views/user/order_food.php"; }
  if ($_GET['page'] == 'order_history')                  { include "views/user/order_history.php"; }

} elseif (isset($_GET['action'])) {
// WEB ACTION HERE
  if ($_GET['action'] == 'login')                        { include "controllers/Sessions.php"; }
  if ($_GET['action'] == 'logout')                       { include "controllers/Sessions.php"; }

  if ($_GET['action'] == 'signup')                       { include "controllers/Users.php"; }

  if ($_GET['action'] == 'checkout_order')               { include "controllers/Orders.php"; }

  if ($_GET['action'] == 'add_to_cart')                  { include "controllers/Carts.php"; }
  if ($_GET['action'] == 'remove_from_cart')             { include "controllers/Carts.php"; }

  if ($_GET['action'] == 'add_product')                  { include "controllers/Products.php"; }
  if ($_GET['action'] == 'edit_product')                 { include "controllers/Products.php"; }
  if ($_GET['action'] == 'delete_product')               { include "controllers/Products.php"; }

} else {
  include "views/home.php";
}
?>