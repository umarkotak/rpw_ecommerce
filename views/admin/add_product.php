<div class="w3-container w3-brown">
  <h2>Add Product</h2>
</div>

<div class="w3-container">
  <div class="w3-row w3-col s12 w3-container">
    <p class="w3-light-gray">Admin / Add Product</p>
  </div>
  
  <div class="w3-row">
    <form method="post" action="?action=add_product" enctype="multipart/form-data">
      <div class="w3-col s6">
        <div class="w3-container">
          <label><b>Product Name</b></label>
          <input class="w3-input w3-border w3-round" type="text" name="name" required autofocus>
           
          <br>
          <label><b>Description</b></label>
          <textarea class="w3-input w3-border w3-round" name="description" rows="5" required></textarea>

          <br>
          <label><b>Price</b></label>
          <input class="w3-input w3-border w3-round" type="number" name="price" required>

          <br>
          <label><b>Stock</b></label>
          <input class="w3-input w3-border w3-round" type="number" name="stock" required>
        </div>
      </div>

      <div class="w3-col s6">
        <label><b>Product Image</b></label>
        <input class="w3-input w3-border w3-round" type="file" name="image" required>

        <br>
        <input class="w3-check" type="checkbox" required>
        <label>I already check the file</label>

        <br><br>
        <button class="w3-btn w3-blue w3-round w3-block" type="submit" name="submit" value="add_product">Add Product</button>
      </div>
    </form>
  </div>
</div>
