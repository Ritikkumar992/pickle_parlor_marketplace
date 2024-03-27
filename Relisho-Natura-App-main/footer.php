<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>


<style>
   #footer {
      background-color: #002a00;
   }

   .box1 {
      background-color: #002a00;
   }

   .box1 h3,
   #credit {
      color: #c7c7c7 !important;
      margin: auto;
   }

   .x a {
      color: #a1a1a1 !important;
      width: 100%;
      /* background-color: red; */
   }

   .x p {
      /* background-color: red; */
      margin-top: -2px;
      color: #cacaca;
   }
</style>

<body>
   <footer id="footer" class="footer">

      <section class="box-container">

         <div class="box box1">
            <div class="x">

               <h3>quick links</h3>
               <a href="index"> <i class="fas fa-angle-right"></i> Home</a>
               <a href="shop"> <i class="fas fa-angle-right"></i> Shop</a>
               <a href="about"> <i class="fas fa-angle-right"></i> About</a>
               <a href="contact"> <i class="fas fa-angle-right"></i> Contact</a>
            </div>
         </div>
         </div>

         <div class="box box1">
            <div class="x">
               <h3>extra links</h3>
               <a href="cart"> <i class="fas fa-angle-right"></i> Cart</a>
               <a href="wishlist"> <i class="fas fa-angle-right"></i> Wishlist</a>
               <a href="login"> <i class="fas fa-angle-right"></i> Login</a>
               <a href="register"> <i class="fas fa-angle-right"></i> Register</a>
            </div>
         </div>
         <div class="box box1">
            <div class="x">
               <h3>contact info</h3>
               <p> <i class="fas fa-phone"></i> +91-9775301685 </p>
               <p> <i class="fas fa-phone"></i> +91-9693882391 </p>
               <!-- <a href="https://wa.me/9775301685?text=Hello" style="font-size:1.5rem;" target="_blank">+91-7004025874</a> -->
               <p> <i class="fas fa-envelope"></i> relishonatura@gmail.com </p>
               <p> <i class="fas fa-map-marker-alt"></i> kolkata, india - 400104 </p>
            </div>
         </div>
         <div class="box box1">
            <div class="x">
               <h3>follow us</h3>
               <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
               <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
               <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
               <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            </div>
         </div>
      </section>

      <p id="credit" class="credit"> &copy; copyright @
         <?= date('Y'); ?> by <span>Relisho Natura</span> | all rights reserved!
      </p>

   </footer>
</body>

</html>