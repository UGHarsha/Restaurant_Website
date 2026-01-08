<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'add_cart.php';

if(isset($_POST['delete'])){
  $cart_id = $_POST['cart_id'];
  $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
  $delete_cart_item->execute([$cart_id]);
  $message[] = 'cart item deleted!';
}

if(isset($_POST['delete_all'])){
  $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
  $delete_cart_item->execute([$user_id]);
  // header('location:cart.php');
  $message[] = 'deleted all from cart!';
}

if(isset($_POST['update_qty'])){
  $cart_id = $_POST['cart_id'];
  $qty = $_POST['qty'];
  $qty = filter_var($qty, FILTER_SANITIZE_STRING);
  $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
  $update_qty->execute([$qty, $cart_id]);
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
    <title>Shopping Cart - ZestyZoomer</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/home-style.css" rel="stylesheet">
    <link href="css/pages-style.css" rel="stylesheet">
</head>
<body>
    <?php include 'user_header.php'; ?>
    
    <!-- Cart Header -->
    <div class="container-topic">
        <h1 class="container-topic-heading">Shopping Cart</h1>
    </div>

    <!-- Cart Content -->
    <section class="container cart-section">
        <div class="cart-items"><?php
         $grand_total = 0;
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
      ?>
            <div class="cart-item" id="item-<?= $fetch_cart['id']; ?>" data-cart-id="<?= $fetch_cart['id']; ?>">
                <form action="" method="post" class="cart-item-form" data-cart-id="<?= $fetch_cart['id']; ?>">
                    <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                    
                    <div class="cart-item-image">
                        <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="<?= htmlspecialchars($fetch_cart['name']); ?>">
                        <button type="submit" class="remove-btn js-remove-btn" name="delete" onclick="return confirm('Remove this item from cart?');" title="Remove Item">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    
                    <div class="cart-item-details">
                        <h3 class="cart-item-name"><?= htmlspecialchars($fetch_cart['name']); ?></h3>
                        <div class="cart-item-price">Rs.<?= $fetch_cart['price']; ?></div>
                    </div>
                    
                    <div class="cart-item-controls">
                        <div class="quantity-control" data-cart-id="<?= $fetch_cart['id']; ?>">
                            <button type="button" class="qty-btn qty-decrease" aria-label="Decrease Quantity">−</button>
                            <div class="qty-display" id="qty-<?= $fetch_cart['id']; ?>"><?= $fetch_cart['quantity']; ?></div>
                            <button type="button" class="qty-btn qty-increase" aria-label="Increase Quantity">+</button>
                            <input type="hidden" name="qty" class="qty-input" value="<?= $fetch_cart['quantity']; ?>">
                            <button type="submit" name="update_qty" style="display:none;" class="update-qty-btn"></button>
                        </div>
                        
                        <div class="cart-item-subtotal" id="subtotal-<?= $fetch_cart['id']; ?>">
                            Rs.<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>
                        </div>
                    </div>
                </form>
            </div><?php
               $grand_total += $sub_total;
            }
         }else{
            echo '<div class="empty-cart">
                    <i class="fa fa-shopping-cart"></i>
                    <h3>Your cart is empty</h3>
                    <p>Add some delicious items to get started!</p>
                    <a href="menu.php" class="btn btn-brand">Browse Menu</a>
                  </div>';
         }
      ?></div>

        <?php if($grand_total > 0): ?>
        <!-- Cart Summary -->
        <div class="cart-summary" id="cart-summary">
            <div class="cart-total">
                <h3>Order Total</h3>
                <div class="total-line">
                    <span class="total-label">Total:</span>
                    <span class="total-amount" id="grand-total">Rs.<?= $grand_total; ?></span>
                </div>
            </div>
                
            <div class="cart-actions">
                <a href="checkout.php" class="checkout-btn">
                    <i class="fa fa-credit-card"></i> Proceed to Checkout
                </a>
                
                <div class="secondary-actions">
                    <form action="" method="post" class="clear-cart-form">
                        <button type="submit" class="clear-btn js-clear-cart" name="delete_all" onclick="return confirm('Clear entire cart?');">
                            <i class="fa fa-trash"></i> 
                        </button>
                    </form>
                    
                    <a href="menu.php" class="continue-btn">
                        <i class="fa fa-arrow-left"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <script src="js/cart.js"></script>
    </section>

<?php include 'user_footer.php'; ?>
</body>
</html>