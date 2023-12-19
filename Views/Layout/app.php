<?php
$uri = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/src/css/main.css">
    <link rel="icon" type="image/png" href="/src/img/logo.jpg">
    <script src="/src/js/jquery-3.7.1.min.js"></script>
    <title>
        <?php echo $title ?>
    </title>
</head>

<body class="overflow-x-hidden">

<?php if (isset($_SESSION["error"])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline"><?php echo $_SESSION["error"] ?></span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
        <?php unset($_SESSION["error"]); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION["success"])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline"><?php echo $_SESSION["success"] ?></span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
        <?php unset($_SESSION["success"]); ?>
    <?php endif; ?>


    <div id="app">
        <?php if ($uri != "/"): ?>
            <div id="body">
                <nav id="navbar-main" class="navbar is-fixed-top">
                    <div class="navbar-brand">
                        <a class="navbar-item mobile-aside-button">
                            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                        </a>
                    </div>
                    <div class="navbar-brand is-right">
                        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
                            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
                        </a>
                    </div>
                    <div class="navbar-menu" id="navbar-menu">
                        <div class="navbar-end">
                            <div class="navbar-item dropdown has-divider has-user-avatar">
                                <a class="navbar-link">
                                    <div class="user-avatar">
                                        <img src="/src/img/avatar.png" alt="John Doe" class="rounded-full">
                                    </div>
                                    <div class="is-user-name"><span>
                                            <?php echo $_SESSION['user']["username"]; ?>
                                        </span></div>
                                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                                </a>
                                <div class="navbar-dropdown">
                                    <a href="/profile" class="navbar-item">
                                        <span class="icon"><i class="mdi mdi-account"></i></span>
                                        <span>My Profile</span>
                                    </a>
                                    <hr class="navbar-divider">
                                    <a href="/logout" class="navbar-item">
                                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                                        <span>Log Out</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <aside class="aside is-placed-left is-expanded">
                    <div class="aside-tools">
                        <div>
                            <!-- <img src="/src/img/logo.jpg" alt="logo" width="50" height="50"> -->
                            <b class="font-black">JoCyberGo</b>
                        </div>
                    </div>
                    <div class="menu is-menu-main">
                        <!-- <p class="menu-label">General</p> -->
                        <ul class="menu-list">
                            <li class="<?php if ($uri == '/home')
                                echo 'active'; ?>">
                                <a href="/home">
                                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                                    <span class="menu-item-label">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <!-- <p class="menu-label">Examples</p> -->
                        <ul class="menu-list">


                            <li class="<?php if ($uri == "/customers")
                                echo 'active' ?>">
                                    <a href="/customers">
                                        <span class="icon"><i class="mdi mdi-account-group"></i></span>
                                        <span class="menu-item-label">Customers</span>
                                    </a>
                                </li>



                                <li class="<?php if ($uri == "/employees")
                                echo 'active' ?>">
                                    <a href="/employees">
                                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                                        <span class="menu-item-label">Employees</span>
                                    </a>
                                </li>





                                <li class="<?php if (in_array($uri, ["/suppliers", "/supplier/order/create", "/supplier/orders"]))
                                echo 'active' ?>">
                                    <a class="dropdown">
                                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                                        <span class="menu-item-label">Suppliers</span>
                                    <?php if (in_array($uri, ["/suppliers", "/supplier/order/create", "/supplier/orders"])): ?>
                                        <span class="icon"><i class="mdi mdi-minus"></i></span>
                                    <?php else: ?>
                                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                                    <?php endif; ?>
                                </a>
                                <ul>

                                    <li>
                                        <a href="/suppliers">
                                            <span class="menu-item-label"> Suppliers List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/purchaseOrders">
                                            <span class="menu-item-label"> Purchase Order List</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>



                            <li class="<?php if (in_array($uri, ["/orders", "/order/create"]))
                                echo 'active' ?>">
                                    <a class="dropdown">
                                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                        <span class="menu-item-label">Orders</span>
                                    <?php if (in_array($uri, ["/orders", "/order/create"])): ?>
                                        <span class="icon"><i class="mdi mdi-minus"></i></span>
                                    <?php else: ?>
                                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                                    <?php endif; ?>
                                </a>
                                <ul>
                                    <li>
                                        <a href="/order/create">
                                            <span class="menu-item-label"> New Orders</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/orders">
                                            <span class="menu-item-label"> Orders List</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>


                            <li class="<?php if (in_array($uri, ["/products", "/product/create"]))
                                echo 'active' ?>">
                                    <a href="/products">
                                        <span class="icon"><i class="mdi mdi-package-variant-closed"></i></span>
                                        <span class="menu-item-label">Products</span>
                                    </a>
                                </li>




                                <li class="<?php if ($uri == "/stock-control")
                                echo 'active' ?>">
                                    <a href="/stock-control">
                                        <span class="icon"><i class="mdi mdi-store"></i></span>
                                        <span class="menu-item-label">Stock Control</span>
                                    </a>
                                </li>


                                <li class="<?php if ($uri == "/productionline")
                                echo 'active' ?>">
                                    <a href="/productionline">
                                        <span class="icon"><i class="mdi mdi-robot-industrial"></i></span>
                                        <span class="menu-item-label">Production Line</span>
                                    </a>
                                </li>

                                <!-- <li class="
                            
                            ">
                            <a href="tables">
                                <span class="icon"><i class="mdi mdi-table"></i></span>
                                <span class="menu-item-label">Tables</span>
                            </a>
                        </li>
                        <li class="
                            <a href="forms">
                                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                <span class="menu-item-label">Forms</span>
                            </a>
                        </li>
                        <li class="
                            <a href="profile">
                                <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                                <span class="menu-item-label">Profile</span>
                            </a>
                        </li> -->
                            </ul>
                        </div>
                    </aside>
                </div>
        <?php endif; ?>
        <?php echo $content ?>
    </div>
    <script src="/src/js/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>

</html>