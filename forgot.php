<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Log-in</title>
  


  <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css" >
  <script>
    
    
  </script>
</head>

<body>
  <center>
  <div class="checkman">
    <h1>Find My Student Number</h1><br>
        <form action="#" method="POST">
            <input type="text" name="s_name" placeholder="Username"><br/><br/>
            <input type="submit" name = "submit" value="검색"/>
        </form>
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
if(isset($_POST['submit'])){
    echo "　";
    $sql = "select stu_num from Student where stu_name = '$_POST[s_name]'";
    	$result=mysqli_query($conn,$sql);
    	$numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    	for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
    		 $row[$i]=mysqli_fetch_array($result);     // 반복
    	}
    	
    	for($i = 0; $i < $numrow; $i++){ 
        $sNun[] = $row[$i][0];  
         echo "  
<table border = 1>

        <tr>
            <p><td colspan=2 width=250 height=30  align=center>학번 : $sNun[$i]</td></p>
         </tr>
</table>
            ";
    }
}
?>
  </center>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

</body>
</html>


