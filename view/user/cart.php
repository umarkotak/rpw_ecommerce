<?php include "model/my_cart.php" ?>
<?php include "model/item_list.php" ?>

<br>
<div class="w3-row">
  <div class="w3-col s2">
    <p></p>
  </div>

  <div class="w3-col s8">
    <form method="post" action="?page=action_checkout_order">
      <div style="background-color: #1a1a1a; color: white; padding: 1px; text-align: center;">
        <h3>Shoping Carts</h3>
        <b>This is all items you ordered</b>
      </div>

      <table border="1">
        <tr style="height: 35px;">
          <th width="5%">Items Id</th>
          <th>Thumbnail</th>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr>
        <?php $total_price = 0; ?>
        <?php foreach ($cart_items as $cart_item) { ?>
          <tr>
            <?php $item_info = get_item($cart_item['items_id']); ?>
            <?php $total_price += $cart_item['total']; ?>

            <td align="center"><?php echo $cart_item['items_id']; ?></td>
            <td width="10%"><img src="<?php echo $item_info->image_url; ?>" style="width: 100px"></td>
            <td><?php echo $item_info->name; ?></td>
            <td align="center" width="5%"><span class="label-orange"><?php echo $cart_item['status']; ?></span></td>
            <td align="center" width="5%"><a href="">Delete</a></td>
            <td align="center" width="10%">Rp.<?php echo $item_info->price; ?>,00.-</td>
            <td align="center" width="5%"><?php echo $cart_item['quantity']; ?></td>
            <td align="center" width="15%">Rp.<?php echo $cart_item['total']; ?>,00.-</td>
          </tr>
        <?php } ?>
        <tr style="height: 35px;">
          <td colspan="6"></td>
          <td align="center"><b>Total Payment</b></td>
          <td align="center">Rp.<?php echo $total_price; ?>,00.-</td>
        </tr>
      </table>

      <br>
      <div style="float: right;">
        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
        <button name="submit" value="checkout_cart" class="button-1">Checkout Order</button>
      </div>
    </form>
  </div>

  <div class="w3-col s2">
    <p></p>
  </div>
</div>
