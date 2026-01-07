<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? OR number = ?");
   $select_user->execute([$email, $number]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'email or number already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, number, password) VALUES(?,?,?,?)");
         $insert_user->execute([$name, $email, $number, $cpass]);
         $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
         $select_user->execute([$email, $pass]);
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
         if($select_user->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
            header('location:index.php');
         }
      }
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register - Food Delivery</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- register css file link  -->
   <link rel="stylesheet" href="css/register.css">

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

<div class="register-container">
   <div class="register-header">
      <h3>Join Our Kitchen</h3>
      <p>Become part of our delicious food community</p>
   </div>

   <form action="" method="post" class="register-form">
      <div class="form-group">
         <i class="fas fa-user"></i>
         <input type="text" name="name" required placeholder="Enter your full name" maxlength="50">
      </div>

      <div class="form-group">
         <i class="fas fa-envelope"></i>
         <input type="email" name="email" required placeholder="Enter your email address" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <div class="form-group">
         <i class="fas fa-phone"></i>
         <input type="number" name="number" required placeholder="Enter your phone number" min="0" max="9999999999" maxlength="10">
      </div>

      <div class="form-group">
         <i class="fas fa-lock"></i>
         <input type="password" name="pass" required placeholder="Create a password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <div class="form-group">
         <i class="fas fa-lock"></i>
         <input type="password" name="cpass" required placeholder="Confirm your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <button type="submit" name="submit" class="register-btn">
         Join Our Family
      </button>
   </form>

   <div class="register-footer">
      <p>Already part of our family? <a href="login.php">Welcome back</a></p>
   </div>
</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
