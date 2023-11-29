<div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Product View
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="/product/update">

        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">

        <div>
            <label class="label"><i class="mdi mdi-package-variant-closed"></i> Product Name</label>
            <div class="control">
            <div class="control expanded">
                    <input  class="input" type="text" value="<?php echo $product['name'] ?> " name="name">
                    
                  </div>
            </div>
        </div>

            <br>

          


          

          <div>
            <label class="label"><i class="mdi mdi-cash"></i>  Price </label>
            <div class="control">
            <div class="control expanded">
                    <input  class="input" type="number" value="<?php echo $product['price'] ?>" name="price" step="any">
                  </div>
            </div>
          </div>


          <br>
          <hr>
       

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
            <div class="control">
                <a href="/products">

                    <button type="button" class="button red">
                        Back
                    </button>
                </a>
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