<?php
   session_start();
   ?>
<html>
   <head>
      <title>Home</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link type="text/css" rel="stylesheet" href="home_input.css" />
   </head>
   <body>
      <div class="header1">
         <div id="img3" class="header1">
            <h style="color:white; font-size: 2em; margin-left:35%;">Facebook Lite</h>
         </div>
         <div id="logout" class="header1"><a href="logout.php"><button type="submit" class="btn btn-success btn-sm">Log Out</button></a></div>
      </div>
      <div class="card" style="width: 20rem; margin-top: 4%">
         <div class="bodyn">
            <div id="side1" class="bodyn" style="color:black;">
               <?php
                  echo "User Name:\n";
                  echo $_SESSION['emailid'];
                  ?>
            </div>
            <div id="side2" class="bodyn" style="color:darkblue;">Manage Account</div>
            <div id="side23" class="bodyn"><a href="view_profile.php" style="color:green;">View Profile</a></div>
            <div id="side3" class="bodyn"><a href="edit_profile.php" style="color:green;">Edit Profile</a></div>
         </div>
      </div>
      <div class="card bg-secondary" style="width: 40rem; margin:0 auto;">
         <center>update post</center>
         <hr>
         <form action="post_input.php" method="POST">
            <textarea class="form-control" placeholder=" What's in your mind"  name="input" type="text"></textarea>
            <button type='submit' class="btn btn-dark">post</button>
      </div>
      </form>
      </div>
      <?php
         include_once("post.php");
         ?>
      <div id="sidebox1">
         <div id="sideboxx23">Friend List:</div>
         <br>
         <table>
            <tr></tr>
            <?php
               include 'friends.php'; 
               ?>
         </table>
      </div>
   </body>
</html>

