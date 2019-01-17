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

$sql = "select stu_num from Student where stu_num = '$_POST[s_number]'";

    $result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);
    
    session_start();
    $stu_number = $_POST[s_number];
    $_SESSION['numbers'] = serialize($stu_number);
    
if ($numrow > 0) {
    header("Location: /main%20page/");
} else {
    echo  "<script>alert(\"학번을 확인해주세요\"); window.location.replace('/login.php');</script>";
}


$conn->close();
?>