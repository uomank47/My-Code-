
<?php
// Read values from the form
$game_name = $_POST['GameName'];
$game_description = $_POST['GameDescription'];
$release_date = $_POST['release_date'];
$rating = $_POST['rating'];
// Connect to database
include("db.php");
// Build SQL statement
$sql = "UPDATE videogames 
 SET game_name = '{$game_name}', 
 game_description = '{$game_description}', 
 released_date = '{$release_date}', 
 rating = '{$rating}' 
 WHERE game_id = {$game_id}";

// Run SQL statement and report errors
if(!$mysqli -> query($sql)) {
echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
}
// Redirect to list
header("location: website.php");
?>







