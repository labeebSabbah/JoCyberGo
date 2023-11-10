<?php 
  $file = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/src/css/main.css">
    <title>
        <?php echo $title ?>
    </title>
</head>

<body class="overflow-x-hidden">
    <div id="app">
        <?php if ($file != "index.php") : ?>
        <div id="body">
            <nav id="navbar-main" class="navbar is-fixed-top">
                <div class="navbar-brand">
                    <a class="navbar-item mobile-aside-button">
                        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                    </a>
                    <div class="navbar-item">
                        <div class="control"><input placeholder="Search everywhere..." class="input"></div>
                    </div>
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
                                    <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe"
                                        class="rounded-full">
                                </div>
                                <div class="is-user-name"><span>John Doe</span></div>
                                <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="navbar-dropdown">
                                <a href="profile.php" class="navbar-item">
                                    <span class="icon"><i class="mdi mdi-account"></i></span>
                                    <span>My Profile</span>
                                </a>
                                <hr class="navbar-divider">
                                <a href="logout" class="navbar-item">
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
                        Admin <b class="font-black">One</b>
                    </div>
                </div>
                <div class="menu is-menu-main">
                    <p class="menu-label">General</p>
                    <ul class="menu-list">
                        <li class="<?php if ($file == 'home')
                            echo 'active'; ?>">
                            <a href="home">
                                <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                                <span class="menu-item-label">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <p class="menu-label">Examples</p>
                    <ul class="menu-list">
                        <li class="<?php if ($file == "customers")
                            echo 'active' ?>">
                                <a href="customers">
                                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                                    <span class="menu-item-label">Customers</span>
                                </a>
                            </li>
                            <li class="<?php if ($file == "products")
                            echo 'active' ?>">
                                <a href="products">
                                    <span class="icon"><i class="mdi mdi-package-variant-closed"></i></span>
                                    <span class="menu-item-label">Products</span>
                                </a>
                            </li>
                            <li class="<?php if ($file == "orders")
                            echo 'active' ?>">
                                <a href="orders">
                                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                    <span class="menu-item-label">Orders</span>
                                </a>
                            </li>
                            <li class="<?php if ($file == 'tables')
                            echo 'active'; ?>">
                            <a href="tables">
                                <span class="icon"><i class="mdi mdi-table"></i></span>
                                <span class="menu-item-label">Tables</span>
                            </a>
                        </li>
                        <li class="<?php if ($file == 'forms')
                            echo 'active'; ?>">
                            <a href="forms">
                                <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                <span class="menu-item-label">Forms</span>
                            </a>
                        </li>
                        <li class="<?php if ($file == 'profile')
                            echo 'active'; ?>">
                            <a href="profile">
                                <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                                <span class="menu-item-label">Profile</span>
                            </a>
                        </li>
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