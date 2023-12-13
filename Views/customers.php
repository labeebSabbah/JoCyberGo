<?php
if (!isset($_SESSION['user'])){
    header('location:/');
}
?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Customers</li>
    </ul>
    <!-- <a href="https://github.com/justboil/admin-one-tailwind" target="_blank" class="button blue">
      <span class="icon"><i class="mdi mdi-github-circle"></i></span>
      <span>GitHub</span>
    </a> -->
  </div>
</section>

<!-- <section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Customers Table
    </h1>
    <button class="button light">Button</button>
  </div>
</section> -->

  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Customers
        </p>
        <a href="customers" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table>
        <?php if($customers): ?>
          <thead>
          <tr>
            <!-- <th class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </th> -->
            <!-- <th class="image-cell"></th> -->
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            
          </tr>
          </thead>
          <tbody>
            <?php foreach($customers as $customer): ?>
          <tr>
            <!-- <td class="checkbox-cell">
              <label class="checkbox">
                <input type="checkbox">
                <span class="check"></span>
              </label>
            </td> -->
            <!-- <td class="image-cell"> -->
              <!-- <div class="image"> -->
                <!-- <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full"> -->
              <!-- </div> -->
            <!-- </td> -->
            <td data-label="id"><?php echo $customer["id"]; ?></td>
            <td data-label="Name"><?php echo $customer["name"]; ?></td>
            <td data-label="Email"><?php echo $customer["email"]; ?></td>
            <!-- <td class="actions-cell">
              <div class="buttons right nowrap">
                <button class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                  <span class="icon"><i class="mdi mdi-eye"></i></span>
                </button>
                <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
              </div>
            </td> -->
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