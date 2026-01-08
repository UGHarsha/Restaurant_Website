<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}

if(isset($_SESSION['admin_id'])){
   $admin_id = $_SESSION['admin_id'];
}else{
   $admin_id = '';
}

if(isset($_POST['submit'])){

   $login_identifier = trim(filter_var($_POST['email_or_name'] ?? '', FILTER_SANITIZE_EMAIL));
   $pass = sha1($_POST['pass'] ?? '');
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   if(!empty($login_identifier) && !empty($pass)){
     
      $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
      $select_admin->execute([$login_identifier, $pass]);

      if($select_admin->rowCount() > 0){
         $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
         $_SESSION['admin_id'] = $fetch_admin_id['id'];
         header('location:admin/products.php');
         exit;
      }

      // Fall back to customer login
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
      $select_user->execute([$login_identifier, $pass]);
      if($select_user->rowCount() > 0){
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
         $_SESSION['user_id'] = $row['id'];
         header('location:index.php');
         exit;
      }
   }

   $message[] = 'Incorrect email or password!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login - Food Delivery</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- login css file link  -->
   <link rel="stylesheet" href="css/login.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '
      <div class="message">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<div class="login-container">
   <div class="login-header">
      <h3>Welcome Back</h3>
      <p>Sign in with your email and password to continue.</p>
   </div>

   <form action="" method="post" class="login-form">
      <div class="form-group form-group--email">
         <input type="email" name="email_or_name" required placeholder="Enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <div class="form-group form-group--password">
         <input type="password" name="pass" required placeholder="Enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <button type="submit" name="submit" class="login-btn">
         Sign In
      </button>
   </form>

   <div class="login-footer">
      <p>New to our restaurant? <a href="register.php">Join our family</a></p>
      
   </div>
</div>
<!--  js file link  -->
<script src="js/script.js"></script>

</body>
</html>
