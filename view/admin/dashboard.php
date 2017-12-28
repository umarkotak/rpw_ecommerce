<?php include "model/item_list.php"; ?>

<br>
<div class="w3-row">
  <div class="w3-col s2">
    <p></p>
  </div>

  <div class="w3-col s8">
    <div style="background-color: #1a1a1a; color: white; padding: 1px; text-align: center;">
      <h3>Dashboard</h3>
      <b>List of all items you have in store</b>
    </div>

    <table border="1">
      <tr style="height: 35px;">
        <th width="5%">ID</th>
        <th>Thumbnail</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th colspan="2">Action</th>
      </tr>
      <?php foreach ($items as $item) { ?>
        <tr>
          <td align="center"><?php echo $item['id']; ?></td>
          <td><img src="<?php echo $item['image_url']; ?>" style="width: 100px"></td>
          <td><?php echo $item['name']; ?></td>
          <td><?php echo $item['description']; ?></td>
          <td>Rp.<?php echo $item['price']; ?>,00.-</td>
          <td align="center"><?php echo $item['stock']; ?></td>
          <td><a href="">Edit</a></td>
          <td><a href="">Delete</a></td>
        </tr>
      <?php } ?>
    </table>
  </div>

  <div class="w3-col s2">
    <p></p>
  </div>
</div>


