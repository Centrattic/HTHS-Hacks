<?php
require 'header.php';
require_once 'functions.php';
?>
<html>
<head>
    <link rel = "stylesheet" href = "heroes.css">
</head>
<body>

<?php
searchBar();
?>

<img id = "helpers" src = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRWhjyIBG3Lrsh9JywPDlJ5AM8VGAJ8CalMgEPEIIrrFXGeolW8&usqp=CAU">

<span id = "text"> *THIS TEXT CAN BE SUBJECT TO CHANGE, DRAFT * This page has been created to recognize those who have risked their lives in order to help those 
    in need during this time. You can nominate a hero by scrolling down and filling out the form. You can also search for COVID-Heroes 
    all around the world by going to the search heroes page on our dropown menu underneath COVID-Heroes.
</span>



<br><br>

<div id = directions>
<h2> Nominate a COVID Hero!</h2>
<h4> In your form, please don't use any inapproriate or spam entries or your nomination will be removed and your account banned. Also, 
    do not write in full sentences when filling out the contact and location sections. </h4> 
</div>

<br><br>

<div id = "border">
    <p class= large> Upload Your Image of a COVID Hero </p>
    <p> Only use .jpeg, .png, or .jpg for your image. For best results, use an image with a slightly longer length than width. </p> <br>
    <!-- nominate hero form -->  
    <form action = "fileUploadScript.php" method = "post" enctype = "multipart/form-data" id ="nominate"> <!-- enctype says how form data should be formateed -->
    <input type = "file" name = "image" placeholder = "Upload image of COVID Hero (5MB max)">

    <br>
    <!-- 
    <button type = "submit" name = "upload">Upload </button>
    </form>
    <form action = "saveHeroInDB()" method = "post" enctype = "multipart/form-data">  enctype says how form data should be formateed -->

    <!--
    <input type = "text" name = "description" placeholder = "Description of Hero's Actions (20 words max)">
    <input type = "text" name = "location" placeholder = "Hero's Zip Code"> 
    <input type = "text" name = "job" placeholder = "What the Hero has Done (30 words max)">
    <input type = "text" name = "contact" placeholder = "Hero's Phone Number/Email Address">
    <button type = "submit" name = "nominate"> Nominate Hero</button>
    -->
    <br>
    <p class= large> All About Your Hero (20 words max) </p>
    <p> Ex. Josh Chun is a Millburn High School student who loves plain yogurt, coding, and geometry class. </p> <br>
    <textarea name = "description" rows = 5 placeholder = "Personal Description of Hero (20 words max)" > </textarea> <br><br>
    <p class= large> Hero's Location </p>
    <p> Ex. 07078 (put only a zip code)</p> <br>
    <textarea name = "location" placeholder = "Hero's Zip Code" rows = 5 maxlength = "300"> </textarea> <br><br>
    <p class= large> What Has Your Hero Done? </p>
    <p> Ex. Josh Chun sews masks and donates them to Goodwill shelters during this period. </p> <br>
    <textarea name = "job" placeholder = "What the Hero has Done (30 words max)" rows = 5 maxlength = "300"> </textarea> <br><br>
    <p class= large> Way to Contact Hero </p>
    <p> Please type only a phone number and/or email address. </p>
    <textarea name = "contact" placeholder = "Hero's Phone Number/Email Address" rows = 5 > </textarea> <br><br>
    <p class= large> Hero's News Links </p>
    <p> Please put, maximum, one news link of your hero's. </p>
    <textarea name = "news" placeholder = "News URL" rows = 3> </textarea> <br><br>
    
    <button type = "submit" name = "nominate"> Nominate Hero</button>
    

    </form>
</div>
<?php
if(isset($_GET['uploadSucess'])){
    echo "<br><br>Nomination successful!!";
}
?>

</body>
</html>