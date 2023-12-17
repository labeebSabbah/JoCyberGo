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
    <link rel="icon" type="image/png" href="/src/img/logo.jpg" >
    <script src="/src/js/jquery-3.7.1.min.js"></script>
    <title>
        <?php echo $title ?>
    </title>
</head>

<body class="overflow-x-hidden">
    <div id="app">
        <?php if ($uri != "/") : ?>
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
                                    <img src="/src/img/avatar.png" alt="John Doe"
                                        class="rounded-full">
                                </div>
                                <div class="is-user-name"><span><?php echo $_SESSION['user']["username"]; ?></span></div>
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

                       


                            <li class="<?php if (in_array($uri, ["/suppliers", "/supplier/order/create","/supplier/orders"]))
                            echo 'active' ?>">
                                <a class="dropdown">
                                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                                    <span class="menu-item-label">Suppliers</span>
                                    <?php if (in_array($uri, ["/orders", "/order/create"])): ?>
                                    <span class="icon"><i class="mdi mdi-minus"></i></span>
                                    <?php else: ?>
                                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                                    <?php endif; ?>
                                </a>
                                    <ul>
                                        <li >
                                            <a href="/supplier/order/create">
                                                <span class="menu-item-label">    New Purchase Order</span>
                                             </a>
                                        </li>
                                        <li >
                                            <a href="/suppliers">
                                                <span class="menu-item-label">     Suppliers List</span>
                                             </a>
                                        </li>
                                        <li >
                                            <a href="/supplier/orders">
                                                <span class="menu-item-label">     Purchase Order List</span>
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
                                        <li >
                                            <a href="/order/create">
                                                <span class="menu-item-label">    New Orders</span>
                                             </a>
                                        </li>
                                        <li >
                                            <a href="/orders">
                                                <span class="menu-item-label">     Orders List</span>
                                             </a>
                                        </li>
          
                                    </ul>
                            </li>
                            
                            
                            <li class="<?php if (in_array($uri, ["/products", "/product/create"]))
                            echo 'active' ?>">
                                <a class="dropdown">
                                    <span class="icon"><i class="mdi mdi-package-variant-closed"></i></span>
                                    <span class="menu-item-label">Products</span>
                                    <?php if (in_array($uri, ["/products", "/product/create"])): ?>
                                    <span class="icon"><i class="mdi mdi-minus"></i></span>
                                    <?php else: ?>
                                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                                    <?php endif; ?>

                                </a>
                                    <ul>
                                        <li >
                                            <a href="/product/create">
                                                <span class="menu-item-label">New Products</span>
                                             </a>
                                        </li>
                                        <li >
                                            <a href="/products">
                                                <span class="menu-item-label">All Product</span>
                                             </a>
                                        </li>
                                    </ul>
                             </li>




                             <li class="<?php if ($uri == "/")
                            echo 'active' ?>">
                                <a href="/customers">
                                    <span class="icon"><i class="mdi mdi-store"></i></span>
                                    <span class="menu-item-label">Storage</span>
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