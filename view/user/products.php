<?php include "model/item_list.php"; ?>

<br>
<div class="w3-row" style="margin-left: 10%; margin-right: 5%;">
  <div class="w3-col s11">
    <div style="background-color: #1a1a1a; color: white; padding: 1px; text-align: center;">
      <h3>Products</h3>
      <b>We give you the best deals in Indonesia</b>
    </div>
  </div>

  <div class="w3-col s2">
    <p></p>
  </div>
</div>

<div class="w3-row" style="margin-left: 10%;">
  <?php foreach ($items as $item) { ?>
    <form action="?page=action_add_item_to_cart" method="post">
      <div class="w3-col s2" style="padding: 10px; margin: 5px; border: 1px solid black; border-radius: 5px;">
        <img src="<?php echo $item['image_url'] ?>" style="width: 100%; height: 200px; border: 1px solid black; border-radius: 20px;">
        <p style="text-align: center;">
          <b><?php echo $item['name']; ?></b><hr>
          <b>Rp.<?php echo $item['price']; ?>,00.-</b><hr>
          <b>Stock : <?php echo $item['stock']; ?></b><hr>
          <input type="hidden" name="items_id" value="<?php echo $item['id']; ?>">
          <input type="number" name="quantity" placeholder="Quantity" class="w3-input" required>
        </p>
        <button type="submit" name="submit" value="add_to_cart" class="button-1 button-block">Add to cart</button>
      </div>
    </form>
  <?php } ?>
</div>
