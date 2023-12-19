<?php
if (!isset($_SESSION['user'])){
    header('location:/');
}
?>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Employees</li>
    </ul>
  
  </div>
</section>


  <div class="flex justify-end pr-6">  
    <a class="button blue" href="/employee/create">Add</a>
  </div>
<!-- </section> -->
  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-group"></i></span>
          Employees
        </p>
        <a href="" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table>
        <?php if($employees->num_rows != 0): ?>
          <thead>
          <tr>
            
            <th>#</th>
            <th><i class="mdi mdi-account"></i>Name</th>
            <th><i class="mdi mdi-email-outline"></i>Email</th>
            
          </tr>
          </thead>
          <tbody>
            <?php foreach($employees as $employee): ?>
          <tr>
            
            <td data-label="id"><?php echo $employee["id"]; ?></td>
            <td data-label="Name"><?php echo $employee["name"]; ?></td>
            <td data-label="Email"><?php echo $employee["email"]; ?></td>
            <td class="actions-cell">
              <div class="buttons right nowrap">
                <form  action="/employee" method="POST">

                  <button title="View" class="button small blue --jb-modal" id="view" type="submit" name="id" value="<?php echo $employee['id'] ?>">
                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                  </button>
                </form>
                <form action="/employee/delete" method="POST">

                  <button title="Delete" class="button small red --jb-modal" id="delete" type="submit" name="id" value="<?php echo $employee['id'] ?>">
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