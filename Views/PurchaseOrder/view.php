<?php
//  var_dump($purchesOrderItems);
// var_dump($product["stock_quantity"]);



?>

<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      Purchase Order Quantity View
    </p>
  </header>
  <div class="card-content">
    <form method="POST" action="/purchaseOrder/update" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?php echo $purchesOrderItems['order_id'] ?>">
      <input type="hidden" name="stock_quantity" value="<?php echo $product['stock_quantity'] ?>">
      <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
      <input type="hidden" name="old_quantity" value="<?php echo $purchesOrderItems['quantity'] ?>">




      <div>
        <label class="label"><i class="mdi mdi-package-variant-closed"></i> Quantity </label>
        <div class="control">
          <div class="control expanded">
            <input class="input" type="number"  value="<?php echo $purchesOrderItems['quantity'] ?>" name="quantity">
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