<?php
require 'dbhScript.php';
require 'header.php';


if(isset($_POST['submithelp'])){
    $name = $_POST['name'];
    $zipcode = $_POST['zipcode'];
    
    if(isset($_POST['serviceneeds'])){
        $servicesNeeded = $_POST['serviceneeds'];
    } else {
        echo 'You need to choose one option!';
        exit();
    }
    $contact = $_POST['contact'];
    $extra = $_POST['extra'];
    
    $sql = "INSERT INTO helpNeeded (name, zipcode, services, contact, extra) VALUES (?, ?, ?, ?, ?)"; //need to bind params for placeholders to work
    $statement = mysqli_stmt_init($connection);
    
    if(!mysqli_stmt_prepare($statement, $sql)){
        header('connections.php?somethingwrong');
        exit();
    } else {
        //storing info in database (3 params of info)
        mysqli_stmt_bind_param($statement, "sssss", $name, $zipcode, $servicesNeeded, $contact, $extra);
        mysqli_stmt_execute($statement); 
        //header ('Location: helpersScript.php'); //header to helpers page
    }
}

?>

<main>
<link rel = "stylesheet" href = "helpRequests.css">
<div id = "topstuff">
    <h1> Find COVID Allies </h1>
    <h3> Following in the footsteps of our heroes </h3>
</div>  
  


</main>
<?php
require_once 'dbhScript.php';

$result = mysqli_query($connection, 'SELECT * FROM helpNeeded') or die("could not find results");


echo "<div class = 'helpgrid'><div id = 'elementone'>";
$count = mysqli_num_rows($result);
echo $count." result(s) found";


echo "<table id = 'helptable' style = 'width: 98%; margin-left: 1%; '>
<caption style = 'font-size: 1.5em; font-weight: 700; color:#3661e2;'>THOSE IN NEED OF ALLIES</caption>
<tr>
<th>Name </th>
<th>Zipcode </th>
<th>Services Needed </th>
<th>Contact Info </th>
<th>Extra Info </th>
</tr>";

while($row = mysqli_fetch_array($result)){
    
    $name = $row['name'];
    $zipcode = $row['zipcode'];
    $servicesNeeded = $row['services'];
    $contact = $row['contact'];
    $extra = $row['extra'];
    
    $output = "
    <tr>
    <td>$name</td>
    <td>$zipcode</td>
    <td>$servicesNeeded</td>
    <td>$contact</td>
    <td>$extra</td>
    </tr>
    ";  //css grid code
    echo $output;
    
}
echo '</table></div>';
?>

<main>
<script type="text/javascript" language="javascript" src="TableFilter/tablefilter.js"></script>  

<script language="javascript" type="text/javascript">  
var tableFilters = {  
    col_2: "select",  
    col_3: "none",
    col_4: "none",  
    btn: true  
}  
var tf = setFilterGrid("helptable",1,tableFilters);  
</script>  
</main>

<!--____________________________________________________________________________________-->

<?php
require_once 'dbhScript.php';

$result = mysqli_query($connection, 'SELECT * FROM helpers') or die("could not find results");


echo "<div id = 'elementtwo'>";
$count = mysqli_num_rows($result);
echo $count." result(s) found";

echo "<table id = 'helperstable' style = 'width: 98%; margin-right:1%;'>
<caption style = 'font-size: 1.5em; font-weight: 700; color:#3661e2;'>ALLIES AVAILABLE</caption>

<tr>
<th>Name </th>
<th>Zipcode </th>
<th>Services Offered </th>
<th>Contact Info </th>
<th>Extra Info </th>
</tr>";

while($row = mysqli_fetch_array($result)){
    
    $name = $row['name'];
    $zipcode = $row['zipcode'];
    $servicesOffered = $row['services'];
    $contact = $row['contact'];
    $extra = $row['extra'];
    
    $output = "
    <tr>
    <td>$name</td>
    <td>$zipcode</td>
    <td>$servicesOffered</td>
    <td>$contact</td>
    <td>$extra</td>
    </tr>
    ";  //css grid code
    echo $output;
    
}
echo '</table></div></div>';
?>

<main>

<script language="javascript" type="text/javascript">  
var tableFilters2 = {  
    col_2: "select",  
    col_3: "none",
    col_4: "none",  
    btn: true  
}  
var tf2 = setFilterGrid("helperstable",1,tableFilters2);  
</script>  
</main>




<?php
mysqli_free_result($result);
mysqli_close($connection);
?>




