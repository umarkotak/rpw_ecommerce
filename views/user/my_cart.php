<?php include "controllers/Carts.php" ?>

<div class="w3-container w3-brown">
  <h2>My Cart</h2>
</div>

<div class="w3-container">
  <div class="w3-row w3-col s12 w3-container">
    <p class="w3-light-gray">User / My Cart</p>
  </div>

  <div class="w3-row">
    <div class="w3-col s12">
      <div class="w3-container">
        <table class="w3-table-all w3-small">
          <tr class="w3-light-blue">
            <th width="7%">Items ID</th>
            <th width="5%">Thumbnail</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
            <th>Price</th>
            <th width="10%">Quantity</th>
            <th>Total Price</th>
          </tr>
          <?php $total_payment = 0; ?>
          <?php foreach ($cart_items as $cart_item) { ?>
            <?php $item = items_by_id($cart_item['items_id']); ?>
            <?php $total_price = $cart_item['quantity'] * $item->price; ?>
            <?php $total_payment += $total_price; ?>
            <tr>
              <td style="vertical-align: middle;"><?php echo $cart_item['items_id']; ?></td>
              <td><img src="<?php echo $item->image_url ?>" style="width: 50px; height: 50px;" class="w3-round"></td>
              <td style="vertical-align: middle;"><?php echo $item->name; ?></td>
              <td style="vertical-align: middle;"><?php echo $cart_item['status']; ?></td>
              <td style="vertical-align: middle;">
                <form method="post" action="?action=remove_from_cart">
                <input type="hidden" name="id" value="<?php echo $cart_item['id'] ?>">
                <input type="hidden" name="item_id" value="<?php echo $cart_item['items_id'] ?>">
                <input type="hidden" name="quantity" value="<?php echo $cart_item['quantity'] ?>">
                <button type="submit" name="submit" value="remove_from_cart" class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="return confirm('Are you sure?')">Remove</button>
                </form>
              </td>
              <td style="vertical-align: middle;">Rp.<?php echo $item->price; ?></td>
              <td style="vertical-align: middle;"><?php echo $cart_item['quantity']; ?></td>
              <td style="vertical-align: middle;">Rp.<?php echo $total_price; ?></td>
            </tr>
          <?php } ?>
          <tr>
            <th colspan="6"></th>
            <th>Total Payment</th>
            <th>Rp.<?php echo $total_payment; ?></th>
          </tr>
        </table>

        <br>
        <?php if ($total_payment > 0): ?>
        <form method="post" action="?action=checkout_order">
          <input type="hidden" name="total_payment" value="<?php echo $total_payment; ?>">
          <button type="submit" name="submit" value="checkout_order" class="w3-button w3-green w3-round w3-right">Checkout Order</button>
        </form>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>
