<?php // db.php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

function dbConnect($con='artesania') {
    global $dbhost, $dbuser, $dbpass;
    
    $dbcnx = @mysql_connect($dbhost, $dbuser, $dbpass)
        or die('The site database appears to be down.');

    if ($con!='' and !@mysql_select_db($con))
        die('The site database is unavailable.');
    
    return $dbcnx;
}
?>
