<?php

use App\Models\Product;

if (!isset($_SESSION['user'])){
    header('location:/');
}

?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Stock Control</li>
    </ul>
  </div>
</section>


  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Stock Control
        </p>
        <a href="" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
      <table>
        <?php if($products): ?>
          <thead>
          <tr>
        
            <th>#</th>

            <th>Product Name</th>
            <th>Quantity</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach($products as $product): ?>
          <tr>
          
            <td data-label="id"><?php echo $product["id"]; ?></td>
            <td data-label="Name"><?php echo $product["name"]; ?></td>
            <td data-label="Quantity"><?php echo $product["stock_quantity"] ?></td>
          </tr>
          <?php endforeach; ?>
          </tbody>
          <?php else: ?>
            <tr>
              <th colspan="4" style="text-align: center;">No data were retrieved.</th>
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