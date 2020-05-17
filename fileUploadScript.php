<?php

require 'dbhScript.php';

if(isset($_POST['nominate'])){
    $file = $_FILES['image']; //files transmits file contents
    
    //getting file attributes
    $fileName = $file['name']; //gets name of file
    $fileTmpName = $file['tmp_name']; //gets temp location of file
    $fileSize = $file['size']; //gets size of file
    $fileError = $file['error']; //checks if error while uploading file
    $fileType = $file['type']; //gets type of file, /png

    if ($fileSize == 0) {
        $fileNameNew = "defaultHero.png";

    } else {
        //restricting file types
        $fileExt = explode('.', $fileName); //splits file name into file name and file type
        $fileActualExt = strtolower(end($fileExt)); //makes file type lowercase
        $allowed = array('jpg', 'png', 'jpeg');
        $fileNameNew = uniqid('','true').".".$fileActualExt; //creates unqiue id for each image because if images have same name, gets overriden        

        //checks if correct file type is in file
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0) {
                //0 means no error uploading
                //restricting file size
                if($fileSize < 5000000)/*5000000 = 5mb */{
                    $fileDestination = 'Uploads/'.$fileNameNew;
                    //uploading file function
                    move_uploaded_file($fileTmpName, $fileDestination); //moves file from temp location to real one
                    echo 'Success!!';
                    header("Location: heroes.php?uploadSucess=1"); //brings back to heroes.php
                }else {
                    echo 'Your file is too big! Try uploading another file!';
                }
            } else if($fileError === 1) {
                //1 means error uploading
                echo 'There was an error uploading your file';
            }
        } else {
            echo 'Wrong file type. Only jpg, png or jpeg is allowed';
        }
    }
    
    $image = $fileNameNew;
    $description = $_POST['description'];
    $zipcode = $_POST['location'];
    $job = $_POST['job'];
    $contact = $_POST['contact'];
    $newslink = $_POST['news'];    
    
    $sql = "INSERT INTO heroes (image, zipcode, job, description, contact, news) VALUES (?, ?, ?, ?, ?, ?)"; //need to bind params for placeholders to work
    $statement = mysqli_stmt_init($connection);

    //prepare statement
    if(!mysqli_stmt_prepare($statement, $sql)){
        header("Location: heroes.php?"); //brings back to heroes.php
        exit();
    } else {
        //storing info in database (3 params of info)
        mysqli_stmt_bind_param($statement, "ssssss", $image, $zipcode, $job, $description, $contact, $newslink);
        mysqli_stmt_execute($statement);
        header("Location: connectHeroScript.php"); //brings back to heroes.php
        exit();
    }    
}

mysqli_close($connection);

?>