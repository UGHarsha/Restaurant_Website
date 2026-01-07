<?php
include 'connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}

include 'add_cart.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZestyZoomer - Authentic Sri Lankan Cuisine</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/home-style.css" rel="stylesheet">
</head>
<body>

<?php include 'user_header.php'; ?>

<section class="hero-section">
    <div class="hero-background">
        <img src="images/rice&curry.jpg" alt="Sri Lankan Rice & Curry" onerror="this.src='images/about-img.jpg'">
    </div>
    <div class="hero-content">
        <h1 class="hero-title">Welcome to ZestyZoomer</h1>
        <p class="hero-subtitle">Authentic Sri Lankan Flavors, Delivered Fresh to Your Door</p>
        <p class="hero-description">
            Experience the rich tastes of Ceylon - from spicy curries to sweet delights. 
            We bring traditional Sri Lankan cuisine with a modern twist, prepared fresh daily.
        </p>
        <div class="hero-buttons">
            <a href="menu.php" class="btn-primary-sl"><i class="fa fa-cutlery"></i> Order Now</a>
            <a href="category.php?category=main" class="btn-secondary-sl"><i class="fa fa-search"></i> Explore Menu</a>
        </div>
    </div>
</section>

<section class="categories-section">
    <h2 class="section-title">Our Specialty Categories</h2>
    <p class="section-subtitle">Choose from our carefully curated Sri Lankan food collections</p>
    <div class="categories-grid">
        <div class="category-card">
            <img src="images/dinner/d-8.jpg" alt="Main Dishes" class="category-image" onerror="this.src='images/about-img.jpg'">
            <div class="category-content">
                <h3 class="category-name"> Main Dishes</h3>
                <p class="category-description">Authentic rice & curry, hoppers, kottu, and traditional Sri Lankan mains that bring warmth to your table.</p>
                <a href="category.php?category=main" class="category-link">Explore Main Dishes <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="category-card">
            <img src="images/desserts/d-6.jpg" alt="Desserts" class="category-image" onerror="this.src='images/about-img.jpg'">
            <div class="category-content">
                <h3 class="category-name"> Sweet Treats</h3>
                <p class="category-description">Indulge in watalappan, kavum, kokis, and other traditional Sri Lankan sweets that melt in your mouth.</p>
                <a href="category.php?category=desserts" class="category-link">View Desserts <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="category-card">
            <img src="images/beverages/b-3.jpg" alt="Beverages" class="category-image" onerror="this.src='images/about-img.jpg'">
            <div class="category-content">
                <h3 class="category-name"> Refreshing Drinks</h3>
                <p class="category-description">Ceylon tea, king coconut, faluda, and refreshing tropical beverages to quench your thirst.</p>
                <a href="category.php?category=beverages" class="category-link">Browse Drinks <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="recent-products-section">
    <h2 class="section-title">Latest Additions to Our Menu</h2>
    <p class="section-subtitle">Freshly added items you don't want to miss!</p>
    <div class="products-grid">
        <?php
        $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY id DESC LIMIT 6");
        $select_products->execute();
        
        if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
        ?>
        <form action="" method="post" class="product-card">
            <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
            <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
            <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
            <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
            <div class="product-image-container">
                <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="<?= $fetch_products['name']; ?>" class="product-image" onerror="this.src='images/about-img.jpg'">
                <span class="product-badge">New!</span>
            </div>
            <div class="product-info">
                <div class="product-category"><?= ucfirst($fetch_products['category']); ?></div>
                <h3 class="product-name"><?= $fetch_products['name']; ?></h3>
                <p class="product-description"><?= isset($fetch_products['description']) ? substr($fetch_products['description'], 0, 60) . '...' : 'Delicious item'; ?></p>
                <div class="product-footer">
                    <div class="product-price"><span>Rs.</span><?= number_format($fetch_products['price'], 2); ?></div>
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn"><i class="fa fa-cart-plus"></i> Add</button>
                </div>
            </div>
        </form>
        <?php
            }
        }else{
            echo '<p style="color: white; text-align: center; grid-column: 1/-1; font-size: 1.2rem;">No products added yet!</p>';
        }
        ?>
    </div>
    <div style="text-align: center; margin-top: 40px;">
        <a href="menu.php" class="btn-primary-sl"><i class="fa fa-th"></i> View All Products</a>
    </div>
</section>

<?php include 'user_footer.php'; ?>
</body>
</html>
