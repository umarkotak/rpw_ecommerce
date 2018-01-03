<?php if (isset($_SESSION['notice'])): ?>
  <div class="w3-container w3-blue w3-center" style="margin-left: 200px;">
    <b>Notice : </b><?php echo $_SESSION['notice']; ?>
    <?php unset($_SESSION['notice']); ?>
  </div>
<?php endif ?>