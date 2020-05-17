<?php

if(isset($_POST['login-submit'])){

    require 'dbhScript.php';

    $emailuid = $_POST['emailuid'];
    $password = $_POST['pwd'];

    if (empty($emailuid)  || empty($password)) {
        header("Location: index.php?error=emptyloginfields");
        exit();
    }

    else{
        $sql = "SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?"; //possible syntax error
        $statement = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($statement, $sql)) { //checking that this info can be extracted for database/any errors in it
            header("Location: index.php?error=databaseerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($statement, "ss", $emailuid, $emailuid); //email in both places to check for username OR email (2 strings)
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            if ($row = mysqli_fetch_assoc($result)) { //reformatting data from database so it can be worked with in php
                $passwordCheck = password_verify($password, $row['passwordUsers']); //checking that hashed password in db matches inputted password
                if($passwordCheck == false) {
                    header("Location: index.php?error=wrongpassword");
                    exit();
                }

                else if ($passwordCheck == true) { //we use else if in case error in our code makes passwordCheck not boolean for some reason
                    session_start(); //start a user session
                    $_SESSION['UserID'] = $row['idUsers'];
                    $_SESSION['Username'] = $row['usernameUsers'];

                    header("Location: index.php?login=success");
                    exit();
                }

                else {
                    header("Location: index.php?error=CRAZYSTUFF");
                    exit();
                }
            }

            else {
                header("Location: index.php?error=nouser");
                exit(); 
            }
        }
    }
}

else {
    header("Location: index.php"); //if we want to add new html file for mains stuff, change entry location here
    exit();
}


?>