<?php
require_once 'functions.php';
require 'header.php';

?>


<html>
<head>
<link rel = 'stylesheet' href = 'home.css'>
</head>
<body style = "background-color: rgb(243,243,243)">

<div id = "quote">
    <h1> COVID Heroes </h1>
    <h3> Recognizing those who have put their communities before themselves </h3>
</div>

<style>
    #quote {
    background-image: url("Pictures/hope.jpg");
    background-repeat: no-repeat;
    background-size: 100%;
    height: 50%;
}

#quote h1 {
    color: rgb(114, 14, 61);
    font-family: 'Yanone Kaffeesatz', sans-serif;
    font-size: 4em;
    position: relative;
    left: 37.5%;
    top: 40%;
}

#quote h3 {
    position: relative;
    font-size: 2em;
    left: 15%;
    top: 45%;
}

</style>


<?php



//connect script 

//WORK TO DO
// figure out how to print results onto same page
// make sure page cant be accessed without user being signed in

echo '<p style = "margin-left: 0.5%; margin-top: 0.5%;"> To view your local heroes, enter your Zip Code and press Go. To view all heroes, just press Go. </p>';
searchBar();

echo '<br><h3 style = "margin-left: 4%;">OR</h3><br><a href = "heroes.php"> <button style = "margin-left: 2%; width: 15%; height: 5%; font-size: 1.25em;"> Nominate Heroes </button> </a>';


generateHeroesHtml();

?>

</body>
</html>
