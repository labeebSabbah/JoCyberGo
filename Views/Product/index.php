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
      <li>Products</li>
    </ul>
  </div>
</section>

<!-- <section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Products Table
    </h1>
    <button class="button light">Button</button>
  </div>
</section> -->

  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Products
        </p>
        <a href="/products" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
      <table>
        <?php if($products): ?>
          <thead>
          <tr>
            <!-- <th class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </th> -->
            <th>#</th>

            <th>Name</th>
            <th>Price</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            <?php foreach($products as $product): ?>
          <tr>
            <!-- <td class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </td> -->
            <td data-label="id"><?php echo $product["id"]; ?></td>

            <td data-label="Name"><?php echo $product["name"]; ?></td>
            <td data-label="Price"><?php echo $product["price"]; ?>$</td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
                <form  action="/product" method="POST">

                  <button title="View" class="button small blue --jb-modal" id="view" type="submit" name="id" value="<?php echo $product['id'] ?>">
                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                  </button>
                </form>
                <form action="/product/delete" method="POST">

                  <button title="Delete" class="button small red --jb-modal" id="delete" type="submit" name="id" value="<?php echo $product['id'] ?>">
                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
          </tbody>
          <?php else: ?>
            <tr>
              <th colspan="4" style="text-align: center;">No data were retrieved.</th>
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
      <!-- <a href="https://github.com/justboil/admin-one-tailwind" style="height: 20px">
        <img src="https://img.shields.io/github/v/release/justboil/admin-one-tailwind?color=%23999">
      </a> -->
    </div>
    
    
  </div> 
</footer>



<script>











</script>