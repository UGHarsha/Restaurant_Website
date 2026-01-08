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
    <title>My Profile - ZestyZoomer</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/home-style.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
</head>
<body class="profile-page">
    <?php include 'user_header.php'; ?>

    <!-- Profile Section -->
    <div class="container-topic">
        <h1 class="container-topic-heading">My Profile</h1>
    </div>
    <br>

    <div class="container-fluid">
        <div class="container">
            <section class="user-details">
                <?php
                $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_user->execute([$user_id]);
                if($select_user->rowCount() > 0){
                    $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="user-profile-box">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <i class="fa fa-user-circle"></i>
                        </div>
                        <h2><?= htmlspecialchars($fetch_user['name']); ?></h2>
                        <p class="user-email"><?= htmlspecialchars($fetch_user['email']); ?></p>
                    </div>
                    <div class="profile-actions">
                        <a href="update_profile.php" class="btn-primary-sl"><i class="fa fa-edit"></i> Edit Profile</a>
                        <a href="orders.php" class="btn-secondary-sl"><i class="fa fa-shopping-bag"></i> My Orders</a>
                        <a href="cart.php" class="btn-secondary-sl"><i class="fa fa-shopping-cart"></i> My Cart</a>
                    </div>
                </div>
                <?php
                }else{
                    echo '<p class="empty">Profile not found!</p>';
                }
                ?>
            </section>
        </div>
    </div>

    <?php include 'user_footer.php'; ?>
</body>
</html>