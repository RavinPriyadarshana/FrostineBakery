<header>
    <div class="header-container">
        <div class="logo-container">
            <img src="assets/images/logo.jpg" alt="Frostine Logo">
            <h1>Frostine Bakery</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?page=home">Home</a></li>
                <!-- Products Dropdown Menu -->
                <li class="dropdown">
                    <a href="#" class="dropbtn">Products</a>
                    <div class="dropdown-content">
                        <!-- Updated to link to new category pages using the 'page' parameter -->
                        <a href="index.php?page=cake">Cake</a>
                        <a href="index.php?page=bread">Bread</a>
                        <a href="index.php?page=waffle">Waffle</a>
                        <a href="index.php?page=pancake">Pancake</a>
                        <a href="index.php?page=short_eats">Short Eats</a>
                    </div>
                </li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <a href="index.php?page=login">Login</a>
            <a href="index.php?page=register">Register</a>
        </div>
    </div>
</header>
