<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
  header('location:index.php');
};
// fetch current user details
$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

// handle profile update
if(isset($_POST['update_profile'])){
  $name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
  $number = filter_var($_POST['number'] ?? '', FILTER_SANITIZE_STRING);
  $address = filter_var($_POST['address'] ?? '', FILTER_SANITIZE_STRING);

  // ensure email/number uniqueness (excluding current user)
  $check_unique = $conn->prepare("SELECT id FROM `users` WHERE (email = ? OR number = ?) AND id != ?");
  $check_unique->execute([$email, $number, $user_id]);
  if($check_unique->rowCount() > 0){
    $message[] = 'Email or phone number already in use!';
  }else{
    $upd = $conn->prepare("UPDATE `users` SET name = ?, email = ?, number = ?, address = ? WHERE id = ?");
    $upd->execute([$name, $email, $number, $address, $user_id]);
    $message[] = 'Profile details updated!';
    // refresh fetch
    $select_user->execute([$user_id]);
    $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
  }
}

// handle password change
if(isset($_POST['update_password'])){
  $empty_hash = 'da39a3ee5e6b4b0d3255bfef95601890afd80709'; // sha1('')
  $old_pass = sha1($_POST['old_pass'] ?? '');
  $new_pass = sha1($_POST['new_pass'] ?? '');
  $confirm_pass = sha1($_POST['confirm_pass'] ?? '');

  // fetch current password
  $cur = $conn->prepare("SELECT password FROM `users` WHERE id = ?");
  $cur->execute([$user_id]);
  $prev = $cur->fetch(PDO::FETCH_ASSOC);
  $prev_pass = $prev ? $prev['password'] : '';

  if($old_pass == $empty_hash){
    $message[] = 'Please enter your current password!';
  }elseif($old_pass != $prev_pass){
    $message[] = 'Old password does not match!';
  }elseif($new_pass == $empty_hash){
    $message[] = 'Please enter a new password!';
  }elseif($new_pass != $confirm_pass){
    $message[] = 'Confirm password not matched!';
  }else{
    $upd = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
    $upd->execute([$confirm_pass, $user_id]);
    $message[] = 'Password updated successfully!';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Profile - ZestyZoomer</title>
  <link rel="icon" href="images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  <link href="css/navbar.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/home-style.css" rel="stylesheet">
  <link href="css/profile.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="profile-edit-page">
<?php include 'user_header.php'; ?>

<div class="container-topic">
  <h1 class="container-topic-heading">Edit Profile</h1>
  <p class="container-topic-sub">Update your personal information and password</p>
  </div>

<div class="container-fluid">
  <div class="container">
    <?php
    if(isset($message)){
      foreach($message as $msg){
        echo '<div class="message"><span>'.htmlspecialchars($msg).'</span></div>';
      }
    }
    ?>

    <section class="profile-edit">
      <div class="edit-grid">
        <form action="" method="post" class="edit-card">
          <h2 class="edit-title"><i class="fa fa-id-card"></i> Profile Details</h2>
          <div class="form-row">
            <label>Full Name</label>
            <input type="text" name="name" class="box" maxlength="50" required value="<?= htmlspecialchars($fetch_user['name'] ?? '') ?>">
          </div>
          <div class="form-row">
            <label>Email</label>
            <input type="email" name="email" class="box" maxlength="50" required value="<?= htmlspecialchars($fetch_user['email'] ?? '') ?>" oninput="this.value = this.value.replace(/\s/g, '')">
          </div>
          <div class="form-row">
            <label>Phone Number</label>
            <input type="text" name="number" class="box" maxlength="10" required value="<?= htmlspecialchars($fetch_user['number'] ?? '') ?>">
          </div>
          <div class="form-row">
            <label>Address</label>
            <textarea name="address" class="box" rows="3" maxlength="500" placeholder="House no, street, city, postal code"><?= htmlspecialchars($fetch_user['address'] ?? '') ?></textarea>
          </div>
          <button type="submit" name="update_profile" class="btn-primary-sl"><i class="fa fa-save"></i> Save Changes</button>
        </form>

        <form action="" method="post" class="edit-card">
          <h2 class="edit-title"><i class="fa fa-lock"></i> Change Password</h2>
          <div class="form-row">
            <label>Current Password</label>
            <input type="password" name="old_pass" class="box" maxlength="50" placeholder="Enter current password" oninput="this.value = this.value.replace(/\s/g, '')">
          </div>
          <div class="form-row">
            <label>New Password</label>
            <input type="password" name="new_pass" class="box" maxlength="50" placeholder="Enter new password" oninput="this.value = this.value.replace(/\s/g, '')">
          </div>
          <div class="form-row">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_pass" class="box" maxlength="50" placeholder="Confirm new password" oninput="this.value = this.value.replace(/\s/g, '')">
          </div>
          <button type="submit" name="update_password" class="btn-secondary-sl"><i class="fa fa-key"></i> Update Password</button>
        </form>
      </div>
    </section>
  </div>
</div>

<?php include 'user_footer.php'; ?>
</body>
</html>

