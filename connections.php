<?php
    require 'header.php';
?>

<link rel = "stylesheet" href = "connections.css">

<div id = "topstuff">
    <h1> COVID Allies </h1>
    <h3> Following in the footsteps of our heroes </h3>
</div>  
<br>
<br>
<table width=50% >
<tr>
<td><a href = "helpRequestsScript.php" > <button style = "margin-left: 2%; margin-top: 1%; width: 95%; height: 5%; font-size: 1.25em; background-color: #3661e2; color: white;"> View Allies</button> </a>
</td><td>
<a href = "#getally" > <button style = "margin-left: 2%; margin-top: 1%; width:95%; height: 5%; font-size: 1.25em; background-color: #3661e2; color: white; "> Get an Ally</button> </a>
</td><td>
<a href = "#beally" > <button style = "margin-left: 2%; margin-top: 1%; width: 95%; height: 5%; font-size: 1.25em; background-color: #3661e2; color: white; "> Be an Ally</button> </a>
</td>
</tr>
</table>

<br><br>
<p style = "text-align: center; font-size: 1.25em;"> Are you a doctor, teacher/tutor, social worker, community member, or organization that can donate time or resources? Fill out the "Be an Ally!" form
  to help out! <br><br> Are you on the front lines of COVID or a senior citizen/community member needing help? Fill out the "Get an Ally!" form to find help! </p>

<br><br>

<div class = "borderallies">
  <form action = "helpRequestsScript.php" method = "post" enctype = "multipart/form-data" id ="helprequest"> <!-- enctype says how form data should be formateed -->
  <h1 id = "getally"> Get an Ally </h1>

  <br>
  <p class = "largeally"> Your name/Organization Name</p>
  <p> Ex. Josh Chun</p> <br>
  <textarea name = "name" rows = 2 cols = 60 placeholder = "Your name/Organization Name" > </textarea> <br><br>
  <p class = "largeally"> Your Location </p>
  <p> Ex. 07078 (put only a zip code)</p> <br>
  <textarea name = "zipcode" placeholder = "Your Zip Code" rows = 1 cols = 60> </textarea> <br><br>
  <p class = "largeally"> What do you need help with? </p>
  <p> Please choose one of the dropdown options. </p> 
    <input type="radio" id = "tutoring" name="serviceneeds" value="Tutoring">
    <label for="tutoring">Tutoring</label><br>
    <input type="radio" id = "techhelp" name="serviceneeds" value="Technology Help">
    <label for="techhelp">Technology Help</label><br>
    <input type="radio" id = "donatedollars" name="serviceneeds" value="Donating Money">
    <label for="donatedollars">Funding</label> <br><input type="radio" id = "resources" name="serviceneeds" value="Resources/Supplies Request">
    <label for="resources">Resources/Supplies Request</label><br>
    <input type="radio" id = "talk" name="serviceneeds" value="Someone to Talk to">
    <label for="talk">Someone to Talk to</label><br>
    <input type="radio" id = "other" name="serviceneeds" value="Other">
    <label for="other">Other</label>
  <p class = "largeally"> Contact Information </p>
  <p> Please type only a phone number and/or email address. </p>
  <textarea name = "contact" placeholder = "Your Phone Number/Email Address" rows = 5 cols = 60> </textarea> <br><br>
  <p class = "largeally"> Extra Information </p>
  <p> Add more details here! For example, if you are asking for donations, you should put a GoFundMe link here for money donations or a mailing address for resource donations. 
      Also, if you need help in an "Other" category, write your specific request here.</p>
  <textarea name = "extra" placeholder = "Extra Information" rows = 5 cols = 60> </textarea> <br>
  <button type = "submit" id = "submithelp" name = "submithelp"> Submit</button>

  </form>
  </div>



<div class = "borderallies" id = "movedown">
  <form action = "helpersScript.php" method = "post" enctype = "multipart/form-data" id ="canhelp"> <!-- enctype says how form data should be formateed -->
  <h1 id = "beally"> Be an Ally </h1>

  <br>
  <p class = "largeally"> Your name/Organization Name</p>
  <p> Ex. Josh Chun</p> <br>
  <textarea name = "name" rows = 2 cols = 60 placeholder = "Your name/Organization Name"> </textarea> <br><br>
  <p class = "largeally"> Your Location </p>
  <p> Ex. 07078 (put only a zip code)</p> <br>
  <textarea name = "zipcode" placeholder = "Your Zip Code" rows = 1 cols = 60> </textarea> <br><br>
  <p class = "largeally"> What can you help with? </p>
  <p> Please choose one of the dropdown options. </p> 
    <input type="radio" id = "tutoring" name="serviceprovider" value="Tutoring">
    <label for="tutoring">Tutoring</label><br>
    <input type="radio" id = "techhelp" name="serviceprovider" value="Technology Help">
    <label for="techhelp">Technology Help</label><br>
    <!--<input type="radio" id = "donatedollars" name="serviceprovider" value="Donating Money">
    <label for="donatedollars">Donating Money</label> <br><input type="radio" id = "resources" name="serviceneeds" value="Resources/Supplies Request">-
    <label for="resources">Resources/Supplies Request</label><br>-->
    <input type="radio" id = "talk" name="serviceprovider" value="Someone to Talk to">
    <label for="talk">Someone to Talk to</label><br>
    <input type="radio" id = "other" name="serviceprovider" value="Other">
    <label for="other">Other</label>
  <p class = "largeally"> Contact Information </p>
  <p> Please type only a phone number and/or email address. </p>
  <textarea name = "contact" placeholder = "Your Phone Number/Email Address" rows = 5 cols = 60> </textarea> <br><br>
  <p class = "largeally"> Extra Information </p>
  <p> If you want those who have made help requests to see any other information about you, please write it here.</p>
  <textarea name = "extra" placeholder = "Extra Information" rows = 5 cols = 60> </textarea> <br>
  <button type = "submit" id = "submithelpers" name = "submithelpers"> Submit</button>

  </form>
</div>

