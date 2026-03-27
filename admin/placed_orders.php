<?php

include '../connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
   exit;
}

if(isset($_POST['update_payment'])){

   $order_id = (int)$_POST['order_id'];
   $payment_status = htmlspecialchars(trim($_POST['payment_status']), ENT_QUOTES, 'UTF-8');
   $update_status = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_status->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';

}

if(isset($_POST['delete_order'])){
   $delete_id = (int)$_POST['delete_id'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include 'admin_header.php' ?>

<!-- placed orders section starts  -->

<section class="placed-orders">

   <h1 class="heading">placed orders</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> user id : <span><?= htmlspecialchars($fetch_orders['user_id']); ?></span> </p>
      <p> placed on : <span><?= htmlspecialchars($fetch_orders['placed_on']); ?></span> </p>
      <p> name : <span><?= htmlspecialchars($fetch_orders['name']); ?></span> </p>
      <p> email : <span><?= htmlspecialchars($fetch_orders['email']); ?></span> </p>
      <p> number : <span><?= htmlspecialchars($fetch_orders['number']); ?></span> </p>
      <p> address : <span><?= htmlspecialchars($fetch_orders['address']); ?></span> </p>
      <p> total products : <span><?= htmlspecialchars($fetch_orders['total_products']); ?></span> </p>
      <p> total price : <span>Rs.<?= htmlspecialchars($fetch_orders['total_price']); ?></span> </p>
      <p> payment method : <span><?= htmlspecialchars($fetch_orders['method']); ?></span> </p>
      <form action="" method="POST">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="drop-down">
            <option value="" selected disabled><?= htmlspecialchars($fetch_orders['payment_status']); ?></option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
         </select>
         <div class="flex-btn">
            <input type="submit" value="update" class="btn" name="update_payment">
         </div>
      </form>
      <form action="" method="POST" style="display:inline;">
         <input type="hidden" name="delete_id" value="<?= $fetch_orders['id']; ?>">
         <button type="submit" name="delete_order" class="delete-btn" onclick="return confirm('delete this order?');">delete</button>
      </form>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no orders placed yet!</p>';
   }
   ?>

   </div>

</section>

<!-- placed orders section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>