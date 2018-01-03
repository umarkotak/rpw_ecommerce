<?php include "controllers/Orders.php"; ?>

<div class="w3-container w3-brown">
  <h2>Order History</h2>
</div>

<div class="w3-container">
  <div class="w3-row w3-col s12 w3-container">
    <p class="w3-light-gray">User / Order History</p>
  </div>

  <div class="w3-row">

    <?php foreach ($order_histories as $order_history) { ?>
    <div class="w3-col s12">
      <div class="w3-container">
        <div class="w3-container w3-light-blue">
          <h4>Order ID : <?php echo $order_history['id']; ?> / <?php echo $order_history['date_created']; ?> <span class="w3-right">Total Payment : Rp.<?php echo $order_history['total_price']; ?></span></h4>
        </div>

        <table class="w3-table-all w3-small">
          <tr>
            <th width="5%">No</th>
            <th width="7%">Items ID</th>
            <th width="5%">Thumbnail</th>
            <th width="25%">Name</th>
            <th width="5%">Status</th>
            <th width="5%">Price</th>
            <th width="5%">Quantity</th>
            <th width="5%">Total Price</th>
          </tr>

          <?php $no = 1; ?>
          <?php $order_details = carts_by_order_id($order_history['id']) ?>
          <?php foreach ($order_details as $order_detail) { ?>
            <?php $item = items_by_id($order_detail['items_id']); ?>
            <?php $total_price = $item->price * $order_detail['quantity']; ?>
            <tr>
              <td style="vertical-align: middle;"><?php echo $no; $no += 1; ?></td>
              <td style="vertical-align: middle;"><?php echo $item->id; ?></td>
              <td><img src="<?php echo $item->image_url; ?>" style="width: 50px; height: 50px;"></td>
              <td style="vertical-align: middle;"><?php echo $item->name; ?></td>
              <td style="vertical-align: middle;"><?php echo $order_detail['status'] ?></td>
              <td style="vertical-align: middle;"><?php echo $item->price; ?></td>
              <td style="vertical-align: middle;"><?php echo $order_detail['quantity']; ?></td>
              <td style="vertical-align: middle;"><?php echo $total_price; ?></td>
            </tr>
          <?php } ?>
        </table>

        <br>
      </div>
    </div>
    <?php } ?>

  </div>
</div>
