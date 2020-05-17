<?php
if (!function_exists('searchBar'))   {
    function searchBar() {
        echo '<form action = "connectHeroScript.php" method = "post">
        <input type = "text" name = "Search" placeholder = "Search for Heroes by Zip Code" style = "width: 18.5%; height: 5%; font-size: 1.25em; margin-left: 2%; margin-top: 2%; margin-right: 2%;">
        <input type = "submit" value = "Go" style = "width: 5%; height: 5%; font-size: 1.25em; margin-left: -1.5%;">
        </form>';
    }
}

if (!function_exists('connectToDB'))   {

    function connectToDB() {
        
        //prepared statement for security
        $database = "localhost";
        $username = "root";
        $password = ""; //password might change
        $mysqli = mysqli_connect($database, $username, $password) or die ("could not connect");
        $mysqli->select_db("distancehacks_login") or die("could not find database"); //DistanceHacks might change based on name of database
        return $mysqli;
        
    }
}

if (!function_exists('generateHeroesHtml'))   {

    function generateHeroesHtml() {
        
        $mysqli = connectToDB();
        
        //collecting info from form
        if(isset($_POST['Search'])){
            
            $searchq = $_POST['Search'];
            //filter out chars that are not nums because only searching for zip code
            //$searchq = preg_replace("#[^0-9]#", "", $searchq); //replaces all chars of searchq that are not a num with blank
            
            //sql query to search database
            $sqlquery = "SELECT * FROM heroes WHERE zipcode LIKE '%$searchq%' ";

            $result = $mysqli->query($sqlquery) or die ("could not search");

            $count = mysqli_num_rows($result);
            $index=0;
            
            if ($count == 0){
                echo "<p style = 'margin-left:2%; font-size: 1.5em;'><br><br>There are no heroes in this area; click the button above to nominate one!</p>";
            } else {
                echo "<br><br>Found $count Heroes!!<br>";

                while($row = mysqli_fetch_array($result)){
                    
                    if ($index%3 == 0) {
                        echo "\n<div class = heroes>";
                    }
                    
                    $image = $row['image'];
                    $job = $row['job'];
                    $description = $row['description'];
                    $contact = $row['contact'];
                    $zipcode = $row['zipcode'];
                    $news = $row['news'];

                    if ($image == "") {
                        $image = "defaultHero";
                    }

                    $newslinktext = "";
                    if ($news != "") {
                        $newslinktext="Hero's News Link";
                    }

                    
                    $output = "
                    <div class=grid-container>
                    <div class=grid-item id = img > <img style = 'width: 100%; max-height: 100%;' src=Uploads/$image> </div>
                    <div class=grid-item id = description> <h3> About:</h3> <p>$description</p></div>
                    <div class=grid-item id = location ><h3> Location: </h3> <p> $zipcode </p></div> 
                    <div class=grid-item id = work> <h3> Hero's Work: </h3> <p> $job </p></div>
                    <div class=grid-item id = contact ><h3> Contact: </h3> <p>$contact </p></div>
                    <div class = grid-item id = news> <h3> News Link(s): </h3> <p> <a href = \"$news\"> $newslinktext </a> </p></div>

                    </div>";  //css grid code
                    echo $output;
                    
                    if ($index%3 == 2) {
                        echo "\n</div><br><br>";
                    }
                    $index++;
                    
                }
                
                if ($index%3 != 0) {
                    echo "\n</div>";
                }
                
            }
            mysqli_free_result($result);
        }

        mysqli_close($mysqli);
    }
}
?>
