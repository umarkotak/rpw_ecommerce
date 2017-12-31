<?php include "model/order_history.php"; ?>
<?php include "model/my_cart.php"; ?>
<?php include "model/item_list.php" ?>

<br>
<div class="w3-row">
  <div class="w3-col s2">
    <p></p>
  </div>

  <div class="w3-col s8">
    <div style="background-color: #1a1a1a; color: white; padding: 1px; text-align: center;">
      <h3>Order History</h3>
      <b>The list of all items you ordered</b>
    </div>

    <?php foreach ($order_histories as $order_history) { ?>
      <br>
      <div>
        <div style="padding: 5px; background-color: powderblue;">
          <b>Order Id : </b><?php echo $order_history['id']; ?><br>
          <b>Date Created : </b><?php echo $order_history['date_created']; ?>
          <span style="float: right;">
            <b>Total Payment : </b><?php echo $order_history['total_price']; ?>
          </span>
          <input type="hidden" name="umar">
        </div>

        <?php $order_details = get_order_details($order_history['id']) ?>
        <table border="1" width="100%">
          <tr>
            <th width="5%">Items Id</th>
            <th>Thumbnail</th>
            <th>Name</th>
            <th>Status</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
          </tr>

          <?php foreach ($order_details as $order_detail) { ?>
            <?php $item_info = get_item($order_detail['items_id']); ?>
            <tr>
              <td align="center"><?php echo $order_detail['items_id']; ?></td>
              <td width="10%"><img src="<?php echo $item_info->image_url; ?>" style="width: 100px"></td>
              <td><?php echo $item_info->name; ?></td>
              <td align="center" width="5%"><span class="label-green"><?php echo $order_detail['status']; ?></span></td>
              <td align="center" width="10%">Rp.<?php echo $item_info->price; ?>,00.-</td>
              <td align="center" width="5%"><?php echo $order_detail['quantity']; ?></td>
              <td align="center" width="15%">Rp.<?php echo $order_detail['total']; ?>,00.-</td>
            </tr>
          <?php } ?>
        </table>
      </div>
    <?php } ?>
  </div>

  <div class="w3-col s2">
    <input type="hidden" name="umar">
    <p></p>
  </div>
</div>
