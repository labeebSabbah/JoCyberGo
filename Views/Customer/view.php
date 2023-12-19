<div class="card mb-6">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-ballot"></i></span>
      Customer View
    </p>
  </header>
  <div class="card-content">
    <form method="POST" action="/customer/update" enctype="multipart/form-data">

      <input type="hidden" name="id" value="<?php echo $customer['id'] ?>">


      <div>
        <label class="label"><i class="mdi mdi-package-variant-closed"></i> Customer Name</label>
        <div class="control">
          <div class="control expanded">
            <input class="input" type="text" value="<?php echo $customer['name'] ?> " name="name">
          </div>
        </div>
      </div>
      <br>
      <div>
        <label class="label"><i class="mdi mdi-email-outline"></i> Email </label>
        <div class="control">
          <div class="control expanded">
            <input class="input" type="text" value="<?php echo $customer['email'] ?>" name="email" >
          </div>
        </div>
      </div>
      <br>
      <hr>
      <div class="field grouped">
      <div class="control">
          <button id="back" type="button" class="button bg-gray-500" onclick="window.location = '/customers'">
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