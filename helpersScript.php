<?php
    require 'dbhScript.php';

    if(isset($_POST['submithelpers'])){
        $name = $_POST['name'];
        $zipcode = $_POST['zipcode'];
        
        if(isset($_POST['serviceprovider'])){
            $servicesOffered = $_POST['serviceprovider'];
        } else {
            echo 'You need to choose one option!';
            exit();
        }
        $contact = $_POST['contact'];
        $extra = $_POST['extra'];
        
        $sql = "INSERT INTO helpers (name, zipcode, services, contact, extra) VALUES (?, ?, ?, ?, ?)"; //need to bind params for placeholders to work
        $statement = mysqli_stmt_init($connection);
        
        if(!mysqli_stmt_prepare($statement, $sql)){
            header('connections.php?somethingwrong');
            exit();
        } else {
            //storing info in database (3 params of info)
            mysqli_stmt_bind_param($statement, "sssss", $name, $zipcode, $servicesOffered, $contact, $extra);
            mysqli_stmt_execute($statement); 
            header ('Location: helpRequestsScript.php');
        }
        
    }
    
    mysqli_close($connection);
?>

<main>


</main>