<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - ZestyZoomer</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="css/home-style.css" rel="stylesheet">
    <link href="css/pages-style.css" rel="stylesheet">
</head>
<body>
    <?php include 'user_header.php'; ?>
<!--topic starts-->
  <div class="container-topic">
           <h1 class="container-topic-heading">Contact Us</h1>
            </div>
     
  
<!--topic ends-->
	  <section class="container-fluid">
		<div class="container">
		  <div class="row">
			<div class="col-lg-6">
				<div class="contact-details">
					<h3>Contact Details</h3>
					<div id="line-contact-details"></div>
				</div>
				<div class="contact-icon" aria-label="Contact information">
					<div class="phone">
						<img src="images/phone.png" height="40" alt="Phone icon">
						<div class="phone-number">0774178387</div>
					</div>
					<div class="location">
						<img src="images/location.png" height="40" alt="Location icon">
						<div class="location-text">
							No:37/5 Haras Mavatha <br>
							Pitipana North <br>
							Homagama
						</div>
					</div>
					<div class="mail">
						<img src="images/mail.png" height="40" alt="Mail icon">
						<div class="mail-text">zestyzoomer@gmail.com</div>
					</div>
				</div>
				<div class="follow-us">
					<h3>Follow Us</h3>
					<div id="line-follow-us"></div>
				</div>

				<div class="icon-follow-us" aria-label="Social media links">
					<div class="facebook-icon">
						<a href="https://www.facebook.com/" target="_blank" rel="noopener">
							<img src="images/facebook.png" class="image-facebook" alt="Facebook">
						</a>
					</div>
					<div class="instagram-icon">
						<a href="https://www.instagram.com/" target="_blank" rel="noopener">
							<img src="images/instagram.png" class="image-instagram" alt="Instagram">
						</a>
					</div>
					<div class="pinterest-icon">
						<a href="https://www.pinterest.com/" target="_blank" rel="noopener">
							<img src="images/pinterest.png" class="image-pinterest" alt="Pinterest">
						</a>
					</div>
					<div class="youtube-icon">
						<a href="https://www.youtube.com/" target="_blank" rel="noopener">
							<img src="images/youtube.png" class="image-youtube" alt="YouTube">
						</a>
					</div>
				</div>
			  </div>

			<div class="col-lg-6">
			  <div class="contact-form">
				<h3 class="contact-form-heading">Send Us a Message</h3>
				<div id="line-contact-form"></div>
				<form action="#" method="post">
					<div class="form-group">
					  <label for="contactName">Name</label>
					  <input type="text" class="form-control" id="contactName" name="name" placeholder="Your Name" required>
					</div>
					<div class="form-group">
					  <label for="contactEmail">Email address</label>
					  <input type="email" class="form-control" id="contactEmail" name="email" placeholder="name@example.com" required>
					</div>
					<div class="form-group">
					  <label for="contactPhone">Phone</label>
					  <input type="tel" class="form-control" id="contactPhone" name="phone" placeholder="e.g. 0771234567">
					</div>
				   <div class="form-group">
					 <label for="contactMessage">Message</label>
					 <textarea id="contactMessage" name="message" class="form-control-1" rows="5" placeholder="Your Message" required></textarea>
					</div>
				   <button type="submit" class="btn btn-brand">Submit</button>
				  </form>
			  </div>
			</div>
		  </div>
		</div>
	  </section>
		  <!--contact ends-->

	 
	  
	  
	  
<?php include 'user_footer.php'; ?>
</body>
</html>