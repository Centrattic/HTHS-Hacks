<?php
session_start();
session_unset(); //deletes old session variable vals
session_destroy();
header("Location: index.php"); 
?>