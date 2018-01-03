<?php include "controllers/Products.php"; ?>

<div class="w3-container w3-brown">
  <h2>Edit Product</h2>
</div>

<div class="w3-container">
  <div class="w3-row w3-col s12 w3-container">
    <p class="w3-light-gray">Admin / Edit Product / <?php echo $items->name; ?></p>
  </div>
  
  <div class="w3-row">
    <form method="post" action="?action=edit_product">
      <div class="w3-col s6">
        <div class="w3-container">
          <label><b>Product Name</b></label>
          <input class="w3-input w3-border w3-round" type="text" name="name" value="<?php echo $items->name; ?>" required>
           
          <br>
          <label><b>Description</b></label>
          <textarea class="w3-input w3-border w3-round" name="description" rows="5" required><?php echo $items->description; ?></textarea>

          <br>
          <label><b>Price</b></label>
          <input class="w3-input w3-border w3-round" type="number" name="price" value="<?php echo $items->price; ?>" required>

          <br>
          <label><b>Stock</b></label>
          <input class="w3-input w3-border w3-round" type="number" name="stock" value="<?php echo $items->stock; ?>" required>
        </div>
      </div>

      <div class="w3-col s6">
        <br>
        <input class="w3-check" type="checkbox" required>
        <label>I already check the file</label>

        <br><br>
        <input type="hidden" name="id" value="<?php echo $items->id ?>">
        <button class="w3-btn w3-blue w3-round w3-block" type="submit" name="submit" value="edit_product">Edit Product</button>
      </div>
    </form>
  </div>
</div>
