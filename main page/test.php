<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">   
         
    </head>
    <body>
        
    </body>
</html>
<?php
 //Header("Location:allcourse.php"); 
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
$stu_numberss = unserialize($_SESSION['numbers']);

$list = $_POST['use'];
for($i=0; $i < sizeof($list); $i++){
    $sql = "insert into Sugang(sg_stu_num, sg_osu_num, sg_approval, sg_grade) values ('$stu_numberss','$list[$i]', null, null)";
    //echo " $list[$i]";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert(\"정상적으로 수강신청 완료\");</script>";
        echo "<meta http-equiv='refresh' content='0; url=allcourse.php'>";
    }
    else {
        echo "<meta http-equiv='refresh' content='0; url=allcourse.php'>";
        //echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<script>alert(\"이미 수강신청이 되있습니다.\");</script>";
        
    }
}
$conn->close();
?>



