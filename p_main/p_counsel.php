<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>학사관리 시스템(Term)</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script>
			function sendData(action){
            	var f = document.High;
            	if(action == "send")
                	f.action = "c_show.php";
            	else if(action == "asend")
	                f.action = "c_input.php";
                
    	        f.method = "POST";
        	    f.submit();
        	}
		</script>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
							<header id="header">
								<a href="p_counsel.php" class="logo">상담 입력 및 조회</a>
								<ul class="action">
									<div style="text-align:right">
									<?php
									echo "<a href=\"https://dbterm-bbakji.c9users.io/Logout.php\"class=\"button\"><span class=\"label\">Log out</span></a>";
									?>
								</div>
								</ul>
							</header>
							<!-- Content -->
								<section>
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
	$prof_numbers = unserialize($_SESSION['Pnumber']);
 $sql="select * from Student_view where stu_prof_num = '$prof_numbers'";     // SELECT 구문을 통해 테이블 가져옴

    $result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인  
    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
        $row[$i]=mysqli_fetch_array($result);     // 반복
    }    
  
            echo "<font size=5 color=#3d4449><b>상담 신청 학생 목록</b></font><br>
    <table border = 1>
    <tr> 
    <td width=150 height=30  align=center><b>학번</td>
    <td width=150 height=30  align=center><b>이름</td>
    <td width=150 height=30  align=center><b>학년</td>
    <td width=150 height=30  align=center><b>학과</td>
    <td width=150 height=30  align=center><b>교수번호</td>
    <td width=150 height=30  align=center><b>선택</td>
    <td width=150 height=30  align=center><b>조회</td>
    <td width=150 height=30  align=center><b>입력</td>

    </tr>
    </table>";
    
    for($i = 0; $i < $numrow; $i++){          
        $sNum[] = $row[$i][0];  
        $sName[] = $row[$i][1];           
        $sGrade[] = $row[$i][2];
        $sMajor[] = $row[$i][3];
        $sProfnum[] = $row[$i][3];
        $sSex[] = $row[$i][4];
        
                                                
         echo "           
         
         
<form name =\"High\">
	<table border = 1>
    	    <tr>
        	    <td colspan=2 width=250 height=30  align=center>$sNum[$i]</td>
            	<td colspan=2 width=250 height=30  align=center>$sName[$i]</td>
            	<td colspan=2 width=250 height=30  align=center>$sGrade[$i]</td>
            	<td colspan=2 width=250 height=30  align=center>$sMajor[$i]</td>
            	<td colspan=2 width=250 height=30  align=center>$sSex[$i]</td>
            	<input type=\"hidden\" name = \"user[]\" value = \"$sNum[$i]\">
            	<td colspan=2 width=250 height=30  align=center><input type=\"checkbox\" Id = \"pow[$i]\" name = \"use[]\" value=\"$sNum[$i]\"><label for = \"pow[$i]\"></label></td>
            	<td colspan=2 width=250 height=30  align=center><input type = \"button\" value = \"조회\" onclick = \"sendData('send');\"></td>
            	<td colspan=2 width=250 height=30  align=center><input type = \"button\" value = \"입력\" onclick = \"sendData('asend');\"></td>
        	</tr>
	</table>
	
            ";
    }


$conn->close();
?>


								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
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
      
    $prof_numbers = unserialize($_SESSION['Pnumber']);
    
    $sql="select * from Professor where prof_num = '$prof_numbers'";     // SELECT 구문을 통해 테이블 가져옴

    $result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인  
    
    $row[0] = mysqli_fetch_array($result);
    
    $pNums= $row[0][0];
    $pNames = $row[0][1];
    $mNames = $row[0][2];
  
    echo "<h5>학과 : $mNames<br/>성명 : $pNames 님<br/>환영합니다 </h5>";
?>
								</section>

							<!-- Menu -->
							<nav id="menu">
								<header class="major">
									<h2>Menu</h2>
								</header>
								<ul>
									<li><a href="p_index.php">Home</a></li>
									<li><a href="p_search.php">지도학생 정보조회</a></li>
									<li><a href="p_checkst.php">수강명부 조회</a></li>
									<li><a href="p_input.php">성적 입력(정정 및 조회)</a></li>
									<li><a href="p_counsel.php">상담 입력 및 조회</a></li>
								</ul>
							</nav>
							<header class="major">
                              <h2>Portal</h2>
                           </header>
                           <ul class="contact">
                              <li class="fa-envelope-o"><a href="#">sch@sch.ac.kr</a></li>
                              <li class="fa-phone">(041) 530-1273</li>
                              <li class="fa-home">순천향 대학교 멀티미디어관<br />
                              </li>
                           </ul>



						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
