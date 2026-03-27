<?php

include '../connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
   exit;
}

if(isset($_POST['delete_message'])){
   $delete_id = (int)$_POST['delete_id'];
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location:messages.php');
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include 'admin_header.php' ?>

<!-- messages section starts  -->

<section class="messages">

   <h1 class="heading">messages</h1>

   <div class="box-container">

   <?php
      $select_messages = $conn->prepare("SELECT * FROM `messages`");
      $select_messages->execute();
      if($select_messages->rowCount() > 0){
         while($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> name : <span><?= htmlspecialchars($fetch_messages['name']); ?></span> </p>
      <p> number : <span><?= htmlspecialchars($fetch_messages['number']); ?></span> </p>
      <p> email : <span><?= htmlspecialchars($fetch_messages['email']); ?></span> </p>
      <p> message : <span><?= htmlspecialchars($fetch_messages['message']); ?></span> </p>
      <form action="" method="post" style="display:inline;">
         <input type="hidden" name="delete_id" value="<?= $fetch_messages['id']; ?>">
         <button type="submit" name="delete_message" class="delete-btn" onclick="return confirm('delete this message?');">delete</button>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no messages</p>';
      }
   ?>

   </div>

</section>

<!-- messages section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>