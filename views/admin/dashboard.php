<?php include "controllers/Admins.php"; ?>

<div class="w3-container w3-brown">
  <h2>Dashboard</h2>
</div>

<div class="w3-container">
  <div class="w3-row w3-col s12 w3-container">
    <p class="w3-light-gray">Admin / Dashboard</p>
  </div>

  <div class="w3-row">
    <div class="w3-col s12">
      <div class="w3-container">
        <table class="w3-table-all w3-small">
          <tr class="w3-light-blue">
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
              <td><img src="<?php echo $item['image_url']; ?>" style="width: 100px; height: 100px;" class="w3-round"></td>
              <td><?php echo $item['name']; ?></td>
              <td><?php echo $item['description']; ?></td>
              <td>Rp.<?php echo $item['price']; ?>,00.-</td>
              <td align="center"><?php echo $item['stock']; ?></td>
              <td>
                <a href="?page=edit_product&id=<?php echo $item['id']; ?>" class="w3-button w3-white w3-border w3-border-blue w3-round-large">Edit</a>
              </td>
              <td>
                <form method="post" action="?action=delete_product&id=<?php echo $item['id']; ?>">
                  <button type="submit" name="submit" value="delete_product" class="w3-button w3-white w3-border w3-border-red w3-round-large" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>