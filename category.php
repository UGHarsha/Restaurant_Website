<?php
include 'connect.php';
session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}
include 'add_cart.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Category - CeylonBites</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="css/navbar.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/home-style.css">
   <link rel="stylesheet" href="css/pages-style.css">
   <link rel="stylesheet" href="css/category.css">
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
   $category_icons = [
      'main' => 'fa-cutlery',
      'desserts' => 'fa-birthday-cake',
      'beverages' => 'fa-coffee',
   ];
   $cat_icon = isset($category_icons[$category]) ? $category_icons[$category] : 'fa-cutlery';
   $category_desc = [
      'main' => 'Authentic Sri Lankan main courses prepared with traditional spices.',
      'desserts' => 'Handcrafted desserts made with love and the finest ingredients.',
      'beverages' => 'Traditional and modern beverages to refresh your day.',
   ];
   $cat_desc = isset($category_desc[$category]) ? $category_desc[$category] : 'Discover our delicious offerings.';
?>

<!-- Hero -->
<section class="ctg-hero">
   <div class="ctg-hero-overlay"></div>
   <div class="ctg-hero-inner">
      <span class="ctg-hero-badge"><i class="fa <?= $cat_icon; ?>"></i></span>
      <h1 class="ctg-hero-title"><?= htmlspecialchars($heading); ?></h1>
      <p class="ctg-hero-sub"><?= $cat_desc; ?></p>
      <nav class="ctg-breadcrumb">
         <a href="index.php">Home</a>
         <i class="fa fa-angle-right"></i>
         <a href="menu.php">Menu</a>
         <i class="fa fa-angle-right"></i>
         <span><?= htmlspecialchars($heading); ?></span>
      </nav>
   </div>
</section>

<!-- Products -->
<section class="ctg-products">
   <div class="ctg-wrap">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE category = ?");
         $select_products->execute([$category]);
         $product_count = $select_products->rowCount();
      ?>

      <div class="ctg-bar">
         <p class="ctg-bar-count"><strong><?= $product_count; ?></strong> item<?= $product_count !== 1 ? 's' : ''; ?> available</p>
      </div>

      <?php if($product_count > 0): ?>
      <div class="ctg-grid">
         <?php while($fp = $select_products->fetch(PDO::FETCH_ASSOC)): ?>
         <div class="ctg-card">
            <div class="ctg-card-img">
               <img src="uploaded_img/<?= $fp['image']; ?>" alt="<?= htmlspecialchars($fp['name']); ?>">
               <span class="ctg-card-cat"><i class="fa <?= $cat_icon; ?>"></i> <?= htmlspecialchars($heading); ?></span>
            </div>
            <div class="ctg-card-body">
               <h3 class="ctg-card-name"><?= htmlspecialchars($fp['name']); ?></h3>
               <p class="ctg-card-desc">
                  <span class="ctg-desc-text"><?= htmlspecialchars($fp['description']); ?></span>
                  <span class="ctg-see-more" onclick="ctgShowDesc('<?= htmlspecialchars(addslashes($fp['name']), ENT_QUOTES); ?>','<?= htmlspecialchars(addslashes($fp['description']), ENT_QUOTES); ?>')">See more</span>
               </p>
               <div class="ctg-card-bottom">
                  <div class="ctg-card-price"><small>Rs.</small><?= htmlspecialchars($fp['price']); ?></div>
                  <form action="" method="post" class="ctg-card-form">
                     <input type="hidden" name="pid" value="<?= $fp['id']; ?>">
                     <input type="hidden" name="name" value="<?= htmlspecialchars($fp['name']); ?>">
                     <input type="hidden" name="price" value="<?= htmlspecialchars($fp['price']); ?>">
                     <input type="hidden" name="description" value="<?= htmlspecialchars($fp['description']); ?>">
                     <input type="hidden" name="image" value="<?= htmlspecialchars($fp['image']); ?>">
                     <div class="ctg-qty-group">
                        <button type="button" class="ctg-qty-btn ctg-qty-minus" onclick="this.parentNode.querySelector('.ctg-qty-input').stepDown();"><i class="fa fa-minus"></i></button>
                        <input type="number" name="qty" class="ctg-qty-input" min="1" max="99" value="1">
                        <button type="button" class="ctg-qty-btn ctg-qty-plus" onclick="this.parentNode.querySelector('.ctg-qty-input').stepUp();"><i class="fa fa-plus"></i></button>
                     </div>
                     <button type="submit" name="add_to_cart" class="ctg-add-btn">
                        <i class="fa fa-cart-plus"></i>
                     </button>
                  </form>
               </div>
            </div>
         </div>
         <?php endwhile; ?>
      </div>
      <?php else: ?>
      <div class="ctg-empty">
         <div class="ctg-empty-icon"><i class="fa fa-inbox"></i></div>
         <h3>No Products Yet</h3>
         <p>This category is empty right now. Check back soon!</p>
         <a href="menu.php" class="btn btn-brand">Browse Full Menu</a>
      </div>
      <?php endif; ?>

   </div>
</section>

<?php include 'user_footer.php'; ?>

<!-- Description Popup -->
<div class="ctg-modal-overlay" id="ctgModal" onclick="ctgCloseDesc(event)">
   <div class="ctg-modal">
      <button class="ctg-modal-close" onclick="ctgCloseDesc(event, true)">&times;</button>
      <h3 class="ctg-modal-title" id="ctgModalTitle"></h3>
      <p class="ctg-modal-desc" id="ctgModalDesc"></p>
   </div>
</div>

<script src="js/script.js"></script>
<script>
function ctgShowDesc(name, desc) {
   document.getElementById('ctgModalTitle').textContent = name;
   document.getElementById('ctgModalDesc').textContent = desc;
   document.getElementById('ctgModal').classList.add('ctg-modal-active');
   document.body.style.overflow = 'hidden';
}
function ctgCloseDesc(e, force) {
   if (force || e.target === document.getElementById('ctgModal')) {
      document.getElementById('ctgModal').classList.remove('ctg-modal-active');
      document.body.style.overflow = '';
   }
}
document.addEventListener('keydown', function(e) {
   if (e.key === 'Escape') ctgCloseDesc(null, true);
});
</script>
</body>
</html>
