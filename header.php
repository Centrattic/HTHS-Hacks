<?php
require "checkMobileBrowser.php";
session_start(); //to start user session on ALL pages in site
  require 'functions.php';
?>

<html>
  <head>
    <title>Distance Hacks</title>
    <link rel = "stylesheet" href = "navbar.css">
  </head>
  <body>
    <header>
      <nav>
        <a href = "#">
          <!-- Insert Logo Here -->
        </a>
         <!--put more stuff in here to add pages to site: add ul/li if needed for nav bar to a href below-->
         
  
        <div class="logo">Logo</div>
          <ul class="menu-area">
            <li><a href="index.php">Home</a></li>
            <?php
            if(isset($_SESSION['UserID'])){
              echo '<li><a href="connectHeroScript.php">COVID Heroes</a></li>';
            } else {
              echo '<li><a href="signup.php">COVID Heroes</a></li>';
            }
            ?>
            <?php
            if(isset($_SESSION['UserID'])){
              echo '<li><a href="connections.php">COVID Allies</a></li>';
            } else {
              echo '<li><a href="signup.php">COVID Allies</a></li>';
            }
            ?>
          </ul>
        
          <ul class = "buttonul">
        <div id = "logout">
          <?php
            if (isset($_SESSION['UserID'])) { //check for a session variable to see if we have a session, changes content if user is logged in or not
              echo '<li><form action = "logoutScript.php" method = "post">           
              <button type = "submit" name = "logout-submit" <button style = "position:absolute; left:95%; width: 5%; padding: .05%; font-size: 1em;">Logout</button>
             </form></li>'; //log out form
            } 
        ?>
        </div>
        <div id = "submit">
          <?php
            if(!isset($_SESSION['UserID'])) {
              echo '<li><form action = "loginScript.php" method = "post">
                <input type = "text" name = "emailuid" placeholder = "Username/Email" style = "font-size: 1em; width:10%; position: absolute; left: 66%;">
                <input type = "password" name = "pwd" placeholder = "Password" style = "font-size: 1em; width:10%; position: absolute; left: 76.5%;">
                <button type = "submit" name = "login-submit" style = "position:absolute; left:87%; width: 5%; padding: .05%; font-size: 1em;">Login</button> </li>
                </form>';
              echo '<li><a href = "signup.php" ><button style = "position:absolute; left:95%; width: 5%; padding: .05%; font-size: 1em;">
              Sign Up</button></a></li>';
            }

            //input of password and username set up
            //button to submit entry form
            // sign up form
          ?>
        </div>
          </ul>
      </nav>
    </header>
  </body>
</html>