<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">   
         
    </head>
    <body>
        
    </body>
</html>
<?php
 Header("Location:a_agree.php"); 
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
$list2 = implode($list,",");
$woo = explode(',', $list2);


for($i=0; $i < sizeof($list); $i++){
    $stuNum[] = $woo[$i*2];
    $osuNum[] = $woo[$i*2+1];
    $sql = "update Sugang set sg_approval = 'Y' where sg_stu_num = '$stuNum[$i]' and sg_osu_num = '$osuNum[$i]'";
    if ($conn->query($sql) === TRUE) {
    
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>