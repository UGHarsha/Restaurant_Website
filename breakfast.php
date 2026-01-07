
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
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Breakfast</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	    <link href="css/style.css" rel="stylesheet">
	<!-- font awesome cdn link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	   <link rel="icon" href="images/logo.png" type="image/x-icon">
  </head>
  <body>
  	<!-- body code goes here -->
<!-- header section starts -->
<?php include 'user_header.php'; ?>
<!-- header section ends -->
<!--topic starts-->
  <div class="container-topic">
           <h1 class="container-topic-heading">Breakfast</h1>
            </div>
  <br>
<!--topic ends-->
	  <!--classic breakfast starts-->
  <div class="container-fluid">
    <div class="container">
		<h1 align="center" class="welcome-b">Welcome to Our Breakfast Menu</h1>
		<p class="about-b" align="center">Start your day with our delicious and 
			<br>nutritious breakfast options.</p><br>
	
			<section class="products">

   <h1 class="title">Breakfast </h1>

   <div class="box-container">

     
   </div>

  

</section>
		
		
	  <!--classic Vegetarian ends-->
	  <br>
	  <!--contact starts-->
  <div class="container-fluid">
    <div class="container">
	  <div class="row">
	    <div class="col-lg-6">
	      <h2 class="about-q">Have a question or want to learn more about <font color="#8C0303">ZestyZoomer</font>?
			  <br>Contact us using this form:</h2></div>
	    <div class="col-lg-6">
	      <form>
		    <div class="form-group">
	          <label for="exampleInputName1">Name</label>
	          <input type="email" class="form-control" id="exampleInputName1" placeholder="Name">
	        </div>
	        <div class="form-group">
	          <label for="exampleInputEmail1">Email address</label>
	          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
	        </div>
	        <div class="form-group">
	          <label for="exampleInputPhone1">Phone</label>
	          <input type="email" class="form-control" id="exampleInputOhone1" placeholder="Phone">
            </div>
	       <div class="form-group">
             <label for="exampleInputMessage1">Message</label>
	         <textarea name="message" class="form-control-1" rows="5" placeholder="Your Message" required></textarea>

            </div>
	       <div> <a href="#" class="btn btn-primary">Submit</a></div>
			  <br>
          </form>
	    </div>
      </div>
    </div>
  </div>
	  <!--contact ends-->
  <!--footer starts-->
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
		<div class="heading-f">Contact</div>
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
<div class="copy">&copy; copyright &amp; Reserved 2024.</div>
	  <!--footer ends-->
	  
	  
	  
	  
	  
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.4.1.js"></script>
	  <script>
      $(document).ready(function () {
          // Handle dropdown menu toggle
          $('header .nav-bar ul li:has(ul)').click(function (e) {
              if ($(window).width() <= 991) {
                  e.stopPropagation();
                  $(this).find('ul').toggle();
              }
          });

          // Close the dropdown if clicked outside
          $(document).click(function (e) {
              if ($(window).width() <= 991) {
                  if (!$(e.target).closest('header').length) {
                      $('header .nav-bar ul li ul').hide();
                  }
              }
          });

          // Handle the menu-bar checkbox for toggling the nav bar
          $('#menu-bar').change(function () {
              if ($(this).is(':checked')) {
                  $('header .nav-bar').show();
              } else {
                  $('header .nav-bar').hide();
                  $('header .nav-bar ul li ul').hide();
              }
          });
      });
    </script>
  </body>
</html>