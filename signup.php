<?php
  require "header.php";
  
?>

<main>
<link rel = "stylesheet" href = "signup.css">
  <?php
  //1:46:38 for more specific error messages
    if(isset($_GET['error'])){
       echo $_GET['error'];
    }
    else if (isset($_GET['signup'])){
      echo 'You have succesfully signed up!';
    }
  ?>
  <!-- sign Up form -->
  <h1> Sign Up </h1>
  <div id = 'signup'>
    <!-- sign Up form -->
  <form action = "signupScript.php" method = "post" id = "form">
    <input type = "text" class = "signup" name = "uid" placeholder = "Username"><br>
    <!-- part that tells users to sign up, they need email, can be used to recover password-->
    <input type = "text" class = "signup" name = "mail" placeholder = "Email" style: > <br>
    <input type = "password" class = "signup" name = "pwd" placeholder = "Password"><br>
    <!-- password verification-->
    <input type = "password" class = "signup" name = "pwd-repeat" placeholder = "Re-Enter Password"><br>
    <button type = "submit" id = "signup2" name = "signup-submit">Sign Up</button>
  </form>
  </div>
</main>

<?php
  require "footer.php";
?>