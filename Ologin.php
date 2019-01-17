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

$sql = "select prof_num from Professor where prof_num = '$_POST[s_number]'";

    $result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);
    
if ($_POST[s_number] == "admin") {
    header("Location: /a_main/a_index.php");
} else {
    echo  "<script>alert(\"관리자 번호를 확인해주세요\"); window.location.replace('/login.php');</script>";
}

$conn->close();
?>