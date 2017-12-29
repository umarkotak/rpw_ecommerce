<?php $notification_item = 0; ?>
<?php if (isset($_SESSION['user_id'])) { ?>
<?php include "model/my_cart.php"; ?>
<?php } ?>

<nav id="navbar" class="navbar w3-row">
  <div class="w3-col s12">
    <ul>
      <li><a href="?page=home">Home</a></li>

      <?php if (isset($_SESSION['auth'])): ?>
        <!-- Users menu -->
        <?php if ($_SESSION['auth'] == 'user'): ?>
          <li><a href="?page=products">Products</a></li>
          <li><a href="?page=carts">Shopping Carts <span class="cart-number"><?php echo $notification_item; ?></span></a></li>
          <li><a href="?page=order_history">Order History</a></li>
        <?php endif ?>

        <!-- Admin menu -->
        <?php if ($_SESSION['auth'] == 'admin'): ?>
          <li><a href="?page=dashboard">Dashboard</a></li>
          <li><a href="?page=add_items">Add Items</a></li>
        <?php endif ?>

      <?php endif ?>

      <li><a href="?page=help">Help</a></li>

      <?php if (isset($_SESSION['username'])): ?>
        <li style="float: right;"><a href="?page=action_logout">Logout</a></li>
        <li style="float: right;"><a href=""><b>Hello, </b><?php echo $_SESSION['auth'] . ' ' . $_SESSION['username']; ?></a></li>
      <?php else: ?>
        <li style="float: right;"><a href="?page=signup">Sign Up</a></li>
        <li style="float: right;"><a href="?page=login">Login</a></li>
      <?php endif ?>
    </ul>
  </div>
</nav>