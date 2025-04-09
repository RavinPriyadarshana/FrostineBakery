<header>
    <div class="header-container">
        <div class="logo-container">
            <img src="assets/images/logo.jpg" alt="Frostine Logo">
            <h1>Frostine Bakery</h1>
        </div>
        <nav>
            <ul>
                <?php
                if (isset($_SESSION['user'])) {
                    if ($_SESSION['user_role']  == 'HeadManager'  || $_SESSION['user_role'] == 'BranchManager') {
                ?>
                        <li><a href="index.php?page=dashboard">Home</a></li>
                    <?php }

                    if (!$_SESSION['user_role'] || $_SESSION['user_role']  == null || $_SESSION['user_role']  == '') {
                    ?>
                        <li><a href="index.php?page=home">Home</a></li>
                    <?php
                    }


                    if ($_SESSION['user_role']  == 'Admin') {
                    ?>
                        <li><a href="index.php?page=admin">Home</a></li>
                    <?php
                    }

                    if ($_SESSION['user_role']  == 'Cashier') {
                    ?>
                        <li><a href="index.php?page=cashier">Home</a></li>
                <?php
                    }
                }
                ?>
                <!-- Products Dropdown Menu -->

                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Products</a>
                        <div class="dropdown-content">
                            <a href="index.php?page=category&type=cake">Cake</a>
                            <a href="index.php?page=category&type=bread">Bread</a>
                            <a href="index.php?page=category&type=waffle">Waffle</a>
                            <a href="index.php?page=category&type=pancake">Pancake</a>
                            <a href="index.php?page=category&type=short_eats">Short Eats</a>
                        </div>
                    </li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="index.php?page=contact_us">Contact Us</a></li>
                    <li><a href="index.php?page=cart">Cart</a></li>
                    <li><a href="index.php?page=my-orders">My Orders</a></li>
                    <?php
                } else {
                    if ($_SESSION['user_role'] == null) {
                    ?>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Products</a>
                            <div class="dropdown-content">
                                <a href="index.php?page=category&type=cake">Cake</a>
                                <a href="index.php?page=category&type=bread">Bread</a>
                                <a href="index.php?page=category&type=waffle">Waffle</a>
                                <a href="index.php?page=category&type=pancake">Pancake</a>
                                <a href="index.php?page=category&type=short_eats">Short Eats</a>
                            </div>
                        </li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="index.php?page=contact_us">Contact Us</a></li>
                        <li><a href="index.php?page=cart">Cart</a></li>
                        <li><a href="index.php?page=my-orders">My Orders</a></li>
                <?php
                    }
                }
                ?>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <li><a href="index.php?page=logout">Logout</a></li>
                <?php
                }
                ?>


            </ul>
        </nav>

        <?php
        if (!isset($_SESSION['user'])) {
        ?>
            <div class="auth-buttons">
                <a href="index.php?page=login">Login</a>
                <a href="index.php?page=register">Register</a>
            </div>

        <?php  }
        ?>
    </div>
</header>