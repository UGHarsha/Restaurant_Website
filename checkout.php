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

   $name = htmlspecialchars($_POST['name']);
   $number = $_POST['number'];
   $email = htmlspecialchars($_POST['email']);
   $method = htmlspecialchars($_POST['method']);
   $address = htmlspecialchars('flat no. '. $_POST['flat'].', '. $_POST['city']);
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
   }else{
      if($order_query->rowCount() > 0){
         $message[] = 'order already placed!'; 
      }else{
         $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
         $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $grand_total, $placed_on]);
         $message[] = 'order placed successfully!';

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
   <title>Checkout - ZestyZoomer</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/pages-style.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>

<div class="container-topic">
   <h1 class="container-topic-heading">Your Order Confirmation Process</h1>
</div>     

<section class="checkout-section">
   <?php
   $grand_total = 0;
   $cart_items = [];
   $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $select_cart->execute([$user_id]);
   if($select_cart->rowCount() > 0){
      while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
         $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].')';
         $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      }
      $total_products = implode(', ', $cart_items);
   ?>
   <div class="checkout-grid">
      <!-- Order Summary -->
      <aside class="order-summary">
         <h3 class="summary-title">Order Summary</h3>
         <ul class="summary-items">
            <?php
            $select_cart2 = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart2->execute([$user_id]);
            while($item = $select_cart2->fetch(PDO::FETCH_ASSOC)){
               $line_total = ($item['price'] * $item['quantity']);
            ?>
               <li class="summary-item">
                  <div class="item-info">
                     <span class="item-name"><?= htmlspecialchars($item['name']); ?></span>
                     <span class="item-meta">Rs.<?= $item['price']; ?> × <?= $item['quantity']; ?></span>
                  </div>
                  <div class="item-total">Rs.<?= $line_total; ?></div>
               </li>
            <?php } ?>
         </ul>
         <div class="summary-total">
            <span>Total</span>
            <strong id="checkout-grand">Rs.<?= $grand_total; ?></strong>
         </div>
      </aside>

      <!-- Checkout Form -->
      <form action="" method="post" class="checkout-form" autocomplete="on">
         <h3 class="form-title">Delivery & Payment</h3>
         <div class="form-grid">
            <div class="form-field">
               <label for="name">Full name</label>
               <input type="text" id="name" name="name" required placeholder="e.g., Sanduni Perera" maxlength="60">
            </div>
            <div class="form-field">
               <label for="number">Phone number</label>
               <input type="tel" id="number" name="number" required placeholder="e.g., 0712345678" pattern="[0-9]{9,10}" maxlength="10">
            </div>
            <div class="form-field">
               <label for="email">Email</label>
               <input type="email" id="email" name="email" required placeholder="you@example.com" maxlength="80">
            </div>
            <div class="form-field">
               <label for="method">Payment method</label>
               <select id="method" name="method">
                  <option value="cash on delivery">Cash on Delivery</option>
                  <option value="card payment">Card Payment</option>
               </select>
            </div>
            <div class="form-field">
               <label for="flat">Flat / House No.</label>
               <input type="text" id="flat" name="flat" required placeholder="e.g., 12A" maxlength="32">
            </div>
            <div class="form-field">
               <label for="city">City</label>
               <input type="text" id="city" name="city" required placeholder="e.g., Colombo" maxlength="48">
            </div>
            <div class="form-field">
               <label for="state">Street</label>
               <input type="text" id="state" name="state" required placeholder="e.g., Galle Road" maxlength="64">
            </div>
         </div>

         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>">

         <button type="submit" name="order_btn" class="btn-brand" style="width:100%;">Place Order</button>
      </form>
   </div>

   <?php } else { ?>
      <p>Your cart is empty.</p>
   <?php } ?>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
