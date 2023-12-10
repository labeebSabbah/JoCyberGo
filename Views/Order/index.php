<?php
if (!isset($_SESSION['user'])){
    header('location:/');
}
$orders = [
  [
    "customer_id" => "1",
    "total_price" => "200",
    "created_at" => "2020-12-31"
  ],
  [
    "customer_id" => "2",
    "total_price" => "250",
    "created_at" => "2020-12-31"
  ],
];
?>
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Orders</li>
    </ul>
  </div>
</section>

<!-- <section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Orders Table
    </h1>
    <button class="button light">Button</button>
  </div>
</section> -->

  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Orders
        </p>
        <a href="/orders" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
      <table>
        <?php if($orders): ?>
          <thead>
          <tr>
            <!-- <th class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </th> -->
            <th>#</th>
            <th>Date </th>
            <th>Customer Name </th>
            <th>Price </th>
            <th>View</th>
            
          </tr>
          </thead>
          <tbody>
            <?php foreach($orders as $order): ?>
          <tr>
            <!-- <td class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </td> -->
            <td data-label="Customer Name"><?php echo $order["customer_id"]; ?></td>
            <td data-label="Customer Name"><?php echo $order["customer_id"]; ?></td>
            <td data-label="Toatal Price"><?php echo $order["total_price"]; ?>$</td>
            <td data-label="Created at"><?php echo $order["created_at"]; ?></td>
            <td class="actions-cell">
              <div class="buttons center nowrap">
              <form  action="/order/view" method="POST">
                <button title="View" class="button small blue --jb-modal" id="view" type="submit" name="id" value="<?php echo $order["order_id"]; ?>">
                     <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button>
              </form>
                <!-- <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button> -->
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
        <!-- <div class="table-pagination">
          <div class="flex items-center justify-between">
            <div class="buttons">
              <button type="button" class="button active">1</button>
              <button type="button" class="button">2</button>
              <button type="button" class="button">3</button>
            </div>
            <small>Page 1 of 3</small>
          </div>
        </div> -->
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
