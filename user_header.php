<?php
require_once 'connect.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['user_id'] ?? '';

$total_cart_items = 0;
if ($user_id !== '') {
    $count_cart_items = $conn->prepare('SELECT COUNT(*) FROM `cart` WHERE user_id = ?');
    $count_cart_items->execute([$user_id]);
    $total_cart_items = (int) $count_cart_items->fetchColumn();
}

$fetch_profile = null;
?>

<header class="main-header">
    <div class="header-container">
        <div class="logo-section">
            <a href="index.php" class="brand-logo">
                <i class="fa fa-cutlery"></i>
                <span class="brand-name"><span class="brand-zesty">Zesty</span><span class="brand-zoomer">Zoomer</span></span>
            </a>
        </div>

        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <nav class="main-nav">
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-home"></i> Home</a></li>
                <li class="nav-item"><a href="about us.php" class="nav-link"><i class="fa fa-info-circle"></i> About</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"><i class="fa fa-cutlery"></i> Menu <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="category.php?category=main" class="dropdown-link"><i class="fa fa-circle"></i> Main Dishes</a></li>
                        <li><a href="category.php?category=beverages" class="dropdown-link"><i class="fa fa-circle"></i> Beverages</a></li>
                        <li><a href="category.php?category=desserts" class="dropdown-link"><i class="fa fa-circle"></i> Desserts</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="blog.php" class="nav-link"><i class="fa fa-newspaper-o"></i> Blog</a></li>
                <li class="nav-item"><a href="contact us.php" class="nav-link"><i class="fa fa-envelope"></i> Contact</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <a href="cart.php" class="action-btn cart-btn">
                <i class="fa fa-shopping-cart"></i>
                <?php if($total_cart_items > 0): ?>
                    <span class="cart-count"><?= $total_cart_items; ?></span>
                <?php endif; ?>
            </a>
            <button type="button" class="action-btn user-btn" id="user-btn">
                <i class="fa fa-user"></i>
            </button>
        </div>
    </div>
</header>

<div class="user-dropdown" id="userDropdown">
        <?php
        if ($user_id !== '') {
            $select_profile = $conn->prepare('SELECT * FROM `users` WHERE id = ? LIMIT 1');
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        }

        if (!empty($fetch_profile)) {
            ?>
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fa fa-user-circle"></i>
                </div>
                <div class="user-details">
                    <p class="user-name"><?= htmlspecialchars($fetch_profile['name']); ?></p>
                    <p class="user-email"><?= htmlspecialchars($fetch_profile['email']); ?></p>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <ul class="user-menu">
                <li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
                <li><a href="orders.php"><i class="fa fa-shopping-bag"></i> My Orders</a></li>
                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
            </ul>
            <div class="dropdown-divider"></div>
            <a href="user_logout.php" onclick="return confirm('Are you sure you want to logout?');" class="logout-btn">
                <i class="fa fa-sign-out"></i> Logout
            </a>
            <?php
        } else {
            ?>
            <div class="guest-info">
                <i class="fa fa-user-circle-o"></i>
                <p class="guest-message">Welcome, Guest!</p>
                <p class="guest-text">Please login to access your account</p>
            </div>
            <div class="dropdown-divider"></div>
            <div class="auth-buttons">
                <a href="login.php" class="auth-btn login-btn"><i class="fa fa-sign-in"></i> Login</a>
                <a href="register.php" class="auth-btn register-btn"><i class="fa fa-user-plus"></i> Register</a>
            </div>
            <?php
        }
        ?>
    </div>

<script>
    // User dropdown toggle
    document.getElementById('user-btn').addEventListener('click', function(e) {
        e.stopPropagation();
        var dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        var dropdown = document.getElementById('userDropdown');
        var userBtn = document.getElementById('user-btn');
        if (!dropdown.contains(e.target) && !userBtn.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });

    // Mobile menu toggle
    document.getElementById('menu-toggle').addEventListener('change', function() {
        document.querySelector('.main-nav').classList.toggle('active');
    });
</script>
