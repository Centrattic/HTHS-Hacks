<?php
require "header.php";
require_once 'dbhScript.php';
?>

<main>

<link rel = "stylesheet" href = "home.css">
<div id = "quote">
<h1><b> Recognizing Our Heroes <br> and Inspiring More. </b> </h1>

<?php
if(isset($_SESSION['UserID'])){
  echo '<a href = "connections.php" > <button> Get Involved </button></a>';
} else {
  echo '<a href = "signup.php" > <button> Get Involved </button></a>';
}
?>

</div>

<h3 style = "margin: 0.5%; margin-left: 2%;"> *NOTE - You will not be able to view more heroes or get involved without signing into our website! </h3>
<div id = "entireheroes">
<br><br>

<h2 id = "heroesh2"> Our Heroes</h2>
<!--<p> During this pandemic, many of us have stepped up and started movements that have empowered thousands to battle the virus. Whether it is from sewing homemade masks or donating food to food banks, these COVID Heroes have played their part in helping humanity fight COVID-19. The COVID Heroes section of our website aims to honor these heroes for of all their hard work. </p>
-->

<div id = "herobutton">
<?php 
if(isset($_SESSION['UserID'])){
  echo '<a href = "connectHeroScript.php" ><button> See more </button> </a>';
} else{
  echo '<a href = "signup.php" ><button> See more </button> </a>';
}
?>
</div>
<div class = "heroes">
<div id = "bigone">

<?php 
//$username="shishir";//

echo "<div class=grid-container>
<div class=grid-item id = img> <img src = 'Uploads/mrbeast.png' width = 100% height = 100%> </div>
<div class=grid-item id = description> <h3> About: </h3> <p> Mr. Beast is a Youtuber who makes videos where he spends crazy amounts of money on odd things. </p> </div>
<div class=grid-item id = location ><h3> Location: </h3> <p> 27834 </p> </div>
<div class=grid-item id = work><h3> Hero's Work: </h3> <p> Mr. Beast fundraised to donate 1 million servings of protein to 6 food banks in his local area. </p> </div>
<div class=grid-item id = contact><h3> Contact: </h3> <p><a href = 'https://www.youtube.com/user/MrBeast6000/videos' > Mr. Beast's Youtube Channel</a> </p></div>
<div class = grid-item id = news> <h3> News Links: </h3> <p> </p> </div>
</div>";

?>

</div>

<div id = "bigtwo">
<div class="grid-container">
<div class= grid-item id = img ><img src = 'Uploads/harvest.png' width = 100% height = 100%></div>
<div class= grid-item id = description><h3> About:</h3> <p> City Harvest is an organization that serves people in the New York City Area. </p> </div>
<div class= grid-item id = location ><h3> Location:</h3> <p> 10001 </p> </div>
<div class= grid-item id = work><h3> Hero's Work: </h3> <p> City Harvest is an organization that delivers food to people who are unable to afford it during this time. Thousands of people in New York City are relying on City Harvest for daily food.</p> </div>
<div class= grid-item id = contact ><h3> Contact:  </h3> <p><a href = 'https://www.cityharvest.org/volunteer/volunteer/'> City Harvest Website </a> </p></div>
<div class = grid-item id = news> <h3> News Links: </h3> <p> </p> </div>
</div>

</div>

<div id = "bigthree">
<div class="grid-container">
<div class= grid-item id = img > <img src = 'Uploads/kraus.png' width = 100% height = 100%></div>
<div class= grid-item id = description><h3> About: </h3> <p> Jacob Kraus is a 16-year old from Long Beach, California.</p></div>
<div class= grid-item id = location ><h3> Location:  </h3> <p> 90712 </p></div>
<div class= grid-item id = work><h3>  Hero's Work: </h3> <p> Jacob Kraus created COVID-Connections.com, which pairs people needing help with a healthy volunteer to perform tasks like grocery shopping and medication delivery. </p> </div>
<div class= grid-item id = contact ><h3> Contact: </h3> <p> jacob@covidconnections.com </p> </div>
<div class = grid-item id = news> <h3> News Links: </h3> <p> </p> </div>
</div>
</div>

</div>
<br><br>
</div>

<div class = "total">
<div class = "continuing">
<h2> Continuing the work of our heroes.</h2>
<br>
<p>Every day, more than 2,000 people die from COVID-19 in the US alone. But there's another side to the COVID story. 
Every day, millions of heroes, healthcare workers, delivery people, garbage collector, and of course, ordinary people, 
go out of their way to help others through this pandemic. Whether they sew homemade masks or donate food to food banks, 
these people have played their part in helping humanity fight COVID-19. What better way to recognize our COVID heroes than to continue 
their work? Through this platform, we learn more about the heroes of today and honor them by helping out in our own communities and homes. </p>
</div>

<div id = "continueimg">
<img src = "https://cdn.pixabay.com/photo/2020/04/10/17/25/doctor-5026886_960_720.jpg" width = 55%>
</div>

</div>

<h2> Get Involved </h2>
<div class = "connect">

<div id = connectp><p> 
You can get involved by following in the footsteps of our heroes by signing up to be an ally on <br> our COVID Allies page,
where you can request and offer help in a variety of areas, all online!
</p></div><br>
<div id = connectul> <ul class = "ullist"> 
<li>Tutoring</li> 
<li>Someone to talk to</li> 
<li> Giving Resources</li>
<li> Donating Money</li>
<li> Technology Help</li>
<li> etc. </li>
</ul> </div>
<div id = connecthelp><?php
if(isset($_SESSION['UserID'])){
  echo '<a href = "connections.php"> <button> I want to be an Ally</button> </a>';
} else {
  echo '<a href = "signup.php"> <button> I want to be an Ally </button> </a>';
}
?>
</div>
<div id = connectneed>
<?php
if(isset($_SESSION['UserID'])){
  echo '<a href = "connections.php"> <button> I need an Ally </button> </a>';
} else {
  echo '<a href = "signup.php"> <button> I need an Ally </button> </a>';
}
?>
</div>
</div>

<div id = "totalimpact">
<div id = "personal"> 
<h2 id = "impact"> Our Impact </h2> 
<p class= "stats"> <b>[NUM]+</b> Heroes Recognized </p> <br>
<p class= "stats"> <b>[NUM]+ </b> Global Volunteers </p> <br>
<p class= "stats"> <b> [NUM]+ </b> Help Requests Completed </p> 
</div>
</div>





<div id = "About">
<h2 id = "allAbout"> All About Us </h2>
<p id = "Mission"> We are on a mission to <b>recognize</b> and <b>honor</b> COVID Heroes on the frontlines and <b>inspire</b> others to 
involve and <b>engage</b> local members of their community to help each other during this difficult time. 
From doctors to UPS workers, these COVID Heroes have put their communities above themselves. It is our responsibility
to honor these members of our communities, as they deserve. </p> 
<div class = "aboutgrid">
<div id = pic >
<img src = "Pictures/TanishRiya.png" >
</div>


<div id="tbio">
<!--   <img class = "creators" id = "tanish" src = "Pictures/tanish.png">-->
<p id = "tanishBio">Tanish is a freshman at Millburn High School. He has taken courses in Web Development, Game Development with Python, Java, APIs, and is currently enrolled in Data 
Structures and Machine Learning courses. His favorite food is pizza with gold shavings on top, although he has never eaten it.</p> 
</div>

<div id="rbio">
<!--   <img class = "creators" id = "riya" src = "Pictures/Riya.jpg" > -->
<p id = "riyaBio" >Riya is a student at Millburn Middle School. She enjoys programming Arduino, building games using Python, 
and Web Development. She is currently learning PHP and Machine Learning. Her favorite food is plain yogurt. </p>
</div> 

</div>



</main>

<?php
require "footer.php";
?>