<?php if (isset($_SESSION['notice'])): ?>
  <div class="w3-row">
    <div class="w3-col s12" style="text-align: center;">
      <b>Notice : </b><?php echo $_SESSION['notice']; ?>
      <?php unset($_SESSION['notice']); ?>
    </div>
  </div>
<?php endif ?>