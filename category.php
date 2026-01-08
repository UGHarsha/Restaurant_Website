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
	<title>Category - ZestyZoomer</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/navbar.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/home-style.css">
   <link rel="stylesheet" href="css/pages-style.css">

</head>
<body>
<?php include 'user_header.php'; ?>

<?php
	$category = isset($_GET['category']) ? $_GET['category'] : '';
	$category_title_map = [
		'main' => 'Main Dishes',
		'desserts' => 'Desserts',
		'beverages' => 'Beverages',
	];
	$heading = isset($category_title_map[$category]) ? $category_title_map[$category] : ucfirst($category ?: 'Menu');
?>

<div class="container-topic">
	<h1 class="container-topic-heading"><?php echo htmlspecialchars($heading); ?></h1>
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

<section class="products-section">
   <div class="products-grid">

	<?php
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = ?");
         $select_products->execute([$category]);
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>

      
     <form action="" method="post" class="product-card">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
		 <input type="hidden" name="description" value="<?= $fetch_products['description']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">   
         <div class="product-image-container">
            <img class="product-image" src="uploaded_img/<?= $fetch_products['image']; ?>" alt="<?= htmlspecialchars($fetch_products['name']); ?>">
         </div>
         <div class="product-info">
            <div class="product-name"><?= htmlspecialchars($fetch_products['name']); ?></div>
            <div class="product-description"><?= htmlspecialchars($fetch_products['description']); ?></div>
            <div class="product-footer">
               <div class="product-price"><span>Rs.</span><?= $fetch_products['price']; ?></div>
               <div style="display: flex; align-items: center;">
                  <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2" aria-label="Quantity">
                  <button type="submit" class="add-to-cart-btn" name="add_to_cart">Add to Cart</button>
               </div>
            </div>
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


<?php include 'user_footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>