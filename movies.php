<!doctype html>
<html lang="en">
<body>
<h1>List of ALL my MOVIES !!!</h1>
<table class="table table-striped">
<div class="container mt-4">
  <h2 class="mb-3 text-center">Welcome to my games table</h2>
<?php
// Connect to database
include("db.php");
// Run SQL query
$sql = "SELECT * FROM movies ORDER BY movie_name";
$results = mysqli_query($mysqli, $sql);
?>
<?php while($a_row = mysqli_fetch_assoc($results)):?>
<tr>
<td><?=$a_row['movie_name']?></td>
<td><?=$a_row['genre']?></td>
<td><?=$a_row['price']?></td>
<td><?=$a_row['date_of_release']?></td>
</tr>
<?php endwhile;?>
</div>
  ...
</table>
</body>
</html>