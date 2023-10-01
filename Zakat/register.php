<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Register</title>
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
   </head>
   <body>
      
      <div class="container">
         <header>Register</header>
         <form method = "post">
            <div class="input-field">
            <input type="text" name="username" required>
               <label>Username</label>
            </div>
            <div class="input-field">
            <input type="email" name="email" required>
               <label>E-mail</label>
            </div>
            <div class="input-field">
               <input class="pswrd" type="password" name="password" required>
               <span class="show">SHOW</span>
               <label>Password</label>
            </div><div class="input-field">
               <input class="pswrd2" type="password" name="password2" required>
               <span class="show">SHOW</span>
               <label>Confirm Password</label>
            </div>
            <div class="button">
               <div class="inner"></div>
               <button name="register">Register</button>
            </div>
         </form>
         <div class="signup">
            Have an Account? <a href="login.php">Login</a>
         </div>
      </div>
      <script>
         var input = document.querySelector('.pswrd');
         var input = document.querySelector('.pswrd2');
         var show = document.querySelector('.show');
         show.addEventListener('click', active);
         function active(){
           if(input.type === "password"){
             input.type = "text";
             show.style.color = "#1DA1F2";
             show.textContent = "HIDE";
           }else{
             input.type = "password";
             show.textContent = "SHOW";
             show.style.color = "#111";
           }
         }
      </script>
 
   </body>
</html>