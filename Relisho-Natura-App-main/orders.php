<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset ($user_id)) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RelishoNatura | orders</title>
   <link rel="icon" href="images/logo_02.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<style>
   /* CSS for desktop view */
   .order-table {
      width: 100%;
      border-collapse: collapse;
      cursor: pointer; 
   }

   .order-table th,
   .order-table td {
      border: 2px solid #ddd;
      padding: 8px;
      text-align: left;
   }

   .order-table th {
      background-color: #f2f2f2;
   }

   .order-table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
   }

   .order-table tbody tr:hover {
      background-color: #ddd;
   }

   /* Media query for mobile devices */
   @media (max-width: 768px) {

      .order-table th,
      .order-table td {
         padding: 5px;
      }

      .order-table {
         overflow-x: hidden;
      }
   }

   .box-container {
      overflow-x: scroll;
      font-size: 15px;
   }
</style>


<body>

   <?php include 'header.php'; ?>

   <section class="placed-orders">

      <div class="box-container">
         <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if ($select_orders->rowCount() > 0) {
            ?>
            <table class="order-table">
               <thead>
                  <tr>
                     <th>Order Date</th>
                     <th>Address</th>
                     <th>Total Products</th>
                     <th>Total Price</th>
                     <th>Payment Method</th>
                     <th>Payment Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                     ?>
                     <tr>
                        <td>
                           <?= $fetch_orders['placed_on']; ?>
                        </td>
                        <td>
                           <?= $fetch_orders['address']; ?>
                        </td>
                        <td>
                           <?= $fetch_orders['total_products']; ?>
                        </td>
                        <td>₹
                           <?= $fetch_orders['total_price']; ?>/-
                        </td>
                        <td>
                           <?= $fetch_orders['method']; ?>
                        </td>
                        <td style="color:<?php echo ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green'; ?>">
                           <?= $fetch_orders['payment_status']; ?>
                        </td>
                     </tr>
                     <?php
                  }
                  ?>
               </tbody>
            </table>
            <?php
         } else {
            echo '<p class="empty">no orders placed yet!</p>';
         }
         ?>
      </div>

   </section>









   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>