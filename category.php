<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'user_header.php'; ?>


<div class="container-topic">
           <h1 class="container-topic-heading">Our Menus</h1>
            </div>
  <br>
<!--topic ends-->
	  <!--classic breakfast starts-->
  <div class="container-fluid">
    <div class="container">
		<h1 align="center" class="welcome-b">Welcome to Our Foods Menu</h1>
		<p class="about-b" align="center">Start your day with our delicious and 
			<br>nutritious foods options.</p><br>
	   
   </div>

<section class="products">
   <div class="box-container">

      <?php
         $category = $_GET['category'];
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = ?");
         $select_products->execute([$category]);
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>

      
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
		 <input type="hidden" name="description" value="<?= $fetch_products['description']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">   
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <div class="name"><?= $fetch_products['name']; ?></div>
		 <div class="description" ><?= $fetch_products['description']; ?>"</div>
         <div class="flex">
            <div class="price"><span>Rs.</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

</section>



<footer>
	<div class="container-f">
	<div class="row">
	<div class="col-lg-4 col-md-6 square"><div class="logo-f"><span class="logo-1-f">Zesty</span><span class="logo-2-f">Zoomer</span></div>
		<br><p class="about" align="justify">ZestyZoomer provides quick, delectable, fresh meal delivery. Savor our extensive menu, which is freshly prepared at your door using premium ingredients. ZestyZoomer offers easy dining experiences!</p></div>
	<div class="col-lg-2 col-md-6 square">
	<div class="heading-f">Menu</div>
		<ul class="f-list">
			<br>
		<li><a href="breakfast.html">Breakfast</a></li>
			<li><a href="lunch.html">Lunch</a></li>
			<li><a href="dinner.html">Dinner</a></li>
			<li><a href="sides.html">Sides</a></li>
			<li><a href="desserts.html">Desserts</a></li>
			<li><a href="beverages.html">Beverages</a></li>
		</ul>
	</div>
	<div class="col-lg-2 col-md-6 square">
	<div class="heading-f-l">Links</div>
		<ul class="l-list">
			<br>
		<li><a href="index.html">Home</a></li>
			<li><a href="about us.html">About Us</a></li>
			<li><a href="blog.html">Blog</a></li>
			<li><a href="contact us.html">Contact Us</a></li>
		</ul>
	</div>
	<div class="col-lg-4 col-md-6 square">
		<div class="heading-f-c">Contact</div>
		<ul class="contact">
			<br>
		<li><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;+94 77 800 9658</li>
			<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;zestyzoomer@gmail.com</a></li>
		</ul>
	</div>
	</div>
		<ul class="social-media">
			<br>
			<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
		</ul>
	</div>
	
</footer>





<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>