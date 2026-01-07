<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:index.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Orders - ZestyZoomer</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/home-style.css" rel="stylesheet">
</head>
<body>
    <!-- header section starts -->
    <?php include 'user_header.php'; ?>
    <!-- header section ends -->

    <!-- orders section starts -->
    <div class="container-topic">
        <h1 class="container-topic-heading">My Orders</h1>
    </div>
    <br>

    <div class="container-fluid">
        <div class="container">
            <section class="orders">
                <h1 class="heading" align="center">Your Orders</h1>
                <div class="box-container">
                    <?php
                    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ? ORDER BY id DESC");
                    $select_orders->execute([$user_id]);
                    if($select_orders->rowCount() > 0){
                        while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="box">
                        <p>Order ID: <span><?= $fetch_orders['id']; ?></span></p>
                        <p>Placed on: <span><?= $fetch_orders['placed_on']; ?></span></p>
                        <p>Name: <span><?= $fetch_orders['name']; ?></span></p>
                        <p>Email: <span><?= $fetch_orders['email']; ?></span></p>
                        <p>Number: <span><?= $fetch_orders['number']; ?></span></p>
                        <p>Address: <span><?= $fetch_orders['address']; ?></span></p>
                        <p>Payment Method: <span><?= $fetch_orders['method']; ?></span></p>
                        <p>Your Orders: <span><?= $fetch_orders['total_products']; ?></span></p>
                        <p>Total Price: <span>Rs.<?= $fetch_orders['total_price']; ?></span></p>
                        <p>Payment Status: <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span></p>
                    </div>
                    <?php
                        }
                    }else{
                        echo '<p class="empty" align="center">No orders placed yet!</p>';
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>

    <?php include 'user_footer.php'; ?>
</body>
</html>