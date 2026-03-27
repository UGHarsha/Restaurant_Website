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
   $pass = $_POST['pass'] ?? '';

   $error_field = ''; // tracks which field has the error

   if(!empty($login_identifier) && !empty($pass)){
     
      $found_user = false;

      // Try admin login first
      $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ?");
      $select_admin->execute([$login_identifier]);

      if($select_admin->rowCount() > 0){
         $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
         $found_user = true;
         if(password_verify($pass, $fetch_admin_id['password'])){
            $_SESSION['admin_id'] = $fetch_admin_id['id'];
            session_regenerate_id(true);
            header('location:admin/products.php');
            exit;
         } else {
            $message[] = 'Incorrect password. Please try again.';
            $error_field = 'password';
         }
      }

      // Fall back to customer login
      if(!$found_user){
         $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
         $select_user->execute([$login_identifier]);
         if($select_user->rowCount() > 0){
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            $found_user = true;
            if(password_verify($pass, $row['password'])){
               $_SESSION['user_id'] = $row['id'];
               session_regenerate_id(true);
               header('location:index.php');
               exit;
            } else {
               $message[] = 'Incorrect password. Please try again.';
               $error_field = 'password';
            }
         }
      }

      if(!$found_user){
         $message[] = 'No account found with this email address.';
         $error_field = 'email';
      }
   } else {
      $message[] = 'Please fill in all fields.';
   }
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
      $icon = 'fa-circle-exclamation';
      if(isset($error_field) && $error_field === 'email') $icon = 'fa-envelope';
      if(isset($error_field) && $error_field === 'password') $icon = 'fa-lock';
      echo '
      <div class="message">
         <span><i class="fas '.$icon.'"></i> '.$msg.'</span>
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
      <div class="form-group form-group--email <?= (isset($error_field) && $error_field === 'email') ? 'form-group--error' : '' ?>">
         <input type="email" name="email_or_name" required placeholder="Enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= htmlspecialchars($login_identifier ?? ''); ?>">
         <?php if(isset($error_field) && $error_field === 'email'): ?>
            <span class="field-error"><i class="fas fa-exclamation-circle"></i> No account found with this email</span>
         <?php endif; ?>
      </div>

      <div class="form-group form-group--password <?= (isset($error_field) && $error_field === 'password') ? 'form-group--error' : '' ?>">
         <input type="password" name="pass" required placeholder="Enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
         <?php if(isset($error_field) && $error_field === 'password'): ?>
            <span class="field-error"><i class="fas fa-exclamation-circle"></i> Password is incorrect</span>
         <?php endif; ?>
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
