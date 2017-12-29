<?php include "model/order_history.php"; ?>

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
        <b>Order Id : </b><?php echo $order_history['id']; ?><br>
        <b>Date Created : </b><?php echo $order_history['date_created']; ?>
        <b>Total Price : </b><?php echo $order_history['total_price']; ?>

        <?php $order_details = get_order_details($order_history['id']) ?>
        <table border="1" width="100%">
          <tr>
            <th>Items ID</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>

          <?php foreach ($order_details as $order_detail) { ?>
            <tr>
              <td><?php echo $order_detail['items_id']; ?></td>
              <td><?php echo $order_detail['quantity']; ?></td>
              <td><?php echo $order_detail['total']; ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
    <?php } ?>
  </div>

  <div class="w3-col s2">
    <p></p>
  </div>
</div>
