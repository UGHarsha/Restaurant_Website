<?php

include 'connect.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:user_header.php');
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
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>

<div class="container-topic">
   <h1 class="container-topic-heading">Your Order Confirmation Process</h1>
</div>     

<section class="checkout">
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

   <p><strong>Grand Total:</strong> RS.<?= $grand_total; ?></p>
   

   <form action="" method="post">
      <h3>Place your order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your full name :</span>
            <input type="text" name="name" required placeholder="Enter your full name">
         </div>
         <div class="inputBox">
            <span>Your phone number :</span>
            <input type="number" name="number" required placeholder="Enter your phone number">
         </div>
         <div class="inputBox">
            <span>Your email :</span>
            <input type="email" name="email" required placeholder="Enter your email">
         </div>
         <div class="inputBox">
            <span>Payment method :</span>
            <select name="method">
               <option value="cash on delivery">Cash on Delivery</option>
               <option value="card payment">Card Payment</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address :</span>
            <input type="text" name="flat" required placeholder="Flat no.">
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="text" name="city" required placeholder="City">
         </div>
         <div class="inputBox">
            <span>Street :</span>
            <input type="text" name="state" required placeholder="Street">
         </div>
      </div>
      
      <input type="hidden" name="total_products" value="<?= $total_products; ?>">
      <input type="hidden" name="total_price" value="<?= $grand_total; ?>">

      <input type="submit" name="order_btn" value="Place Order" class="btn">
   </form>
   
   <?php } else { ?>
      <p>Your cart is empty.</p>
   <?php } ?>

</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
