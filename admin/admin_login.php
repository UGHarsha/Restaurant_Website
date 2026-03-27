<?php

include '../connect.php';

session_start();

if(isset($_SESSION['admin_id'])){
   header('location:products.php');
   exit;
}

if(isset($_POST['submit'])){

   $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
   $pass = $_POST['pass'];

   $error_field = '';

   if(!empty($name) && !empty($pass)){
      $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ?");
      $select_admin->execute([$name]);

      if($select_admin->rowCount() > 0){
         $fetch_admin = $select_admin->fetch(PDO::FETCH_ASSOC);
         if(password_verify($pass, $fetch_admin['password'])){
            $_SESSION['admin_id'] = $fetch_admin['id'];
            session_regenerate_id(true);
            header('location:products.php');
            exit;
         } else {
            $message[] = 'Incorrect password. Please try again.';
            $error_field = 'password';
         }
      } else {
         $message[] = 'No admin account found with this username.';
         $error_field = 'username';
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
   <title>Admin Login</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $msg){
      $icon = 'fa-circle-exclamation';
      if(isset($error_field) && $error_field === 'username') $icon = 'fa-user';
      if(isset($error_field) && $error_field === 'password') $icon = 'fa-lock';
      echo '
      <div class="message admin-error-msg">
         <span><i class="fas '.$icon.'"></i> '.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<section class="form-container">
   <form action="" method="POST">
      <h3>Admin Login</h3>
      <div class="admin-field <?= (isset($error_field) && $error_field === 'username') ? 'admin-field--error' : '' ?>">
         <input type="text" name="name" maxlength="20" required placeholder="enter your username" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= htmlspecialchars($name ?? ''); ?>">
         <?php if(isset($error_field) && $error_field === 'username'): ?>
            <span class="admin-field-error"><i class="fas fa-exclamation-circle"></i> Username not found</span>
         <?php endif; ?>
      </div>
      <div class="admin-field <?= (isset($error_field) && $error_field === 'password') ? 'admin-field--error' : '' ?>">
         <input type="password" name="pass" maxlength="20" required placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <?php if(isset($error_field) && $error_field === 'password'): ?>
            <span class="admin-field-error"><i class="fas fa-exclamation-circle"></i> Password is incorrect</span>
         <?php endif; ?>
      </div>
      <input type="submit" value="login now" name="submit" class="btn">
   </form>
</section>

</body>
</html>
