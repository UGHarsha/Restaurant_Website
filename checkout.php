<?php

include 'connect.php';

session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if($user_id === null){
   // Redirect unauthenticated users to login page
   header('location:login.php');
   exit;
}

if(isset($_POST['order_btn'])){

   $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
   $number = htmlspecialchars(trim($_POST['number']), ENT_QUOTES, 'UTF-8');
   $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
   $method = htmlspecialchars(trim($_POST['method']), ENT_QUOTES, 'UTF-8');
   $address = htmlspecialchars('flat no. '. trim($_POST['flat']).', '. trim($_POST['city']), ENT_QUOTES, 'UTF-8');
   $placed_on = date('d-M-Y');

   $grand_total = 0;
   $cart_products = [];

   $cart_query = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $cart_query->execute([$user_id]);

   if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $grand_total += $sub_total;
      }
   } 

   $total_products = implode(', ', $cart_products);

   $order_query = $conn->prepare("SELECT * FROM `orders` WHERE name = ? AND number = ? AND email = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?");
   $order_query->execute([$name, $number, $email, $method, $address, $total_products, $grand_total]);

   if($grand_total == 0){
      $message[] = 'your cart is empty';
      $order_success = false;
   }else{
      if($order_query->rowCount() > 0){
         $message[] = 'order already placed!';
         $order_success = false;
      }else{
         $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
         $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $grand_total, $placed_on]);

         // Save order info for confirmation display
         $order_success = true;
         $order_info = [
            'name'     => $name,
            'email'    => $email,
            'address'  => $address,
            'method'   => $method,
            'total'    => $grand_total,
            'products' => $total_products,
            'date'     => $placed_on,
            'order_id' => $conn->lastInsertId()
         ];

         $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
         $delete_cart->execute([$user_id]);
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout - CeylonBites</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/navbar.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/pages-style.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>

<?php if(isset($message)): ?>
   <?php foreach($message as $msg): ?>
      <div class="message" style="position:fixed;top:20px;left:50%;transform:translateX(-50%);z-index:10000;">
         <span><?= $msg; ?></span>
         <i class="fas fa-times" onclick="this.parentElement.remove();" style="cursor:pointer;margin-left:12px;"></i>
      </div>
   <?php endforeach; ?>
<?php endif; ?>

<?php if(isset($order_success) && $order_success === true): ?>
<!-- ═══ ORDER CONFIRMATION OVERLAY ═══ -->
<div class="confirm-overlay" id="confirmOverlay">
   <div class="confirm-card">
      <div class="confirm-check">
         <svg class="confirm-check__svg" viewBox="0 0 52 52">
            <circle class="confirm-check__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="confirm-check__tick" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
         </svg>
      </div>
      <h2 class="confirm-title">Order Confirmed!</h2>
      <p class="confirm-subtitle">Thank you, <strong><?= htmlspecialchars($order_info['name']); ?></strong>. Your order has been placed successfully.</p>
      <div class="confirm-details">
         <div class="confirm-row">
            <span class="confirm-label"><i class="fas fa-hashtag"></i> Order ID</span>
            <span class="confirm-value">#<?= str_pad($order_info['order_id'], 5, '0', STR_PAD_LEFT); ?></span>
         </div>
         <div class="confirm-row">
            <span class="confirm-label"><i class="fas fa-calendar"></i> Date</span>
            <span class="confirm-value"><?= $order_info['date']; ?></span>
         </div>
         <div class="confirm-row">
            <span class="confirm-label"><i class="fas fa-utensils"></i> Items</span>
            <span class="confirm-value confirm-value--items"><?= htmlspecialchars($order_info['products']); ?></span>
         </div>
         <div class="confirm-row">
            <span class="confirm-label"><i class="fas fa-map-marker-alt"></i> Delivery</span>
            <span class="confirm-value"><?= htmlspecialchars($order_info['address']); ?></span>
         </div>
         <div class="confirm-row">
            <span class="confirm-label"><i class="fas fa-wallet"></i> Payment</span>
            <span class="confirm-value" style="text-transform:capitalize;"><?= htmlspecialchars($order_info['method']); ?></span>
         </div>
         <div class="confirm-row">
            <span class="confirm-label"><i class="fas fa-envelope"></i> Email</span>
            <span class="confirm-value"><?= htmlspecialchars($order_info['email']); ?></span>
         </div>
         <div class="confirm-row confirm-row--total">
            <span class="confirm-label"><i class="fas fa-receipt"></i> Total Paid</span>
            <span class="confirm-value confirm-value--total">Rs.<?= number_format($order_info['total']); ?></span>
         </div>
      </div>
      <div class="confirm-message">
         <i class="fas fa-truck-fast"></i>
         <span>Your food is being prepared and will be delivered soon!</span>
      </div>
      <div class="confirm-actions">
         <a href="orders.php" class="confirm-btn confirm-btn--primary">
            <i class="fas fa-shopping-bag"></i> View My Orders
         </a>
         <a href="menu.php" class="confirm-btn confirm-btn--secondary">
            <i class="fas fa-utensils"></i> Continue Shopping
         </a>
      </div>
   </div>
</div>
<?php endif; ?>

<!-- Checkout Page -->
<section class="chk">
   <div class="chk__container">

      <!-- Back button -->
      <a href="cart.php" class="chk__back">
         <i class="fas fa-arrow-left"></i>
         <span>Back to Cart</span>
      </a>

      <?php
      $grand_total = 0;
      $cart_items = [];
      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart->execute([$user_id]);
      if($select_cart->rowCount() > 0){
         $cart_rows = $select_cart->fetchAll(PDO::FETCH_ASSOC);
         foreach($cart_rows as $fetch_cart){
            $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].')';
            $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
         }
         $total_products = implode(', ', $cart_items);
      ?>

      <!-- Page Title -->
      <div class="chk__header">
         <h1 class="chk__title">Checkout</h1>
         <p class="chk__subtitle"><?= count($cart_rows); ?> item<?= count($cart_rows) > 1 ? 's' : ''; ?> · Rs.<?= number_format($grand_total); ?></p>
      </div>

      <div class="chk__grid">

         <!-- Left: Form -->
         <form action="" method="post" class="chk__form" id="checkoutForm" autocomplete="on">

            <!-- Delivery Info -->
            <div class="chk__section">
               <h3 class="chk__section-title">
                  <span class="chk__section-num">1</span>
                  Delivery Information
               </h3>
               <div class="chk__fields">
                  <div class="chk__field chk__field--half">
                     <label for="name">Full Name</label>
                     <input type="text" id="name" name="name" required placeholder="Sanduni Perera" maxlength="60">
                  </div>
                  <div class="chk__field chk__field--half">
                     <label for="number">Phone</label>
                     <input type="tel" id="number" name="number" required placeholder="0712345678" pattern="[0-9]{9,10}" maxlength="10">
                  </div>
                  <div class="chk__field">
                     <label for="email">Email</label>
                     <input type="email" id="email" name="email" required placeholder="you@example.com" maxlength="80">
                  </div>
               </div>
            </div>

            <!-- Address -->
            <div class="chk__section">
               <h3 class="chk__section-title">
                  <span class="chk__section-num">2</span>
                  Delivery Address
               </h3>
               <div class="chk__fields">
                  <div class="chk__field chk__field--half">
                     <label for="flat">Flat / House No.</label>
                     <input type="text" id="flat" name="flat" required placeholder="12A" maxlength="32">
                  </div>
                  <div class="chk__field chk__field--half">
                     <label for="state">Street</label>
                     <input type="text" id="state" name="state" required placeholder="Galle Road" maxlength="64">
                  </div>
                  <div class="chk__field">
                     <label for="city">City</label>
                     <input type="text" id="city" name="city" required placeholder="Colombo" maxlength="48">
                  </div>
               </div>
            </div>

            <!-- Payment -->
            <div class="chk__section">
               <h3 class="chk__section-title">
                  <span class="chk__section-num">3</span>
                  Payment Method
               </h3>
               <div class="chk__payment-options">
                  <label class="chk__payment-opt chk__payment-opt--active" id="opt-cod">
                     <input type="radio" name="method" value="cash on delivery" checked>
                     <div class="chk__payment-icon"><i class="fas fa-money-bill-wave"></i></div>
                     <div class="chk__payment-text">
                        <span class="chk__payment-name">Cash on Delivery</span>
                        <span class="chk__payment-desc">Pay when your order arrives</span>
                     </div>
                     <span class="chk__payment-check"><i class="fas fa-check"></i></span>
                  </label>
                  <label class="chk__payment-opt" id="opt-card">
                     <input type="radio" name="method" value="card payment">
                     <div class="chk__payment-icon"><i class="fas fa-credit-card"></i></div>
                     <div class="chk__payment-text">
                        <span class="chk__payment-name">Card Payment</span>
                        <span class="chk__payment-desc">Visa, MasterCard, Amex</span>
                     </div>
                     <span class="chk__payment-check"><i class="fas fa-check"></i></span>
                  </label>
               </div>
            </div>

            <input type="hidden" name="total_products" value="<?= $total_products; ?>">
            <input type="hidden" name="total_price" value="<?= $grand_total; ?>">
            <input type="hidden" name="order_btn" value="1">

            <!-- Place Order (mobile visible) -->
            <div class="chk__mobile-submit">
               <div class="chk__mobile-total">
                  <span>Total</span>
                  <strong>Rs.<?= number_format($grand_total); ?></strong>
               </div>
               <button type="submit" class="chk__place-btn">
                  <span>Place Order</span> <i class="fas fa-arrow-right"></i>
               </button>
            </div>
         </form>

         <!-- Right: Summary -->
         <aside class="chk__summary">
            <h3 class="chk__summary-title">Order Summary</h3>

            <div class="chk__summary-items">
               <?php foreach($cart_rows as $item):
                  $line_total = ($item['price'] * $item['quantity']);
               ?>
               <div class="chk__summary-item">
                  <div class="chk__item-img">
                     <img src="uploaded_img/<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['name']); ?>">
                     <span class="chk__item-qty"><?= $item['quantity']; ?></span>
                  </div>
                  <div class="chk__item-info">
                     <span class="chk__item-name"><?= htmlspecialchars($item['name']); ?></span>
                     <span class="chk__item-meta">Rs.<?= number_format($item['price']); ?> × <?= $item['quantity']; ?></span>
                  </div>
                  <span class="chk__item-total">Rs.<?= number_format($line_total); ?></span>
               </div>
               <?php endforeach; ?>
            </div>

            <div class="chk__summary-lines">
               <div class="chk__summary-line">
                  <span>Subtotal</span>
                  <span>Rs.<?= number_format($grand_total); ?></span>
               </div>
               <div class="chk__summary-line">
                  <span>Delivery</span>
                  <span class="chk__free-tag">Free</span>
               </div>
            </div>

            <div class="chk__summary-total">
               <span>Total</span>
               <strong>Rs.<?= number_format($grand_total); ?></strong>
            </div>

            <button type="submit" form="checkoutForm" class="chk__place-btn chk__place-btn--desk">
               <span>Place Order</span> <i class="fas fa-arrow-right"></i>
            </button>

            <div class="chk__secure">
               <i class="fas fa-shield-halved"></i> Secure checkout
            </div>
         </aside>

      </div>

      <?php } else { ?>
         <div class="chk__empty">
            <i class="fas fa-cart-shopping"></i>
            <h3>Your cart is empty</h3>
            <p>Add some items before checking out.</p>
            <a href="menu.php" class="chk__empty-btn"><i class="fas fa-utensils"></i> Browse Menu</a>
         </div>
      <?php } ?>

   </div>
</section>

<?php include 'user_footer.php'; ?>
<script src="js/script.js"></script>
<script>
// Payment method toggle
document.querySelectorAll('.chk__payment-opt input[type="radio"]').forEach(radio => {
   radio.addEventListener('change', () => {
      document.querySelectorAll('.chk__payment-opt').forEach(o => o.classList.remove('chk__payment-opt--active'));
      radio.closest('.chk__payment-opt').classList.add('chk__payment-opt--active');
   });
});
</script>

</body>
</html>
