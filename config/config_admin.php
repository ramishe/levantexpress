<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'db.3wa.io');
define('DB_USERNAME', 'ramisheikhelsouk');
define('DB_PASSWORD', '91bcb42e879e6e380c0920d0fdaac8b2');
define('DB_NAME', 'ramisheikhelsouk_levantexpress');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

 