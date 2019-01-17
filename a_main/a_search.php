<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">   
         
    </head>
    <body>
        
    </body>
</html>
<?php
$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$dbname = "c9";
$dbport = 3306;

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $dbport);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();

print_r($_POST['grade']);


$conn->close();
?>



