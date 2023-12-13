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
      New Order
    </p>
  </header>
  <div class="card-content">
    <form id="addForm" method="POST" action="/order/store">
      <input id="hidden" type="hidden" name="products" value="">
      <!-- <div class="field">
             <label class="label">From</label> 
            <div class="field-body">
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="text" placeholder="Customer Name">
                  <span class="icon left"><i class="mdi mdi-account"></i></span>
                </div>
              </div> -->
      <!-- <div class="field">
                <div class="control icons-left icons-right">
                  <input class="input" type="email" placeholder="Email" value="alex@smith.com">
                  <span class="icon left"><i class="mdi mdi-mail"></i></span>
                  <span class="icon right"><i class="mdi mdi-check"></i></span>
                </div>
              </div> -->
      <!-- </div>
          </div>
          <div class="field">
            <div class="field-body">
              <div class="field">
                <div class="field addons">
                    <div class="card-header-icon">
                        <span class="icon"><i class="mdi mdi-package-variant-closed"></i></span>
                    </div>
                    <div class="control expanded">
                    <input class="input" type="tel" placeholder="Your phone number">
                  </div>
                </div>
                <p class="help">Do not enter the first zero</p>
              </div>
            </div>
          </div> -->
      <!-- <div class="field"> -->
      <!-- <span class="icon"><i class="mdi mdi-package-variant-closed"></i> -->
      <!-- </span> -->
      <!-- <i class="mdi mdi-package-variant-closed"> -->



      <div>
        <label class="label"><i class="mdi mdi-account-multiple"></i> Customer Name</label>
        <div class="control">
          <div class="select">
            <select name="customer">
              <option value="" selected>Choose the customer...</option>
              <?php foreach ($customers as $customer) : ?>
                <option value="<?php echo $customer['id'] ?>"><?php echo $customer['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>

      <br>

      <div>
        <label class="label"><i class="mdi mdi-package-variant-closed"></i> Products</label>
        <!-- <div class="control">
              <div class="select">
                <select>
                  <option value="" selected>Choose the product...</option>
                  <option>Business development</option>
                  <option>Marketing</option>
                  <option>Sales</option>
                </select>
              </div>
            </div> -->
        <!-- This is an example component -->
        <div class="w-full flex justify-center gap-5 flex-wrap">

          <?php foreach ($products as $product) : ?>

            <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-xs dark:bg-gray-800 dark:border-gray-700">
              <a href="#">
                <img class="rounded-t-lg" src="<?php echo $product['img'] ?>" alt="">
              </a>
              <div class="p-5">
                <a href="#">
                  <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white"><?php echo $product["name"] ?></h5>
                </a>
                <!-- <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> -->
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="addProduct(<?php echo $product['id'] ?>, '<?php echo $product['name'] ?>', <?php echo $product['price'] ?>)">
                  Add <i class="mdi mdi-plus"></i>
                  <!-- <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg> -->
                  </buton>
              </div>
            </div>

          <?php endforeach; ?>

        </div>
      </div>


      <br>

      <div>
        <label class="label"><i class="mdi mdi-format-list-bulleted"></i> Order Details </label>
        <div class="control">
          <div class="control expanded">
            <ol id="productList" class="list-decimal list-inside">
              </ul>
          </div>
        </div>
      </div>


      <!-- <div>
        <label class="label"><i class="mdi mdi-tray-plus"></i> Quantity </label>
        <div class="control">
          <div class="control expanded">
            <input class="input" type="number" placeholder="Enter your product Quantity ">
          </div>
        </div>
      </div> -->

      <br>

      <div>
        <label class="label"><i class="mdi mdi-cash"></i> Total Price </label>
        <div class="control">
          <div class="control expanded">
            <input id="total" name="total" class="input" type="number" value="0" readonly>
          </div>
        </div>
      </div>


      <br>
      <hr>
      <!-- <div class="field"> -->
      <!-- <label class="label">Subject</label> -->

      <!-- <div class="control">
              <input class="input" type="text" placeholder="e.g. Partnership opportunity">
            </div>
            <p class="help">
              This field is required
            </p>
          </div>

          <div class="field">
            <label class="label">Question</label>
            <div class="control">
              <textarea class="textarea" placeholder="Explain how we can help you"></textarea>
            </div>
          </div> -->
      <!-- <hr> -->

      <div class="field grouped">
        <div class="control">
          <button id="submit" type="submit" class="button green">
            Submit
          </button>
        </div>
        <div class="control">
          <button id="reset" type="reset" class="button red">
            Reset
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

  <script>
    let productList = document.querySelector("#productList");
    let total = document.querySelector("#total");
    let hidden = document.querySelector("#hidden");
    let products = [];
    let num = 0;

    function addProduct(id, name, price) {
      // Check if the maximum limit is reached (2 items with 1 quantity or 1 item with 2 quantities)
      if (num < 2) {
        const newItemName = name; // You can set the item name dynamically if needed
        const existingItem = Array.from(productList.children).find(item => item.firstChild.textContent.includes(newItemName));

        if (existingItem) {
          // Item already exists, update quantity
          const quantity = parseInt(existingItem.firstChild.textContent.split(" x ")[1]) + 1;
          existingItem.firstChild.textContent = `${newItemName} x ${quantity}`;
          num++;
          total.value = parseInt(total.value) + price;
          products.push(id);
          hidden.value = products;
        } else {
          // Item doesn't exist, create a new list item
          const newItem = document.createElement("li");
          newItem.classList.add("items-center", "space-x-2");

          const itemName = document.createElement("span");
          itemName.textContent = `${newItemName} x 1`;

          const deleteButton = document.createElement("button");
          deleteButton.setAttribute("type", "button");
          deleteButton.classList.add("delete-button");
          deleteButton.textContent = "X";
          deleteButton.addEventListener("click", function() {
            const quantity = parseInt(itemName.textContent.split(" x ")[1]);
            const itemPrice = price;
            if (quantity > 1) {
              itemName.textContent = `${newItemName} x ${quantity - 1}`;
            } else {
              newItem.remove();
            }
            num--;
            total.value = parseInt(total.value) - price;
            products.splice(products.indexOf(id), 1);
            hidden.value = products;
          });

          newItem.appendChild(itemName);
          newItem.appendChild(deleteButton);

          productList.appendChild(newItem);
          num++;
          total.value = parseInt(total.value) + price;
          products.push(id);
          hidden.value = products;

        }
      } else {
        alert("Maximum limit reached. You can have 2 items with 1 quantity or 1 item with 2 quantities.");
      }
    }
  </script>

  <script>
    let reset = document.querySelector("#reset");
    reset.addEventListener("click", function() {
      products = [];
      num = 0;
      productList.innerHTML = '';
    });
  </script>

</footer>