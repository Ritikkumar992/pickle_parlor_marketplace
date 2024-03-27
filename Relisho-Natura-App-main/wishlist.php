<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset ($user_id)) {
   header('location:login.php');
}
;

if (isset ($_POST['add_to_cart'])) {

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if ($check_cart_numbers->rowCount() > 0) {
      $message[] = 'already added to cart!';
   } else {

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if ($check_wishlist_numbers->rowCount() > 0) {
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

if (isset ($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
   $delete_wishlist_item->execute([$delete_id]);
   header('location:wishlist.php');

}

if (isset ($_GET['delete_all'])) {

   $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
   $delete_wishlist_item->execute([$user_id]);
   header('location:wishlist.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RelishoNatura | wishlist</title>

   <link rel="icon" href="images/logo_02.png">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<style>
   .card {
      position: relative;
      width: 320px;
      height: 460px;
      background: #59CE8A;
      border-radius: 20px;
      overflow: hidden;
      margin-bottom: 20px;
   }

   .card .imgBox {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding-top: 20px;
      z-index: 1;
   }

   .card .imgBox img {
      height: 150px;
      width: auto;
   }

   .card .contentBox {
      position: relative;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      z-index: 2;
   }

   .card .contentBox h3 {
      font-size: 18px;
      color: white;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
   }

   .card .contentBox .price {
      font-size: 24px;
      color: white;
      font-weight: 700;
      letter-spacing: 1px;
   }

   .card::before {
      content: "";
      position: absolute;
      top: -50%;
      width: 100%;
      height: 100%;
      background: #27ae60;
      transform: skewY(345deg);
      transition: 0.5s;
   }

   .card:hover::before {
      top: -70%;
      transform: skewY(390deg);
   }

   .card::after {
      position: absolute;
      bottom: 0;
      left: 0;
      font-weight: 600;
      font-size: 6em;
      color: rgba(0, 0, 0, 0.1);
   }


   .card .contentBox .quantity-input {
      margin-top: 15px;
      padding: 10px;
      width: 100%;
      border: 2px solid #ffce00;
      border-radius: 5px;
      font-size: 14px;
      color: #000;
      background-color: #fff;
      box-sizing: border-box;
      transition: border-color 0.3s;
   }

   .card .contentBox .quantity-input:focus {
      outline: none;
      border-color: #ff8000;
   }

   .card .contentBox .buy {
      margin-top: 15px;
      padding: 10px 30px;
      color: white;
      text-decoration: none;
      background: #eb891f;
      border-radius: 30px;
      text-transform: uppercase;
      width: 100%;
      font-weight: 800;
      letter-spacing: 1px;
      transition: 0.3s;
      cursor: pointer;
   }

   .buy1 {
      background-color: #27ae60 !important;
   }

   .buy1:hover {
      background-color: #009740 !important;
   }

   .card .contentBox .buy:hover {
      background-color: #d46e00;
   }

   .mouse {
      height: 200px;
      width: auto;
   }

   .card:hover .contentBox .buy {
      opacity: 1;
   }


   /**/
   * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
   }

   h1,
   h2,
   h3 {
      margin-top: 20px;
      color: DarkGreen;
   }

   h3 {
      margin-bottom: 10px;
   }

   p {
      max-width: 65ch;
      color: #565656;
      margin-top: 20px;
      line-height: 1.5;
   }

   ul {
      margin-top: 20px;
      color: #565656;
      list-style-position: inside;
   }

   li {
      line-height: 1.5;
      max-width: 65ch;
   }

   body {
      font-family: arial;
      padding: 0 20px 20px;
   }

   .quantity-widget {
      display: inline-flex;
      align-items: center;
      max-width: 12.5em;
      height: 3.125em;
      width: 100%;
      position: relative;
      font-size: 16px;
      overflow: hidden;
      line-height: 1;
   }

   .quantity-widget__sign {
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      width: 1.5625em;
      height: 100%;
      font-size: 32px;
      background: #0b9ad3;
      pointer-events: none;
   }

   .quantity-widget__sign--minus {
      left: 0;
   }

   .quantity-widget__sign--plus {
      right: 0;
   }

   .quantity-widget__text {
      width: calc(100% - 6.25em);
      margin: 0 3.125em;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #0b9ad3;
      position: absolute;
      color: white;
   }

   .quantity-widget__range {
      -webkit-appearance: none;
      -moz-appearance: none;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      touch-action: manipulation;
      width: 100%;
      height: 100%;
      display: block;
      margin: 0;
      position: relative;
      z-index: 0;
      border-radius: 0;
      background: #176687;
      cursor: pointer;
      overflow: hidden;
      outline: none;
   }

   .quantity-widget__range:hover {
      background: #176687;
   }

   .quantity-widget_range:hover~.quantity-widget_sign,
   .quantity-widget_range:focus~.quantity-widget_sign {
      background: transparent;
   }

   .quantity-widget__range::-webkit-slider-thumb {
      -webkit-appearance: none;
      opacity: 0;
      height: 0;
      width: 0;
   }

   .quantity-widget__range[value="0"] {
      background: white;
      border: 1px solid #c5e5f3;
      margin-left: -100%;
      min-width: 200%;
   }

   .quantity-widget__range[value="0"]:hover,
   .quantity-widget__range[value="0"]:focus {
      background: #c5e5f3;
   }

   .quantity-widget_range[value="0"]~.quantity-widget_text {
      pointer-events: none;
      background: white;
      color: #0b9ad3;
      height: auto;
   }

   .quantity-widget_range[value="0"]~.quantity-widget_sign--minus {
      background: transparent;
      border-left: 1px solid #c5e5f3;
      color: transparent;
   }

   .quantity-widget_range[value="0"]~.quantity-widget_sign--plus {
      background: transparent;
      color: #0b9ad3;

   }

   .quantity-widget_range[value="0"]:hover~.quantity-widgettext,
   .quantity-widgetrange[value="0"]:focus~.quantity-widget_text {
      pointer-events: none;
      background: #c5e5f3;
      color: #0b9ad3
   }

   .quantity-widget__range::-moz-range-thumb {
      -moz-appearance: none;
      opacity: 0;
      height: 0;
      width: 0;
   }

   .quantity-widget__range::-webkit-slider-runnable-track {
      -webkit-appearance: none;
      height: 50px;
      cursor: pointer;
   }

   .quantity-widget__range[value="0"]:focus::-webkit-slider-runnable-track,
   .quantity-widget__range[value="0"]:hover::-webkit-slider-runnable-track {
      background: #c5e5f3;
   }

   .quantity-widget__range::-moz-range-track {
      background: transparent;
   }

   .quantity-widget_range[value="0"]:focus::-moz-range-track,
   .quantity-widget_range[value="0"]:focus::-moz-range-track {
      background: #c5e5f3;
   }

   .quantity-widget__range[value="0"]:: .quantity-widget__range::-moz-range-track {
      -moz-appearance: none;
      height: 50px;
      cursor: pointer;
      background: #176687;
   }

   .quantity-widget__range[value="0"]:focus::-moz-range-track,
   .quantity-widget__range[value="0"]:hover::-moz-range-track {
      background: #c5e5f3;
   }

   body {
      padding: 0px !important;
   }

   #box-containerID {
      justify-content: center;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
   }


   @media (max-width:768px) {
      #box-containerID {
         justify-content: center;
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
      }

      .card {
         width: 350px;
      }

   }
</style>


<body>

   <?php include 'header.php'; ?>




   <section class="wishlist">

      <h1 class="title">products added</h1>

      <div class="box-container">

         <?php
         $grand_total = 0;
         $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
         $select_wishlist->execute([$user_id]);
         if ($select_wishlist->rowCount() > 0) {
            while ($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)) {
               ?>
               <form action="" method="POST" class="box">
                  <a href="wishlist.php?delete=<?= $fetch_wishlist['id']; ?>" class="fas fa-times"
                     onclick="return confirm('delete this from wishlist?');"></a>
                  <a href="view_page.php?pid=<?= $fetch_wishlist['pid']; ?>" class="fas fa-eye"></a>
                  <img src="uploaded_img/<?= $fetch_wishlist['image']; ?>" alt="">
                  <div class="name">
                     <?= $fetch_wishlist['name']; ?>
                  </div>
                  <div class="price">₹
                     <?= $fetch_wishlist['price']; ?>/-
                  </div>
                  <input type="number" min="1" value="1" class="qty" name="p_qty">
                  <input type="hidden" name="pid" value="<?= $fetch_wishlist['pid']; ?>">
                  <input type="hidden" name="p_name" value="<?= $fetch_wishlist['name']; ?>">
                  <input type="hidden" name="p_price" value="<?= $fetch_wishlist['price']; ?>">
                  <input type="hidden" name="p_image" value="<?= $fetch_wishlist['image']; ?>">
                  <input type="submit" value="add to cart" name="add_to_cart" class="btn">
               </form>
               <?php
               $grand_total += $fetch_wishlist['price'];
            }
         } else {
            echo '<p class="empty">your wishlist is empty</p>';
         }
         ?>
      </div>

      <div class="wishlist-total">
         <p>grand total : <span>₹
               <?= $grand_total; ?>/-
            </span></p>
         <a href="shop.php" class="option-btn">continue shopping</a>
         <a href="wishlist.php?delete_all" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a>
      </div>

   </section>







   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>