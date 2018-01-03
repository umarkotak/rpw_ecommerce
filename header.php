<div class="w3-bar w3-green">
  <?php if (isset($_SESSION['username'])): ?>
    <form method="post" action="?action=logout">
    <button type="submit" name="submit" value="logout" class="w3-bar-item w3-button w3-right">Logout</button>
    </form>
    <a href="" class="w3-bar-item w3-button w3-right"><?php echo "Hello, ".$_SESSION['auth']." ".$_SESSION['username']; ?></a>
  <?php else: ?>
    <a href="?page=signup" class="w3-bar-item w3-button w3-right">Sign Up</a>
    <a href="?page=login" class="w3-bar-item w3-button w3-right">Login</a>
  <?php endif ?>
</div>

<div class="w3-sidebar w3-khaki w3-bar-block" style="width:200px; position: fixed; top: 0;">
  <a href="?page=home" class="w3-bar-item w3-button w3-teal" style="width: 200px;">Kantin Online Umar</a>
  <img src="image/logo.png" style="width: 200px;">
  <a href="?page=home" class="w3-bar-item w3-button w3-amber">Home</a>
  <!-- ADMIN -->
  <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] == 'admin'): ?>
  <a href="?page=dashboard" class="w3-bar-item w3-button">Dashboard</a>
  <a href="?page=add_product" class="w3-bar-item w3-button">Add Product</a>

  <!-- USER -->
  <?php elseif (isset($_SESSION['auth']) && $_SESSION['auth'] == 'user'): ?>
  <a href="?page=order_food" class="w3-bar-item w3-button">Order Food</a>
  <a href="?page=my_cart" class="w3-bar-item w3-button">
    My Cart <label class="w3-right w3-tag w3-red w3-round"><?php echo carts_notification_item($_SESSION['user_id']); ?></label>
  </a>
  <a href="?page=order_history" class="w3-bar-item w3-button">Order History</a>
  <?php endif ?>

  <a href="?page=help" class="w3-bar-item w3-button">Help</a>
</div>