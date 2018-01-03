<?php include "controllers/Users.php"; ?>

<div class="w3-container w3-brown">
  <h2>Order Food</h2>
</div>

<div class="w3-container">
  <div class="w3-row w3-col s12 w3-container">
    <p class="w3-light-gray">User / Order Food</p>
  </div>

  <div class="w3-row">

    <?php foreach($items as $item) { ?>
    <form method="post" action="?action=add_to_cart" enctype="multipart/form-data">
      <div class="w3-col l6">
        <div class="w3-container">
          <div class="w3-container w3-light-blue w3-round">
            <h4><?php echo $item['name']; ?> <span class="w3-right">Price : Rp. <?php echo $item['price']; ?></span></h4>
          </div>
          <div class="w3-row w3-pale-blue w3-round">
            <div class="w3-col l3 w3-container">
              <img src="<?php echo $item['image_url'] ?>" style="width: 100%; height: 125px" class="w3-round">
            </div>
            <div class="w3-col l5 w3-container">
              <p class="w3-tiny"><?php echo $item['description']; ?></p>
            </div>
            <div class="w3-col l4 w3-container">
              <p>Stock : <?php echo $item['stock']; ?></p>
              <input class="w3-input w3-border w3-border-blue w3-round w3-small" type="number" name="quantity" placeholder="quantity" required>
              <input type="hidden" name="item_id" value="<?php echo $item['id'] ?>">
              <button type="submit" name="submit" value="add_to_cart" class="w3-button w3-small w3-round w3-green w3-block">Add To Cart</button>
            </div>
          </div>
          <br>

        </div>
      </div>
    </form>
    <?php } ?>

  </div>
</div>
