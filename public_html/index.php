﻿<!doctype html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <title>Facebook Lite</title>
      <meta charset="utf-8">
      <style>
         body, html {
         height: 100%;
         margin: 0;
         }
         .bg {
         /* The image used */
         background-image: url("climbing-wallpaper.jpg");
         /* Full height */
         height: 100%; 
         /* Center and scale the image nicely */
         background-position: center;
         background-repeat: no-repeat;
         background-size: cover;
         }
      </style>
   </head>
   <body>
      <div class="bg">
         <center>
            <h1 style="color:white; font-size: 3em; margin-bottom: 1.5em;"><br>Facebook Lite</h1>
         </center>
         <div class="card bg-success text-center" style="width: 25rem; margin:0 auto;">
            <div class="card-body">
               <label>
               <b>Login</b>
               </label>
               <br style = “line-height:5px;”><br>
               <form action="login_input.php" method="post">
                  <label for="emailid">
                  <b>User Name</b>
                  </label>
                  <input type="text" placeholder="Enter Email Id" name="emailid" required>
                  <br style = “line-height:5px;”><br>
                  <label for="passwd">
                  <b>Password</b>
                  </label>
                  <input type="password" placeholder="Enter Password" name="passwd" required>
                  <br style = “line-height:5px;”><br>
                  <button type="submit" class="btn btn-primary btn-sm">Login</button>
                  <br style = “line-height:5px;”><br>
               </form>
               <label>
               <b>not a user?</b>
               </label>
               <a href="signup.php" class="btn btn-primary btn-sm"><button type="submit">Sign Up</button></a>
            </div>
         </div>
      </div>
   </body>
</html>

