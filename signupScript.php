<?php
  if(isset($_POST['signup-submit'])){
    //signup-submit references name of sign up button (which is signup-submit)
    
    require 'dbhScript.php';
    
    //fetching user input of Submit form, in quotes is name of input value
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    //error handlers -- can add more to check for more errors
    //if any part of the form is left empty
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      //if user makes error, saves info in form they have already inputted
      header("Location: signup.php?error=emptyfields&uid=".$username."&mail=".$mail);
      exit();
    } 
    //verifying username and email together
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: signup.php?error=invalidemailandusername");
      exit();
    }
    //if email is not real
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: signup.php?error=invalidemail&uid=".$username);
      exit();
    }
    //verifying username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) /* /^[a-zA-Z0-9]*$/ specifies char type for username*/  {
      header("Location: signup.php?error=invalidusernamechars&mail=".$email);
      exit();
    }
    //verifying if both passwords are the same
    else if ($password !== $passwordRepeat ){
      header("Location: signup.php?error=passwordsarenotsame&mail=".$email."&username=".$username);
      exit();
    }
    //if username already exists, need to connect to database
    //checks in database for list of usernames
      else {
      $sql = "SELECT usernameUsers FROM users WHERE usernameUsers = ?"; //? acts as a placeholder for username and password, recheck AND emailUsers = ?
      $statement = mysqli_stmt_init($connection);
      if(!mysqli_stmt_prepare($statement, $sql)){
        header("Location: signup.php?error=databaseerror");
        exit();
      }
      //checks if username is already taken with username list from database
      else{
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement); //fetched info from database
        $results = mysqli_stmt_num_rows($statement); //database returns matches as rows
        if($results > 0){
          header("Location: signup.php?error=usernametaken&mail=".$email);
          exit();
        }
        //logging user into database to save info, if we win distance hacks, add their before info
        else{
          $sql = "INSERT INTO users (usernameUsers, emailUsers, passwordUsers ) VALUES (?, ?, ?)";
          $statement = mysqli_stmt_init($connection);
          //checking to see if values were stored in databse; if not, exit
          if(!mysqli_stmt_prepare($statement, $sql)){
            header("Location: signup.php?error=valuescannotbestored");
            exit();
          } else {
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          //storing info in database (3 params of info)
          mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashedPassword);
          mysqli_stmt_execute($statement);
          header("Location: signup.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($statement);
  mysqli_close($connection);

}

else{
  header("Location: signup.php");
  exit();
}

?>