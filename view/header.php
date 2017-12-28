<nav id="navbar" class="navbar w3-row">
  <div class="w3-col s12">
    <ul>
      <li><a href="?page=home">Home</a></li>

      <!-- Users menu -->
      <li><a href="?page=products">Products</a></li>
      <li><a href="?page=cart">Shopping Cart <span class="cart-number">0</span></a></li>

      <!-- Admin menu -->
      <li><a href="?page=dashboard">Dashboard</a></li>
      <li><a href="?page=add_items">Add Items</a></li>

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