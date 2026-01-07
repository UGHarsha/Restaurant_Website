<?php
// Include the database connection file
include 'connect.php';

// Start the session if it hasn't started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zesty Zoomer</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
    <!-- header section starts -->
    <header>
        <h3><a href="index.php" class="logo"><span class="logo-1">Zesty</span><span class="logo-2">Zoomer</span></a></h3>
        <div class="nav-controls">
            <a href="cart.php"><label for="cart-1" class="cart-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></a>
            <a href="#"><label for="login-1" class="login-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></label></a>
            <input type="checkbox" id="menu-bar">
            <label for="menu-bar" class="menu-icon"><i class="fa fa-bars"></i></label>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="about us.php"><i class="fa fa-user" aria-hidden="true"></i> About Us</a></li>
                <li><a href="#"><i class="fa fa-edit" aria-hidden="true"></i> Menu &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <ul class="dropdown">
                        <li><a href="category.php?category=breakfast">Breakfast</a></li>
                        <li><a href="category.php?category=lunch">Lunch</a></li>
                        <li><a href="category.php?category=dinner">Dinner</a></li>
                        <li><a href="category.php?category=sides">Sides</a></li>
                        <li><a href="category.php?category=desserts">Desserts</a></li>
                        <li><a href="category.php?category=beverage">Beverages</a></li>
                    </ul>
                </li>
                <?php
                $count_cart_items =$conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                $count_cart_items->execute([$user_id]);
                $total_cart_items = $count_cart_items->rowCount();
                ?> 
                <li><a href="blog.php"><i class="fa fa-clone" aria-hidden="true"></i> Blog</a></li>
                <li><a href="q and a.php"><i class="fa fa-question" aria-hidden="true"></i> Q&amp;A</a></li>
                <li><a href="contact us.php"><i class="fa fa-phone" aria-hidden="true"></i><b> Contact Us</b></a></li>
                <div class="nav-icons" align="right">
                    <a href="cart.php"><span class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>(<?= $total_cart_items; ?>)</span></a>
                    <a href="#"><span id="user-btn"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span></a>
                </div>
            </ul>
        </nav>
        <div class="profile" id="profileDiv">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if ($select_profile->rowCount() > 0) {
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                <p class="name"><?= $fetch_profile['name']; ?></p>
                <div class="flex">
                    <a href="profile.php" class="btn">profile</a>
                    <a href="user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
                </div>
                <p class="account">
                    <a href="login.php">login</a> or
                    <a href="register.php">register</a>
                </p> 
                <?php
            } else {
                ?>
                <p class="name">please login first!</p>
                <a href="login.php" class="btn">login</a>
                <?php
            }
            ?>
        </div>
    </header>
    <script>
        document.getElementById('user-btn').addEventListener('click', function() {
            var profileDiv = document.getElementById('profileDiv');
            profileDiv.classList.toggle('active');
        });
    </script>
</body>
</html>
