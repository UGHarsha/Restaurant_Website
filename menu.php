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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu - CeylonBites</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/home-style.css" rel="stylesheet">
</head>
<body>
    <?php include 'user_header.php'; ?>

    <div class="container-topic">
        <h1 class="container-topic-heading">Our Menu</h1>
    </div>

    <div class="container">
        <h1 align="center" class="welcome-b">Explore Our Full Menu</h1>
        <p class="about-b" align="center">Discover our delicious range of authentic Sri Lankan dishes.</p>

        <section class="products">
            <div class="box-container">
            <?php
                $select_products = $conn->prepare("SELECT * FROM `products`");
                $select_products->execute();
                if($select_products->rowCount() > 0){
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
                <form action="" method="post" class="box">
                    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($fetch_products['name']); ?>">
                    <input type="hidden" name="price" value="<?= htmlspecialchars($fetch_products['price']); ?>">
                    <input type="hidden" name="image" value="<?= htmlspecialchars($fetch_products['image']); ?>">
                    <button type="submit" class="fa fa-shopping-cart" name="add_to_cart"></button>
                    <img src="uploaded_img/<?= htmlspecialchars($fetch_products['image']); ?>" alt="<?= htmlspecialchars($fetch_products['name']); ?>">
                    <a href="category.php?category=<?= htmlspecialchars($fetch_products['category']); ?>" class="cat"><?= htmlspecialchars($fetch_products['category']); ?></a>
                    <div class="name"><?= htmlspecialchars($fetch_products['name']); ?></div>
                    <div class="flex">
                        <div class="price"><span>Rs.</span><?= htmlspecialchars($fetch_products['price']); ?></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                    </div>
                </form>
            <?php
                    }
                }else{
                    echo '<p class="empty">No products added yet!</p>';
                }
            ?>
            </div>
        </section>
    </div>

    <?php include 'user_footer.php'; ?>
</body>
</html>