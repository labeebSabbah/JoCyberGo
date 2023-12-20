<?php

if (!isset($_SESSION['user'])) {
  header('location:/');
}

?>
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

      <div>
        <label class="label"><i class="mdi mdi-account"></i> Customer Name</label>
        <div class="control">
          <div class="select">
            <select name="customer" required>
              <option value="" selected>Choose the customer...</option>
              <?php foreach ($customers as $customer): ?>
                <option value="<?php echo $customer['id'] ?>">
                  <?php echo $customer['name'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <br>
      <div>
        <label class="label"><i class="mdi mdi-account"></i> Employee</label>
        <div class="control">
          <div class="select">
            <select name="employee_id" required>
              <option value="" selected>Choose the Employee...</option>
              <?php foreach ($employees as $employee): ?>
                <option value="<?php echo $employee['id'] ?>">
                  <?php echo $employee['name'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <br>

      <div>
        <label class="label"><i class="mdi mdi-account"></i> Priority </label>
        <div class="control">
          <div class="select">
            <select name="priority" required>
              <option value="" selected>Choose the priority...</option>
              <?php foreach ($priorities as $priority): ?>
                <option value="<?php echo $priority ?>">
                  <?php
                  switch ($priority) {
                    case 1:
                      echo 'High';
                      break;
                    case 2:
                      echo 'Medium';
                      break;
                    case 3:
                      echo 'Low';
                      break;
                  }
                  ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>





      <br>

      <div>
        <label class="label"><i class="mdi mdi-package-variant-closed"></i> Products</label>

        <div class="w-full flex justify-center gap-5 flex-wrap">

          <?php foreach ($products as $product): ?>

            <div
              class="bg-white shadow-md border border-gray-200 rounded-lg max-w-xs dark:bg-gray-800 dark:border-gray-700">
              <a href="#">
                <img class="rounded-t-lg" src="<?php echo $product['img'] ?>" alt="">
              </a>
              <div class="p-5">
                <a href="#">
                  <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">
                    <?php echo $product["name"] ?>
                  </h5>
                </a>
                <button type="button"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                  onclick="addProduct(<?php echo $product['id'] ?>, '<?php echo $product['name'] ?>', <?php echo $product['price'] ?>)">
                  Add <i class="mdi mdi-plus"></i>

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


      <div class="field grouped">
        <div class="control">
          <button id="back" type="button" class="button bg-gray-500" onclick="window.location = '/orders'">
            Back
          </button>
        </div>
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
      if (num < 1) {
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
          deleteButton.addEventListener("click", function () {
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
        alert("Maximum limit reached. ");
      }
    }
  </script>

  <script>
    let reset = document.querySelector("#reset");
    reset.addEventListener("click", function () {
      products = [];
      num = 0;
      productList.innerHTML = '';
    });
  </script>

</footer>