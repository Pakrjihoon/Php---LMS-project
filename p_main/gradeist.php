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
Header("Location:p_input.php"); 
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, $dbport);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$list1 = $_POST['use']; //성적
$list2 = $_POST['user']; //학번
$list3 = $_POST['users']; //개설번호
//$woo = explode(',', $list);
//echo "$list1[2]";
for($i=0; $i < sizeof($list1); $i++){
    if($list1[$i]==""){
        $list2[$i] = null;
        $list1[$i] = null;
        $list3[$i] = null;
    }
    echo "$list1[$i] $list2[$i] $list3[$i]";
}


for($i=0; $i < sizeof($list2); $i++){
    $sql = "update Sugang set sg_grade = '$list1[$i]' where sg_stu_num = '$list2[$i]' and sg_osu_num = '$list3[$i]'";
    if ($conn->query($sql) === TRUE) {
    
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

