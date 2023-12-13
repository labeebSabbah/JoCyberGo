


<style>
  #logo {
    border: none;
    border-radius: 50%;
}
</style>



<div class="bg-white rounded-lg shadow-lg px-8 py-10 max-w-xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center">
            <img  src="/src/img/logo_1.png " width="180" height="180" id="logo"
                alt="Logo" />
            <!-- <div class="text-gray-700 font-semibold text-lg">JoCyberGo</div> -->
        </div>
        <div class="text-gray-700">
            <div class="font-bold text-xl mb-2">INVOICE</div>
            <div class="text-sm">Date: <?php echo $order[0]['created_at'] ?></div>
            <div class="text-sm">Invoice #: <?php echo $order[0]['id'] ?></div>
        </div>
    </div>
    <div class="border-b-2 border-gray-300 pb-8 mb-8">
        <h2 class="text-2xl font-bold mb-4">Bill To:</h2>       <!--#:<?php echo $order[0]['customer_id'] ?> -->
        <div class="text-gray-700 mb-2">  <?php echo $order[0]['name'] ?></div>
        <!-- <div class="text-gray-700 mb-2">123 Main St.</div>
        <div class="text-gray-700 mb-2">Anytown, USA 12345</div> -->
        <div class="text-gray-700"><?php echo $order[0]['email'] ?></div>
    </div>
    <table class="w-full text-left mb-8">
        <thead>
            <tr>
                <th class="text-gray-700 font-bold uppercase py-2">Description</th>
                <th class="text-gray-700 font-bold uppercase py-2">Quantity</th>
                <th class="text-gray-700 font-bold uppercase py-2">Price</th>
                <th class="text-gray-700 font-bold uppercase py-2">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php   foreach($order as $o):  ?>
            <tr>
                <td class="py-4 text-gray-700"> <?php echo $o['prod_name'] ?></td>
                <td class="py-4 text-gray-700"><?php echo $o['amount'] ?></td>
                <td class="py-4 text-gray-700"><?php echo $o['price'] ?>$</td>
                <td class="py-4 text-gray-700"><?php echo $o['price']*$o['amount'] ?>$</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <div class="flex justify-end mb-8">
        <div class="text-gray-700 mr-2">Subtotal:</div>
        <div class="text-gray-700">$425.00</div>
    </div>
    <div class="text-right mb-8">
        <div class="text-gray-700 mr-2">Tax:</div>
        <div class="text-gray-700">$25.50</div>

    </div> -->  
    <div class="flex justify-end mb-8">
        <div class="text-gray-700 mr-2">Total:</div>
        <div class="text-gray-700 font-bold text-xl"><?php echo $order[0]['total_price'] ?>$</div>
    </div>
    <!-- <div class="border-t-2 border-gray-300 pt-8 mb-8">
        <div class="text-gray-700 mb-2">Payment is due within 30 days. Late payments are subject to fees.</div>
        <div class="text-gray-700 mb-2">Please make checks payable to Your Company Name and mail to:</div>
        <div class="text-gray-700">123 Main St., Anytown, USA 12345</div>
    </div> -->
    <div class="buttons flex justify-between nowrap">
        <form  action="/orders" method="POST">
            
            <button title="back" class="button small blue --jb-modal" id="view" type="submit" name="id" >
                <span class="icon"><i class="mdi mdi-arrow-left"></i></span>
            </button>
        </form>
        <form action="/order/delete" method="POST">
            
            <button title="Delete" class="button small red --jb-modal" id="delete" type="submit" name="id" value="<?php echo $order[0]['id']  ?>">
                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
            </button>
        </form>
    </div>
</div>

<br>
<footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        © 2023, JoCyberGo Team
      </div>
    </div>


  </div>
</footer>