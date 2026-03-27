<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}

include 'add_cart.php';

if(isset($_POST['delete'])){
  $cart_id = (int)$_POST['cart_id'];
  $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ? AND user_id = ?");
  $delete_cart_item->execute([$cart_id, $user_id]);
  $message[] = 'cart item deleted!';
}

if(isset($_POST['delete_all'])){
  $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
  $delete_cart_item->execute([$user_id]);
  $message[] = 'deleted all from cart!';
}

if(isset($_POST['update_qty'])){
  $cart_id = (int)$_POST['cart_id'];
  $qty = (int)$_POST['qty'];
  if($qty < 1) $qty = 1;
  $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ? AND user_id = ?");
  $update_qty->execute([$qty, $cart_id, $user_id]);
  $message[] = 'cart quantity updated';
}

$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart - CeylonBites</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/v4-shims.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/home-style.css" rel="stylesheet">
    <link href="css/pages-style.css" rel="stylesheet">
</head>
<body>
    <?php include 'user_header.php'; ?>

    <?php
       $grand_total = 0;
       $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
       $select_cart->execute([$user_id]);
       $cart_count = $select_cart->rowCount();
    ?>

    <!-- Cart Hero Banner -->
    <section class="crt-hero">
        <div class="crt-hero__bg">
            <div class="crt-hero__pattern"></div>
        </div>
        <div class="crt-hero__content">
            <nav class="crt-breadcrumb">
                <a href="index.php">Home</a>
                <i class="fa-solid fa-chevron-right"></i>
                <a href="menu.php">Menu</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Cart</span>
            </nav>
            <h1 class="crt-hero__title">Shopping Cart</h1>
            <p class="crt-hero__desc">Review your items, adjust quantities, and proceed to checkout</p>
            <!-- Progress Steps -->
            <div class="crt-steps">
                <div class="crt-step crt-step--active">
                    <div class="crt-step__circle">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <span class="crt-step__label">Cart</span>
                </div>
                <div class="crt-step__line"></div>
                <div class="crt-step">
                    <div class="crt-step__circle">
                        <i class="fa-solid fa-credit-card"></i>
                    </div>
                    <span class="crt-step__label">Checkout</span>
                </div>
                <div class="crt-step__line"></div>
                <div class="crt-step">
                    <div class="crt-step__circle">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <span class="crt-step__label">Confirmation</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Content -->
    <section class="crt-section">
        <div class="crt-container">

            <?php if($cart_count > 0): ?>

            <div class="crt-layout">
                <!-- Cart Items Column -->
                <div class="crt-items-col">
                    <div class="crt-items-header">
                        <h2 class="crt-items-header__title">
                            <i class="fa-solid fa-bag-shopping"></i>
                            Your Items
                            <span class="crt-items-header__count"><?= $cart_count; ?></span>
                        </h2>
                        <form action="" method="post" class="crt-items-header__clear">
                            <button type="submit" class="crt-clear-all-link js-clear-cart" name="delete_all">
                                <i class="fa-regular fa-trash-can"></i> Clear All
                            </button>
                        </form>
                    </div>

                    <!-- Table header (desktop only) -->
                    <div class="crt-table-head">
                        <span class="crt-th crt-th--product">Product</span>
                        <span class="crt-th crt-th--price">Price</span>
                        <span class="crt-th crt-th--qty">Quantity</span>
                        <span class="crt-th crt-th--subtotal">Subtotal</span>
                        <span class="crt-th crt-th--action"></span>
                    </div>

                    <div class="cart-items">
                        <?php $item_index = 0; while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)): $item_index++; ?>
                        <div class="cart-item crt-card" id="item-<?= $fetch_cart['id']; ?>" data-cart-id="<?= $fetch_cart['id']; ?>" style="animation-delay: <?= $item_index * 0.08; ?>s">
                            <form action="" method="post" class="cart-item-form crt-card__inner" data-cart-id="<?= $fetch_cart['id']; ?>">
                                <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">

                                <!-- Product -->
                                <div class="crt-card__product">
                                    <div class="cart-item-image crt-card__img-wrap">
                                        <img src="uploaded_img/<?= htmlspecialchars($fetch_cart['image']); ?>" alt="<?= htmlspecialchars($fetch_cart['name']); ?>" loading="lazy">
                                    </div>
                                    <div class="cart-item-details crt-card__info">
                                        <h3 class="cart-item-name crt-card__name"><?= htmlspecialchars($fetch_cart['name']); ?></h3>
                                        <div class="crt-card__unit-label">Unit price</div>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="cart-item-price crt-card__price">
                                    <span class="crt-card__price-label">Price:</span>
                                    Rs.<?= number_format($fetch_cart['price']); ?>
                                </div>

                                <!-- Quantity -->
                                <div class="cart-item-controls crt-card__controls">
                                    <div class="quantity-control crt-qty" data-cart-id="<?= $fetch_cart['id']; ?>">
                                        <button type="button" class="qty-btn qty-decrease crt-qty__btn crt-qty__btn--minus" aria-label="Decrease Quantity">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <div class="qty-display crt-qty__display" id="qty-<?= $fetch_cart['id']; ?>"><?= $fetch_cart['quantity']; ?></div>
                                        <button type="button" class="qty-btn qty-increase crt-qty__btn crt-qty__btn--plus" aria-label="Increase Quantity">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <input type="hidden" name="qty" class="qty-input" value="<?= $fetch_cart['quantity']; ?>">
                                        <button type="submit" name="update_qty" style="display:none;" class="update-qty-btn"></button>
                                    </div>
                                </div>

                                <!-- Subtotal -->
                                <div class="cart-item-subtotal crt-card__subtotal" id="subtotal-<?= $fetch_cart['id']; ?>">
                                    <span class="crt-card__subtotal-label">Subtotal:</span>
                                    Rs.<?= $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>
                                </div>

                                <!-- Remove -->
                                <button type="submit" class="remove-btn js-remove-btn crt-card__remove" name="delete" onclick="return confirm('Remove this item from cart?');" title="Remove Item">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                        <?php
                           $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
                           endwhile;
                        ?>
                    </div>

                    <!-- Continue shopping link -->
                    <div class="crt-back-link">
                        <a href="menu.php">
                            <i class="fa-solid fa-arrow-left-long"></i> Continue Shopping
                        </a>
                    </div>
                </div>

                <!-- Cart Summary Column -->
                <div class="crt-summary-col">
                    <div class="cart-summary crt-summary" id="cart-summary">
                        <h3 class="crt-summary__title">
                            <i class="fa-solid fa-receipt"></i>
                            Order Summary
                        </h3>

                        <div class="crt-summary__details">
                            <div class="crt-summary__row">
                                <span>Subtotal (<?= $cart_count; ?> items)</span>
                                <span id="grand-total">Rs.<?= number_format($grand_total); ?></span>
                            </div>
                            <div class="crt-summary__row">
                                <span>Delivery</span>
                                <span class="crt-summary__free">Free</span>
                            </div>
                        </div>

                        <div class="crt-summary__total-bar">
                            <div class="crt-summary__row crt-summary__row--total">
                                <span>Total</span>
                                <strong id="grand-total-main">Rs.<?= number_format($grand_total); ?></strong>
                            </div>
                        </div>

                        <div class="crt-summary__actions">
                            <a href="checkout.php" class="crt-summary__checkout">
                                <span>Proceed to Checkout</span>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>

                        <div class="crt-summary__secure">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Secure Checkout — SSL Encrypted</span>
                        </div>

                        <div class="crt-summary__trust">
                            <div class="crt-trust-item">
                                <i class="fa-solid fa-truck-fast"></i>
                                <span>Fast Delivery</span>
                            </div>
                            <div class="crt-trust-item">
                                <i class="fa-solid fa-rotate-left"></i>
                                <span>Easy Returns</span>
                            </div>
                            <div class="crt-trust-item">
                                <i class="fa-solid fa-headset"></i>
                                <span>24/7 Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php else: ?>

            <div class="crt-empty">
                <div class="crt-empty__illustration">
                    <div class="crt-empty__circle"></div>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <h3 class="crt-empty__title">Your Cart is Empty</h3>
                <p class="crt-empty__desc">Looks like you haven't added any delicious items yet.<br>Explore our menu and discover amazing Sri Lankan flavors!</p>
                <a href="menu.php" class="crt-empty__btn">
                    <i class="fa-solid fa-utensils"></i> Browse Our Menu
                </a>
            </div>

            <?php endif; ?>

        </div>
    </section>

    <script src="js/cart.js"></script>

    <?php include 'user_footer.php'; ?>
</body>
</html>
