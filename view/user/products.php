<?php include "model/item_list.php"; ?>

<br>
<div class="w3-row">
  <div class="w3-col s2">
    <p></p>
  </div>

  <div class="w3-col s8">
    <h3>Products</h3>
  </div>

  <div class="w3-col s2">
    <p></p>
  </div>
</div>

<div class="w3-row" style="margin-left: 10%;">
  <?php foreach ($items as $item) { ?>
    <div class="w3-col s2" style="padding: 10px; margin: 5px; border: 1px solid black;">
      <img src="<?php echo $item['image_url'] ?>" style="width: 100%; height: 200px; border: 1px solid black; border-radius: 20px;">
      <p style="text-align: center;"><b><?php echo $item['name']; ?></b></p>
    </div>
  <?php } ?>
</div>
