<?php
if (!isset($_SESSION['user'])){
    header('location:/');
}
?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Perchase Order List</li>
    </ul>

  </div>
</section>
<div class="flex justify-end pr-6">  
    <a class="button blue" href="/purchaseOrder/create">Add</a>
  </div>



  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Perchase Order List
        </p>
        <a href="" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>


      
      <div class="card-content">
        <table>
        <?php if($orders->num_rows != 0): ?>
          <thead>
          <tr>
            
            <th>#</th>
            <th><i class="mdi mdi-calendar-range"></i>Date</th>
            <th>Supplier #</th>
            <th><i class="mdi mdi-account"></i>Supplier Name</th>
            <th>Product #</th>
            <th><i class="mdi mdi-package-variant-closed"></i>Product Name</th>
            <th><i class="mdi mdi-numeric"></i>Quantity</th>

            
          </tr>
          </thead>
          <tbody>
            <?php foreach($orders as $order): ?>
          <tr>
            
            <td data-label="id"><?php echo $order["order_id"]; ?></td>
            <td data-label="Name"><?php echo $order["order_date"]; ?></td>
            <td data-label="Email"><?php echo $order["supplier_id"]; ?></td>
            <td data-label="Email"><?php echo $order["supplier_name"]; ?></td>
            <td data-label="Email"><?php echo $order["product_id"]; ?></td>
            <td data-label="Email"><?php echo $order["product_name"]; ?></td>
            <td data-label="Email"><?php echo $order["quantity"]; ?></td>
            <td>
            <div class="buttons right nowrap">
                <form  action="/purchaseOrder/view" method="POST">
                <input hidden value="<?php echo  $order["product_id"]; ?>" name="product_id" >
                  <button title="View" class="button small blue --jb-modal" id="view" type="submit" name="id" value="<?php echo $order['order_id'] ?>">
                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                  </button>
                </form>
                
              </div>
            </td>
            
          </tr>
          <?php endforeach; ?>
          </tbody>
          <?php else: ?>
            <tr>
              <th colspan="5" style="text-align: center;">No data were retrieved.</th>
            </tr>
          <?php endif; ?>
        </table>
        
      </div>
    </div>
  </section>

  <footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        © 2023, JoCyberGo Team
      </div>
    </div>
    
    
  </div> 
</footer>