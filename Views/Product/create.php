<?php

if (!isset($_SESSION['user'])) {
  header('location:/');
}

?>
<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      Add Product
    </p>
  </header>
  <div class="card-content">
    <form method="POST" action="/product/store" enctype="multipart/form-data">

      <div>
        <label class="label"><i class="mdi mdi-package-variant-closed"></i> Product Name</label>
        <div class="control">
          <div class="control expanded">
            <input class="input" type="text" name="name">
          </div>
        </div>
      </div>
      <br>
      <div>
        <label class="label"><i class="mdi mdi-cash"></i> Price </label>
        <div class="control">
          <div class="control expanded">
            <input class="input" type="number" name="price" step="any">
          </div>
        </div>
      </div>
      <br>
      <div>
        <label class="label"><i class="mdi mdi-image"></i> Image </label>
        <div class="control">
          <div class="control expanded">
            <input class="input" type="file" name="img" accept="image/*">
          </div>
        </div>
      </div>
      <!-- <div hidden>
        <label class="label"><i class="mdi mdi-cash"></i> quantity </label>
        <div class="control">
          <div class="control expanded">
            <input class="input" type="number" name="quantity" step="any">
          </div>
        </div>
      </div> -->
      <br>
      <hr>
      <div class="field grouped">
      <div class="control">
          <button id="back" type="button" class="button bg-gray-500" onclick="window.location = '/products'">
            Back
          </button>
        </div>
        <div class="control">
          <button type="submit" class="button green">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        © 2023, JoCyberGo Team
      </div>
    </div>


  </div>
</footer>