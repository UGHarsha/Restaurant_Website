<?php
include 'connect.php';
session_start();
if(isset($_SESSION['user_id'])){ $user_id = $_SESSION['user_id']; }else{ $user_id = ''; }
include 'add_cart.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>CeylonBites - Authentic Sri Lankan Cuisine</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/home-style.css" rel="stylesheet">
</head>
<body>
<?php include 'user_header.php'; ?>

<!-- ========== HERO ========== -->
<section class="zz-hero">
    <div class="zz-hero__bg">
        <img src="images/Main/rice&curry.jpg" alt="Sri Lankan Cuisine" loading="eager">
    </div>
    <div class="zz-hero__overlay"></div>
    <div class="zz-hero__particles"><span></span><span></span><span></span><span></span><span></span><span></span></div>
    <div class="zz-hero__wrap">
        <div class="zz-hero__left">
            <div class="zz-hero__badge"><i class="fa fa-fire"></i> No.1 Sri Lankan Food Delivery</div>
            <h1 class="zz-hero__title">
                Taste The<br>
                <span class="zz-hero__typed" id="heroTyped"></span><br>
                <span class="zz-hero__accent">Sri Lankan Flavor</span>
            </h1>
            <p class="zz-hero__desc">Bold spices. Fresh ingredients. Delivered hot to your doorstep in under 30 minutes.</p>
            <div class="zz-hero__actions">
                <a href="menu.php" class="zz-btn zz-btn--glow"><i class="fa fa-cutlery"></i> Order Now</a>
                <a href="category.php?category=main" class="zz-btn zz-btn--outline"><i class="fa fa-compass"></i> Explore</a>
            </div>
            <div class="zz-hero__trust">
                <div class="zz-hero__trust-avatars">
                    <span>A</span><span>N</span><span>K</span><span>+</span>
                </div>
                <div class="zz-hero__trust-text">
                    <strong>2,500+</strong> happy customers
                </div>
            </div>
        </div>
    </div>
    <div class="zz-hero__stats">
        <div class="zz-hero__stat">
            <div class="zz-hero__stat-num" data-target="50">0</div>
            <div class="zz-hero__stat-plus">+</div>
            <div class="zz-hero__stat-label">Dishes</div>
        </div>
        <div class="zz-hero__stat">
            <div class="zz-hero__stat-num" data-target="4.8" data-decimal="true">0</div>
            <div class="zz-hero__stat-plus"><i class="fa fa-star"></i></div>
            <div class="zz-hero__stat-label">Rating</div>
        </div>
        <div class="zz-hero__stat">
            <div class="zz-hero__stat-num" data-target="30">0</div>
            <div class="zz-hero__stat-plus">min</div>
            <div class="zz-hero__stat-label">Delivery</div>
        </div>
        <div class="zz-hero__stat">
            <div class="zz-hero__stat-num" data-target="2500">0</div>
            <div class="zz-hero__stat-plus">+</div>
            <div class="zz-hero__stat-label">Orders</div>
        </div>
    </div>
    <div class="zz-hero__scroll">
        <div class="zz-hero__scroll-dot"></div>
    </div>
</section>

<!-- ========== HORIZONTAL CATEGORIES ========== -->
<section class="zz-cats">
    <div class="zz-container">
        <div class="zz-section-top">
            <div class="zz-section-top__left">
                <span class="zz-pill"><i class="fa fa-th-large"></i> Our Menu</span>
                <h2 class="zz-title">Browse By <span>Category</span></h2>
            </div>
            <a href="menu.php" class="zz-link">View All <i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div>
    <div class="zz-cats__track" id="catTrack">
        <a href="category.php?category=main" class="zz-cats__card">
            <div class="zz-cats__card-img"><img src="images/Main/rice-.jpg" alt="Main Dishes" loading="lazy"></div>
            <div class="zz-cats__card-body">
                <div class="zz-cats__card-icon"><i class="fa fa-cutlery"></i></div>
                <h3>Main Dishes</h3>
                <p>Rice & curry, hoppers, kottu and more</p>
                <span class="zz-cats__card-arrow"><i class="fa fa-arrow-right"></i></span>
            </div>
        </a>
        <a href="category.php?category=desserts" class="zz-cats__card">
            <div class="zz-cats__card-img"><img src="images/desserts/watalapn.jpg" alt="Desserts" loading="lazy"></div>
            <div class="zz-cats__card-body">
                <div class="zz-cats__card-icon"><i class="fa fa-birthday-cake"></i></div>
                <h3>Desserts</h3>
                <p>Watalappan, kavum & sweet treats</p>
                <span class="zz-cats__card-arrow"><i class="fa fa-arrow-right"></i></span>
            </div>
        </a>
        <a href="category.php?category=beverages" class="zz-cats__card">
            <div class="zz-cats__card-img"><img src="images/beverages/b-3.jpg" alt="Beverages" loading="lazy"></div>
            <div class="zz-cats__card-body">
                <div class="zz-cats__card-icon"><i class="fa fa-coffee"></i></div>
                <h3>Beverages</h3>
                <p>Ceylon tea, king coconut & juices</p>
                <span class="zz-cats__card-arrow"><i class="fa fa-arrow-right"></i></span>
            </div>
        </a>
    </div>
</section>

<!-- ========== LATEST PRODUCTS ========== -->
<section class="zz-products">
    <div class="zz-container">
        <div class="zz-section-top">
            <div class="zz-section-top__left">
                <span class="zz-pill"><i class="fa fa-bolt"></i> Fresh Arrivals</span>
                <h2 class="zz-title">Latest On The <span>Menu</span></h2>
            </div>
            <a href="menu.php" class="zz-link">Full Menu <i class="fa fa-long-arrow-right"></i></a>
        </div>
        <div class="zz-products__grid">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY id DESC LIMIT 4");
            $select_products->execute();
            if($select_products->rowCount() > 0){
                $idx = 0;
                while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
                    $idx++;
            ?>
            <form action="" method="post" class="zz-pcard" style="--i:<?= $idx; ?>">
                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="name" value="<?= htmlspecialchars($fetch_products['name']); ?>">
                <input type="hidden" name="price" value="<?= htmlspecialchars($fetch_products['price']); ?>">
                <input type="hidden" name="image" value="<?= htmlspecialchars($fetch_products['image']); ?>">
                <div class="zz-pcard__visual">
                    <img src="uploaded_img/<?= htmlspecialchars($fetch_products['image']); ?>" alt="<?= htmlspecialchars($fetch_products['name']); ?>" loading="lazy">
                    <span class="zz-pcard__tag">New</span>
                    <button type="submit" name="add_to_cart" class="zz-pcard__cart"><i class="fa fa-cart-plus"></i></button>
                </div>
                <div class="zz-pcard__info">
                    <span class="zz-pcard__cat"><?= htmlspecialchars(ucfirst($fetch_products['category'])); ?></span>
                    <h3 class="zz-pcard__name"><?= htmlspecialchars($fetch_products['name']); ?></h3>
                    <div class="zz-pcard__bottom">
                        <div class="zz-pcard__price">Rs. <?= number_format($fetch_products['price'], 2); ?></div>
                        <div class="zz-pcard__rating"><i class="fa fa-star"></i> 4.8</div>
                    </div>
                </div>
            </form>
            <?php
                }
            }else{
                echo '<p class="zz-empty">No products added yet!</p>';
            }
            ?>
        </div>
    </div>
</section>

<!-- ========== FEATURES / WHY US ========== -->
<section class="zz-why">
    <div class="zz-container">
        <div class="zz-section-top zz-section-top--center">
            <span class="zz-pill"><i class="fa fa-diamond"></i> Why Choose Us</span>
            <h2 class="zz-title">Why People <span>Love</span> CeylonBites</h2>
            <p class="zz-subtitle">From kitchen to your table — here's what makes us different</p>
        </div>
        <div class="zz-why__grid">
            <div class="zz-why__card">
                <div class="zz-why__card-glow"></div>
                <div class="zz-why__card-icon"><i class="fa fa-leaf"></i></div>
                <h3>Fresh Daily</h3>
                <p>Every ingredient sourced locally and prepared fresh each morning.</p>
                <span class="zz-why__card-num">01</span>
            </div>
            <div class="zz-why__card">
                <div class="zz-why__card-glow"></div>
                <div class="zz-why__card-icon"><i class="fa fa-truck"></i></div>
                <h3>30-Min Delivery</h3>
                <p>Lightning-fast delivery. Free shipping on orders above Rs. 2000.</p>
                <span class="zz-why__card-num">02</span>
            </div>
            <div class="zz-why__card">
                <div class="zz-why__card-glow"></div>
                <div class="zz-why__card-icon"><i class="fa fa-heart"></i></div>
                <h3>Made With Love</h3>
                <p>Traditional family recipes passed down through generations.</p>
                <span class="zz-why__card-num">03</span>
            </div>
            <div class="zz-why__card">
                <div class="zz-why__card-glow"></div>
                <div class="zz-why__card-icon"><i class="fa fa-shield"></i></div>
                <h3>100% Quality</h3>
                <p>Full satisfaction guaranteed on every single order we deliver.</p>
                <span class="zz-why__card-num">04</span>
            </div>
        </div>
    </div>
</section>

<!-- ========== POPULAR PICKS BANNER ========== -->
<section class="zz-banner">
    <div class="zz-banner__bg">
        <img src="images/Main/kottu.jpg" alt="Popular Picks" loading="lazy">
    </div>
    <div class="zz-banner__overlay"></div>
    <div class="zz-container">
        <div class="zz-banner__content">
            <span class="zz-pill zz-pill--light"><i class="fa fa-fire"></i> Most Popular</span>
            <h2>Signature Kottu Roti</h2>
            <p>Our #1 bestseller — crispy roti chopped with vegetables, egg, and aromatic spices. A must-try Sri Lankan classic.</p>
            <a href="category.php?category=main" class="zz-btn zz-btn--white"><i class="fa fa-cutlery"></i> Order This Dish</a>
        </div>
    </div>
</section>

<?php include 'user_footer.php'; ?>
<script src="js/home-script.js"></script>
</body>
</html>
