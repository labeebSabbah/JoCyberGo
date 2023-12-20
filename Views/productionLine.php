<?php

if (!isset($_SESSION['user'])) {
  header('location:/');
}

?>
<style>
  #items,
  #items1 {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 10px;
  }

  #items li,
  #items1 li {
    width: 80% !important;
    border-radius: 2%;
    padding: 10px;
    width: 350px;
    color: white;
    font-size: large;
    word-wrap: break-word;
  }
</style>



<ul id="items1">
  <?php foreach ($running as $running1): ?>
    <li class="bg-blue-400" id="<?php echo $running1['prod_ord_id'] ?>" data-station="<?php echo $running1['station'] ?>"
      data-id="<?php echo $running1['id'] ?>" class="rounded-t-lg">#
      <?php echo $running1["id"]; ?> | Customer name =
      <?php echo $running1["name"]; ?> | Product Name =
      <?php echo $running1["prod_name"]; ?> | Amount=
      <?php echo $running1["amount"]; ?> | Total=
      <?php echo $running1["total_price"]; ?>$
    </li>
  <?php endforeach; ?>



</ul>
<br>
<br>
<br>




<div class="p-5">
  <div class="mx-4 p-4">
    <div class="flex items-center">


      <div class="flex items-center text-teal-600 relative">
        <div id="station1_logo"
          class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
          <svg width="100%" height="100%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <style type="text/css">
                .st0 {
                  fill: #000000;
                }
              </style>
              <g>
                <path class="st0"
                  d="M328.594,42.031v95.844L164.297,42.031v95.844L0,42.031v427.938h164.297h19.109h145.188h19.109H512V149.016 L328.594,42.031z M205.813,324.25h-68.266V256h68.266V324.25z M374.453,324.25h-68.266V256h68.266V324.25z">
                </path>
              </g>
            </g>
          </svg>
        </div>
        <div id="station1_text"
          class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">Start
        </div>
      </div>


      <div class="flex w-1/4 h-1.5 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="25"
        aria-valuemin="0" aria-valuemax="100">
        <div id="station1"
          class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500"
          style="width: 0%"></div>
      </div>



      <div class="flex items-center text-white relative">
        <div id="station2_logo"
          class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
          <svg width="100%" height="100%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <style type="text/css">
                .st0 {
                  fill: #000000;
                }
              </style>
              <g>
                <path class="st0"
                  d="M328.594,42.031v95.844L164.297,42.031v95.844L0,42.031v427.938h164.297h19.109h145.188h19.109H512V149.016 L328.594,42.031z M205.813,324.25h-68.266V256h68.266V324.25z M374.453,324.25h-68.266V256h68.266V324.25z">
                </path>
              </g>
            </g>
          </svg>

        </div>
        <div id="station2_text"
          class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">Bottom
        </div>
      </div>



      <div class="flex w-1/4 h-1.5 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="25"
        aria-valuemin="0" aria-valuemax="100">
        <div id="station2"
          class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500"
          style="width: 0%"></div>
      </div>



      <div class="flex items-center text-gray-500 relative">
        <div id="station3_logo"
          class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
          <svg width="100%" height="100%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <style type="text/css">
                .st0 {
                  fill: #000000;
                }
              </style>
              <g>
                <path class="st0"
                  d="M328.594,42.031v95.844L164.297,42.031v95.844L0,42.031v427.938h164.297h19.109h145.188h19.109H512V149.016 L328.594,42.031z M205.813,324.25h-68.266V256h68.266V324.25z M374.453,324.25h-68.266V256h68.266V324.25z">
                </path>
              </g>
            </g>
          </svg>

        </div>
        <div id="station3_text"
          class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">Top
        </div>
      </div>


      <div class="flex w-1/4 h-1.5 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="25"
        aria-valuemin="0" aria-valuemax="100">
        <div id="station3"
          class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500"
          style="width: 0%"></div>
      </div>


      <div class="flex items-center text-gray-500 relative">
        <div id="station4_logo"
          class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
          <svg width="100%" height="100%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <style type="text/css">
                .st0 {
                  fill: #000000;
                }
              </style>
              <g>
                <path class="st0"
                  d="M328.594,42.031v95.844L164.297,42.031v95.844L0,42.031v427.938h164.297h19.109h145.188h19.109H512V149.016 L328.594,42.031z M205.813,324.25h-68.266V256h68.266V324.25z M374.453,324.25h-68.266V256h68.266V324.25z">
                </path>
              </g>
            </g>
          </svg>

        </div>
        <div id="station4_text"
          class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">Bolt
        </div>
      </div>


      <div class="flex w-1/4 h-1.5 bg-gray-200 rounded-full overflow-hidden" role="progressbar" aria-valuenow="25"
        aria-valuemin="0" aria-valuemax="100">
        <div id="station4"
          class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500"
          style="width: 0%"></div>
      </div>


      <div class="flex items-center text-gray-500 relative">
        <div id="station5_logo"
          class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-gray-300">
          <svg width="100%" height="100%" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <style type="text/css">
                .st0 {
                  fill: #000000;
                }
              </style>
              <g>
                <path class="st0"
                  d="M328.594,42.031v95.844L164.297,42.031v95.844L0,42.031v427.938h164.297h19.109h145.188h19.109H512V149.016 L328.594,42.031z M205.813,324.25h-68.266V256h68.266V324.25z M374.453,324.25h-68.266V256h68.266V324.25z">
                </path>
              </g>
            </g>
          </svg>

        </div>
        <div id="station5_text"
          class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium uppercase text-gray-500">Packaging
        </div>
      </div>


    </div>
  </div>
</div>
<div class="flex justify-end p-2 mb-0">

  <button type="button"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    onclick="start()">
    Start
    </buton>
</div>

<ul id="items">
  <?php foreach ($orders as $order): ?>
    <li class="
      <?php
      switch ($order['priority']) {
        case 1:
          echo 'bg-red-600';
          break;
        case 2:
          echo 'bg-yellow-600';
          break;
        case 3:
          echo 'bg-gray-600';
          break;
      }
      ?>
    " id="<?php echo $order['prod_ord_id'] ?>" data-combination="<?php echo $order['combination'] ?>"
      data-id="<?php echo $order['id'] ?>" class="rounded-t-lg">#
      <?php echo $order["id"]; ?> | Customer name =
      <?php echo $order["name"]; ?> | Product Name =
      <?php echo $order["prod_name"]; ?> | Amount=
      <?php echo $order["amount"]; ?> | Total=
      <?php echo $order["total_price"]; ?>$
    </li>
  <?php endforeach; ?>
</ul>
<br>

<hr>
<table class="w-2/12">
  <tr>

    <th>Priority</th>
    <th> color</th>
    </tr>
    <tr>
      <td> Hight</td>
      <td class="!bg-red-600"></td>
    </tr>
    <tr>
      <td> Medium</td>
      <td class="!bg-yellow-600"></td>
    </tr>
    <tr>
      <td> Low</td>
      <td class="!bg-gray-600"></td>
    </tr>

</table>

<script src="/node_modules/sortablejs/Sortable.min.js"></script>
<script>
  var el = document.getElementById('items');
  var sortable = new Sortable(el, {
    animation: 150
  });

  let x = 0;
  let progress = null;
  let checker = false;
  let clicked = false;
  var station = "";
  if (document.getElementById('items1').children.length !== 0) {
    station = document.getElementById("items1").firstChild.nextSibling.dataset.station;
  } else {
    station = 0;
  }
  station = parseInt(station);
  var order_id = "";
  var ord_id = "";
  if (station != 0) {
    order_id = document.getElementById("items1").firstChild.nextSibling.id;
    ord_id = document.getElementById("items1").firstChild.nextSibling.dataset.id;
    progressInterval(station);
  } else {
    order_id = document.getElementById("items").firstChild.nextSibling.id;
    ord_id = document.getElementById("items").firstChild.nextSibling.dataset.id;
  }
  order_id = parseInt(order_id);
  ord_id = parseInt(ord_id);
  function animate(id) {


    let bar = document.getElementById(`station${id}`);
    let logo = document.getElementById(`station${id}_logo`);
    let text = document.getElementById(`station${id}_text`);

    if (id === 5) {
      logo.classList.add("bg-teal-600");
      text.classList.remove("text-gray-500");
      text.classList.add("text-teal-600");
      document.getElementById(`station${id - 1}`).style.width = "100%";
      clearInterval(progress);
      clicked = false;
      reset();
      return;
    }

    if (!checker) {
      let nextLogo = document.getElementById(`station${(id + 1)}_logo`)
      nextLogo.classList.remove("border-gray-300");
      nextLogo.classList.add("border-teal-600");
      logo.classList.add("bg-teal-600");
      text.classList.remove("text-gray-500");
      text.classList.add("text-teal-600");
      for (let y = id - 1; y >= 1; y--) {
        let prevBar = document.getElementById(`station${y}`);
        let prevLogo = document.getElementById(`station${y}_logo`);
        let prevText = document.getElementById(`station${y}_text`);
        prevBar.classList.remove("bg-blue-600");
        prevBar.classList.add("bg-teal-600");
        prevBar.style.width = "100%";
        prevLogo.classList.remove("border-gray-300");
        prevLogo.classList.add("border-teal-600");
        prevLogo.classList.add("bg-teal-600");
        prevText.classList.remove("text-gray-500");
        prevText.classList.add("text-teal-600");
      }
      checker = true;
    }

    if (x === 100) {
      bar.classList.remove("bg-blue-600");
      bar.classList.add("bg-teal-600");
      logo.classList.add("bg-teal-600");
      x = 0;
      checker = false;
      clearInterval(progress);
      progressInterval(id + 1);
    }

    $.ajax({
      url: "/api/check_station",
      method: "POST",
      data: {
        id: `${order_id}`
      },
      success: function (response) {
        if (response == (station + 1)) {
          x = 100;
          station = station + 1;
          bar.style.width = x + "%";
        }
      },
      error: function (response) {
        alert("error");
      }
    });

    if (x == 100) {
      return;
    }

    if (x != 95) {
      x++;
      bar.style.width = x + "%";
    }
  }

  function progressInterval(id) {
    let stop = false;
    console.log(id)
    if (id == 5) {
      $.ajax({
        url: "/order/complete",
        method: "POST",
        data: {
          id: `${ord_id}`,
          order_id: `${order_id}`
        },
        success: function (response) {
          document.getElementById("items1").firstChild.nextSibling.classList.remove("bg-blue-400");
          document.getElementById("items1").firstChild.nextSibling.classList.add("bg-teal-600");
          setTimeout(function () {
            document.getElementById("items1").firstChild.nextSibling.remove();
          }, 3000);
          clearInterval(progress);
          clicked = false;
          stop = true;
          reset();
        },
        error: function (response) {
          alert("error");
        }
      });
    }
    if (!stop) {
      progress = setInterval(() => { animate(id); }, 200);
    } else {
      reset();
    }
  }

  function start() {
    if (clicked || document.getElementById('items1').children.length !== 0) {
      alert("Count error");
      return;
    }
    station = 1;
    order_id = document.getElementById("items").firstChild.nextSibling.id;
    ord_id = document.getElementById("items").firstChild.nextSibling.dataset.id;
    let li = document.createElement("li");
    li.setAttribute("id", `${document.getElementById("items").firstChild.nextSibling.id}`);
    li.setAttribute("data-id", `${document.getElementById("items").firstChild.nextSibling.dataset.id}`);
    li.setAttribute("class", "bg-blue-400");
    li.appendChild(document.createTextNode(`${document.getElementById("items").firstChild.nextSibling.innerHTML}`));
    document.getElementById("items1").appendChild(li);
    $.ajax({
      url: "/change_status",
      method: "POST",
      data: {
        "id": `${ord_id}`
      },
      success: function (response) {
        clicked = true;
      },
      error: function () {
        alert("error");
      }
    });

    $.ajax({
      url: "/" + document.getElementById("items").firstChild.nextSibling.dataset.combination,
      method: "POST",
      data: {
        "id": `${document.getElementById("items").firstChild.nextSibling.id}`
      },
      success: function (response) {
        reset();
        clicked = true;
        progressInterval(1);
      },
      error: function () {
        alert("error");
      }
    });

    let s = document.getElementById("items").firstChild.nextSibling;
    s.remove();
    reset();
  }

  function reset() {
    for (let x = 1; x <= 5; x++) {
      let bar = document.getElementById(`station${x}`);
      let logo = document.getElementById(`station${x}_logo`);
      let text = document.getElementById(`station${x}_text`);

      logo.classList.remove("border-teal-600");
      logo.classList.remove("bg-teal-600");
      logo.classList.add("border-gray-300");
      text.classList.remove("text-teal-600");
      text.classList.add("text-gray-500");

      if (x !== 5) {
        bar.classList.remove("bg-teal-600");
        bar.classList.add("bg-blue-600");
        bar.style.width = "0%";
      }
    }
  }

</script>

<footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        © 2023, JoCyberGo Team
      </div>
    </div>
  </div>
</footer>