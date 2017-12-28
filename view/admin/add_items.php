<br>
<div class="w3-row">
  <div class="w3-col s4">
    <p></p>
  </div>

  <div class="w3-col s4" style="text-align: center; border: 1px solid black;  ">
    <form action="?page=action_add_items" method="post" enctype="multipart/form-data">
      <div style="background-color: #1a1a1a; color: white; padding: 1px;">
        <h4>Add New Items</h4>
      </div>
      <div>
        <input type="text" name="name" class="w3-input" placeholder="Name" required autofocus>
      </div>
      <div style="height: 100px;">
        <textarea name="description" class="w3-input" placeholder="Description" style="height: 100%;" required></textarea>
      </div>
      <div>
        <input type="number" name="price" class="w3-input" placeholder="Price" required>
      </div>
      <div>
        <input type="number" name="stock" class="w3-input" placeholder="Stock" required>
      </div>

      <br>
      <div style="text-align: left; padding: 3px 8px;">
        <b>Image</b><br>
        <input type="file" name="image" required>
      </div>
      <br>

      <div>
        <button type="submit" name="submit" value="login" class="button-1 button-block">Submit</button>
      </div>
    </form>
  </div>

  <div class="w3-col s4">
    <p></p>
  </div>
</div>
