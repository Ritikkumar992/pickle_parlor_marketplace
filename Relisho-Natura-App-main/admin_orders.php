<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset ($admin_id)) {
   header('location:login.php');
}
;

if (isset ($_POST['update_order'])) {

   $order_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   $update_payment = filter_var($update_payment, FILTER_SANITIZE_STRING);
   $update_orders = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_orders->execute([$update_payment, $order_id]);
   $message[] = 'payment has been updated!';

}
;

if (isset ($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_orders = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_orders->execute([$delete_id]);
   header('location:admin_orders.php');

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
   <link rel="stylesheet" href="css/admin_style.css">

</head>


<style>
   .placed-orders {
      margin: 20px;
      margin: auto;
      font-weight: bolder;
      font-size: 13px;
   }

   .title {
      text-align: center;
      color: green;
      margin-bottom: 20px;
   }

   .table-container {
      background-color: #e1e1e1;
      overflow-x: auto;
   }

   .order-table {
      width: 100%;
      border-collapse: collapse;
   }

   .order-table th,
   .order-table td {
      padding: 10px;
      border: 1px solid #ddd;
   }

   .order-table th {
      background-color: #f2f2f2;
      text-align: center;
   }

   .order-table td {
      text-align: center;
   }

   .drop-down {
      width: 100px;
      padding: 5px;
      color: #3c583c;
      background-color: green;
      border-radius: 5px;
      color: white;
   }

   .option-btn,
   .delete-btn {
      padding: 5px 10px;
      border: none;
      font-size: 15px;
      border-radius: 5px;
      cursor: pointer;
   }

   .option-btn {
      background-color: orange;
      color: #fff;
   }

   .delete-btn {
      background-color: red;
      color: #fff;
   }

   .option-btn:hover {
      background-color: peru;
   }

   .delete-btn:hover {
      background-color: #be0000;
   }

   .empty {
      text-align: center;
      padding: 10px;
   }

   @media only screen and (max-width: 768px) {
      .order-table {
         font-size: 12px;
      }

      .order-table th,
      .order-table td {
         padding: 8px;
      }
   }
</style>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="placed-orders">
      <h1 class="title">Placed Orders</h1>
      <div class="table-container">
         <table class="order-table">
            <thead>
               <tr>
                  <th>User ID</th>
                  <th>Placed On</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Number</th>
                  <th>Address</th>
                  <th>Total Products</th>
                  <th>Total Price</th>
                  <th>Payment Method</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $select_orders = $conn->prepare("SELECT * FROM `orders`");
               $select_orders->execute();
               if ($select_orders->rowCount() > 0) {
                  while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                     echo "<tr>";
                     echo "<td>{$fetch_orders['user_id']}</td>";
                     echo "<td>{$fetch_orders['placed_on']}</td>";
                     echo "<td>{$fetch_orders['name']}</td>";
                     echo "<td>{$fetch_orders['email']}</td>";
                     echo "<td>{$fetch_orders['number']}</td>";
                     echo "<td>{$fetch_orders['address']}</td>";
                     echo "<td>{$fetch_orders['total_products']}</td>";
                     echo "<td>₹{$fetch_orders['total_price']}/-</td>";
                     echo "<td>{$fetch_orders['method']}</td>";
                     echo "<td>";
                     echo "<form action='' method='POST'>";
                     echo "<input type='hidden' name='order_id' value='{$fetch_orders['id']}'>";
                     echo "<select name='update_payment' class='drop-down'>";
                     echo "<option value='' selected disabled>{$fetch_orders['payment_status']}</option>";
                     echo "<option value='pending'>Pending</option>";
                     echo "<option value='completed'>Completed</option>";
                     echo "</select>";
                     echo "<input type='submit' name='update_order' class='option-btn' value='Update'>";
                     echo "<a href='admin_orders.php?delete={$fetch_orders['id']}' class='delete-btn' onclick='return confirm(\"Delete this order?\");'>Delete</a>";
                     echo "</form>";
                     echo "</td>";
                     echo "</tr>";
                  }
               } else {
                  echo "<tr><td colspan='10' class='empty'>No orders placed yet!</td></tr>";
               }
               ?>
            </tbody>
         </table>
      </div>
   </section>














   <script src="js/script.js"></script>

</body>

</html>