<?php 
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'home')                          { include "view/home.php"; }
  if ($_GET['page'] == 'login')                         { include "view/login.php"; }
  if ($_GET['page'] == 'signup')                        { include "view/signup.php"; }

  if ($_GET['page'] == 'products')                      { include "view/user/products.php"; }
  if ($_GET['page'] == 'carts')                         { include "view/user/cart.php"; }

  if ($_GET['page'] == 'dashboard')                     { include "view/admin/dashboard.php"; }
  if ($_GET['page'] == 'add_items')                     { include "view/admin/add_items.php"; }

  if ($_GET['page'] == 'action_login')                  { include "model/login.php"; }
  if ($_GET['page'] == 'action_logout')                 { include "model/logout.php"; }
  if ($_GET['page'] == 'action_signup')                 { include "model/register.php"; }
  if ($_GET['page'] == 'action_add_items')              { include "model/add_items.php"; }
  if ($_GET['page'] == 'action_add_item_to_cart')       { include "model/add_item_to_cart.php"; }
} else {
  include "view/home.php";
}
?>