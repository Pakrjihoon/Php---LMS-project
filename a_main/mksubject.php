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
if($_POST[mk_year] == 2018 && $_POST[mk_semester] == 1)
{
    $sql = "insert into Opensubject select '$_POST[mk_number]', '$_POST[mk_sub_num]', '$_POST[mk_year]', '$_POST[mk_semester]', '$_POST[mk_prof_num]'
from dual where exists(select sub_num from Subject where sub_num = '$_POST[mk_sub_num]' and semester = '$_POST[mk_semester]')";

if ($conn->query($sql) === TRUE) {
    header('Location: /a_main/a_inputsub.php');
} else {
    echo "<script>alert(\"중복 되었거나 값을 잘못넣었습니다.\");</script>";
    echo "<meta http-equiv='refresh' content='0; url=/a_main/a_inputsub.php'>";
    }
}
else{
    echo "<script>alert(\"중복 되었거나 값을 잘못넣었습니다.\");</script>";
    echo "<meta http-equiv='refresh' content='0; url=/a_main/a_inputsub.php'>";
}

$conn->close();
?>

