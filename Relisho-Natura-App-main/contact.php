<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset ($user_id)) {
   header('location:login.php');
}
;

if (isset ($_POST['send'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `message` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if ($select_message->rowCount() > 0) {
      $message[] = 'already sent message!';
   } else {

      $insert_message = $conn->prepare("INSERT INTO `message`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'sent message successfully!';

   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RelishoNatura | contact</title>
   <link rel="icon" href="images/logo_02.png">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<style>
   #title {
      font-size: 30px !important;
      color: #44b244;
   }

   .contact {
      text-align: center;
      padding: 50px 0;
   }

   .contact .title {
      font-size: 2rem;
      margin-bottom: 30px;
      color: #333;
      /* Darker color for better readability */
   }

   .contact form {
      max-width: 500px;
      border: none;
      box-shadow: 0px 0px 5px black;
      /* Limit width for better readability */
      margin: 0 auto;
   }

   .contact input[type="text"],
   .contact input[type="email"],
   .contact input[type="number"],
   .contact textarea {
      width: 100%;
      padding: 12px;
      /* Increased padding for better input experience */
      margin-bottom: 20px;
      border: none;
      box-shadow: 0px 0px 5px black;

      border-radius: 5px;
      box-sizing: border-box;
      font-size: 16px;
      border: none;
      box-shadow: 0px 0px 5px black;
   }

   .contact textarea {
      resize: none;
   }

   .contact form .box {
      border: none;
      box-shadow: 0px 0px 5px black;
   }

   .contact input[type="submit"] {
      width: 100%;
      padding: 12px;
      /* Increased padding for better button appearance */
      background-color: #44b244;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;

      transition: background-color 0.3s ease;
      font-size: 16px;
      /* Increased font size for better button appearance */
   }

   .contact input[type="submit"]:hover {
      background-color: #1f921f;
   }

   /* Media query for smaller screens */
   @media (max-width: 768px) {
      .contact form {
         padding: 10px;
         margin: 0 10px;
         /* Reduce padding for smaller screens */
      }

      .contact input[type="text"],
      .contact input[type="email"],
      .contact input[type="number"],
      .contact textarea {
         padding: 10px;
         /* Reduce padding for smaller screens */
         margin-bottom: 15px;
         /* Reduce margin bottom for smaller screens */
      }

      .contact input[type="submit"] {
         padding: 10px;
         /* Reduce padding for smaller screens */
      }
   }
</style>

<body>

   <?php include 'header.php'; ?>

   <section class="contact">

      <h1 id="title" class="title">get in touch</h1>

      <form action="" method="POST">
         <input type="text" name="name" class="box" required placeholder="enter your name">
         <input type="email" name="email" class="box" required placeholder="enter your email">
         <input type="number" name="number" min="0" class="box" required placeholder="enter your number">
         <textarea name="msg" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
         <input type="submit" value="send message" class="btn" name="send">
      </form>

   </section>








   <?php include 'footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>