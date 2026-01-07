<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:index.php');
};

include 'cart.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zesty Zoomer</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	  <link href="css/style.css" rel="stylesheet">
	<!-- font awesome cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	  <link rel="icon" href="images/logo.png" type="image/x-icon">
  </head>
  <body>
  	<!-- body code goes here -->

    <?php include 'user_header.php';

    ?>
<!-- header section starts -->
<header>
  <h1><a href="index.html" class="logo"><span class="logo-1">Zesty</span><span class="logo-2">Zoomer</span></a></h1>
  <div class="nav-controls">
    <a href="#"><label for="cart-1" class="cart-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></a>
    <a href="#"><label for="login-1" class="login-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></label></a>
    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="menu-icon"><i class="fa fa-bars"></i></label>
  </div>
  <nav class="nav-bar">
    <ul>
      <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <li><a href="about us.html"><i class="fa fa-user" aria-hidden="true"></i> About Us</a></li>
      <li><a href="#"><i class="fa fa-edit" aria-hidden="true"></i> Menu &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
        <ul class="dropdown">
          <li><a href="breakfast.html">Breakfast</a></li>
          <li><a href="lunch.html">Lunch</a></li>
          <li><a href="dinner.html">Dinner</a></li>
          <li><a href="sides.html">Sides</a></li>
          <li><a href="desserts.html">Desserts</a></li>
          <li><a href="beverages.html">Beverages</a></li>
        </ul>
      </li>
      <li><a href="blog.html"><i class="fa fa-clone" aria-hidden="true"></i> Blog</a></li>
      <li><a href="q and a.html"><i class="fa fa-question" aria-hidden="true"></i> Q&amp;A</a></li>
      <li><a href="contact us.html"><i class="fa fa-phone" aria-hidden="true"></i><b> Contact Us</b></a></li>
      <div class="nav-icons" align="right">
        <a href="cart.html"><span class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
        <a href="#"><span class="login"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span></a>
      </div>
    </ul>
  </nav>
</header>
