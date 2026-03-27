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
                <span class="brand-name"><span class="brand-ceylon">Ceylon</span><span class="brand-bites">Bites</span></span>
            </a>
        </div>

        <nav class="main-nav" id="main-nav">
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
            <button type="button" class="hamburger-menu" id="hamburger-btn" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
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
        document.getElementById('userDropdown').classList.toggle('active');
    });

    // Close user dropdown when clicking outside
    document.addEventListener('click', function(e) {
        var dropdown = document.getElementById('userDropdown');
        var userBtn = document.getElementById('user-btn');
        if (!dropdown.contains(e.target) && !userBtn.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });

    // Hamburger menu toggle
    document.getElementById('hamburger-btn').addEventListener('click', function() {
        var nav = document.getElementById('main-nav');
        nav.classList.toggle('active');
        this.classList.toggle('open');
    });

    // Mobile dropdown toggle — tap on dropdown-toggle opens/closes sub-menu
    document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            // Only intercept on mobile (hamburger is visible)
            if (window.getComputedStyle(document.getElementById('hamburger-btn')).display !== 'none') {
                e.preventDefault();
                var parent = this.closest('.dropdown');
                // Close all other open dropdowns first
                document.querySelectorAll('.dropdown.active').forEach(function(d) {
                    if (d !== parent) d.classList.remove('active');
                });
                parent.classList.toggle('active');
            }
        });
    });

    // Close nav when a non-dropdown link is clicked (mobile UX)
    document.querySelectorAll('.nav-link:not(.dropdown-toggle)').forEach(function(link) {
        link.addEventListener('click', function() {
            document.getElementById('main-nav').classList.remove('active');
            document.getElementById('hamburger-btn').classList.remove('open');
            document.querySelectorAll('.dropdown.active').forEach(function(d) {
                d.classList.remove('active');
            });
        });
    });

    // Close dropdown sub-items also close the nav
    document.querySelectorAll('.dropdown-link').forEach(function(link) {
        link.addEventListener('click', function() {
            document.getElementById('main-nav').classList.remove('active');
            document.getElementById('hamburger-btn').classList.remove('open');
            document.querySelectorAll('.dropdown.active').forEach(function(d) {
                d.classList.remove('active');
            });
        });
    });
</script>
