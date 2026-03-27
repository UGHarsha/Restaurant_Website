<?php
include 'connect.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if(isset($_POST['send_message'])){
   $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
   $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
   $phone = htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8');
   $msg = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

   if(!empty($name) && !empty($email) && !empty($msg)){
      $insert = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert->execute([$user_id, $name, $email, $phone, $msg]);
      $message[] = 'Message sent successfully!';
   }else{
      $message[] = 'Please fill in all required fields.';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - CeylonBites</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="css/navbar.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/pages-style.css" rel="stylesheet">
</head>
<body>
    <?php include 'user_header.php'; ?>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '<div class="message"><span>'.$msg.'</span><i class="fa fa-times" onclick="this.parentElement.remove();"></i></div>';
   }
}
?>

<div class="container-topic">
    <h1 class="container-topic-heading">Contact Us</h1>
</div>

<!-- Contact Page Content -->
<section class="contact-page">
    <div class="contact-wrapper">
        <!-- Left: Contact Info -->
        <div class="contact-info-card">
            <h3 class="contact-info-title"><i class="fa fa-address-book"></i> Contact Details</h3>
            <div class="contact-info-list">
                <div class="contact-info-item">
                    <div class="contact-info-icon"><i class="fa fa-phone"></i></div>
                    <div>
                        <span class="contact-info-label">Phone</span>
                        <span class="contact-info-value">0774178387</span>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-icon"><i class="fa fa-map-marker"></i></div>
                    <div>
                        <span class="contact-info-label">Address</span>
                        <span class="contact-info-value">No:37/5 Haras Mavatha, Pitipana North, Homagama</span>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-icon"><i class="fa fa-envelope"></i></div>
                    <div>
                        <span class="contact-info-label">Email</span>
                        <span class="contact-info-value">ceylonbites@gmail.com</span>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-icon"><i class="fa fa-clock-o"></i></div>
                    <div>
                        <span class="contact-info-label">Working Hours</span>
                        <span class="contact-info-value">Mon - Sun: 9:00 AM - 10:00 PM</span>
                    </div>
                </div>
            </div>

            <h4 class="contact-social-title">Follow Us</h4>
            <div class="contact-social-links">
                <a href="https://www.facebook.com/" target="_blank" rel="noopener" class="contact-social-btn"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener" class="contact-social-btn"><i class="fa fa-instagram"></i></a>
                <a href="https://www.pinterest.com/" target="_blank" rel="noopener" class="contact-social-btn"><i class="fa fa-pinterest"></i></a>
                <a href="https://www.youtube.com/" target="_blank" rel="noopener" class="contact-social-btn"><i class="fa fa-youtube"></i></a>
            </div>
        </div>

        <!-- Right: Contact Form -->
        <div class="contact-form-card">
            <h3 class="contact-form-title"><i class="fa fa-paper-plane"></i> Send Us a Message</h3>
            <form action="" method="post" class="contact-form-fields">
                <div class="form-group">
                    <label for="contactName"><i class="fa fa-user"></i> Name</label>
                    <input type="text" class="form-control" id="contactName" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="contactEmail"><i class="fa fa-envelope"></i> Email address</label>
                    <input type="email" class="form-control" id="contactEmail" name="email" placeholder="name@example.com" required>
                </div>
                <div class="form-group">
                    <label for="contactPhone"><i class="fa fa-phone"></i> Phone</label>
                    <input type="tel" class="form-control" id="contactPhone" name="phone" placeholder="e.g. 0771234567">
                </div>
                <div class="form-group">
                    <label for="contactMessage"><i class="fa fa-comment"></i> Message</label>
                    <textarea id="contactMessage" name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" name="send_message" class="contact-submit-btn"><i class="fa fa-send"></i> Send Message</button>
            </form>
        </div>
    </div>
</section>
<!--contact ends-->
	  
<?php include 'user_footer.php'; ?>
</body>
</html>