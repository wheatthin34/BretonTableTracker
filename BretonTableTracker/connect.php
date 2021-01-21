<?php
// Connection to live server database
// $connection = mysqli_connect('localhost', 'root', 'U6dvtx40FrvG', 'projectmanagement');

// Connection to local database
$connection = mysqli_connect('localhost', 'root', 'U6dvtx40FrvG', 'bretonTableTracker');

if (!$connection){
    die("Database Connection Failed" . mysqli_error());
}
?>
