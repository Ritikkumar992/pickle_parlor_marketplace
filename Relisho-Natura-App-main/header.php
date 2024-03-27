<?php

if (isset ($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>


<style>
   #wishCount,
   #cartCount {
      position: relative;
      bottom: 15px;
      background-color: red;
      color: white;
      border-radius: 20px;
      padding: 0 10px;
      height: 20px;
      width: 20px;
      right: 7px;
      font-size: 12px;
      padding: 1px 5px;

   }
</style>

<body>

   <header class="header">

      <div class="flex">
         <img src="./images/logo.jpeg" alt="" style="height: 6rem; width: 20.05rem;">
         <!-- <a href="admin_page.php" class="logo">Reliso<span>Natura</span></a> -->

         <nav class="navbar">
            <a href="index">Home</a>
            <a href="shop">Shop</a>
            <a href="orders">Orders</a>
            <a href="about">About</a>
            <a href="contact">Contact</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>

            <a href="search_page" class="fas fa-search " style="color: green;"></a>
            <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            ?>

            <a href="wishlist"><i class="fa-solid fa-heart" style="color: green;"></i><span id="wishCount">
                  <?= $count_wishlist_items->rowCount(); ?>
               </span></a>

            <a href="cart"> <i class="fas fa-shopping-cart" style="color: green;"></i><span id="cartCount">
                  <?= $count_cart_items->rowCount(); ?>
               </span></a>

            <div id="user-btn" class="fas fa-user" style="color: green;"></div>

         </div>

         <div class="profile">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
            <p>
               <?= $fetch_profile['name']; ?>
            </p>
            <a href="user_profile_update" class="btn">update profile</a>
            <a href="logout" class="delete-btn">logout</a>

            <!-- we don't need to show login, logout button -->
            <!-- <div class="flex-btn">
               <a href="login.php" class="option-btn">login</a>
               <a href="register.php" class="option-btn">register</a>
            </div> -->
         </div>

      </div>

   </header>
</body>

</html>