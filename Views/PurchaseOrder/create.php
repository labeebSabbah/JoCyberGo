<?php

if (!isset($_SESSION['user'])) {
  header('location:/');
}

?>
<style>
  .delete-button {
    cursor: pointer;
    color: red;
    font-size: 1.2rem;
  }
</style>
<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      New Purches Order
    </p>
  </header>
  <div class="card-content">
    <form id="addForm" method="POST" action="/purchaseOrder/store">
      <!-- <input id="hidden" type="hidden" name="products" value=""> -->
      



      <div>
        <label class="label"><i class="mdi mdi-account-multiple"></i> Supplier Name</label>
        <div class="control">
          <div class="select">
            <select name="supplier" required>
              <option value="" selected >Choose the Supplier...</option>
              <?php foreach ($suppliers as $supplier) : ?>
                <option value="<?php echo $supplier['id'] ?>"><?php echo $supplier['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
<br>
     <div>

        <label class="label"><i class="mdi mdi-package-variant-closed"></i> Product</label>
        <div class="control">
            <div class="select">
                <select name="product" required>
                    <option value="" selected >Choose the Product...</option>
                    <?php foreach ($products as $product) : ?>
                     <option value="<?php echo $product['id'] ?>"><?php echo $product['name'] ?></option>
                     <?php endforeach; ?>
                    </select>
                </div>
            </div>


        </div>
    
     

      <br>

     


      <div>
        <label class="label"><i class="mdi mdi-plus-circle-outline"></i> Quantity </label>
        <div class="control">
          <div class="control expanded">
            <input id="quantity" name="quantity" class="input" type="number" value="0" >
          </div>
        </div>
      </div>


      <br>
      <hr>
      

      <div class="field grouped">
      <div class="control">
          <button id="back" type="button" class="button bg-gray-500" onclick="window.location = '/purchaseOrders'">
            Back
          </button>
        </div>
        <div class="control">
          <button id="submit" type="submit" class="button green">
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