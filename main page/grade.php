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
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
							<header id="header">
								<a href="grade.php" class="logo">학생 성적 조회</a>
								<ul class="action">
									<div style="text-align:right">
									<?php
										echo "<a href=\"https://dbterm-bbakji.c9users.io/Logout.php\"class=\"button\"><span class=\"label\">Log out</span></a>";
									?>
								</div>
								</ul>
							</header>
							<!-- Content -->
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
      
    $stu_numberss = unserialize($_SESSION['numbers']);
	
 $sql="select a.sub_name, b.sg_grade from Subject_view a, Sugang_view b, Opensubject_view c
where b.sg_stu_num = '$stu_numberss' and c.osu_make_num = b.sg_osu_num and a.sub_num = c.osu_sub_num and b.sg_approval = 'Y';";     // SELECT 구문을 통해 테이블 가져옴
  
    
    $result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
        $row[$i]=mysqli_fetch_array($result);     // 반복
    }    
  
                  echo "<br><font size=5 color=#3d4449><b>성적 조회</b></font><br><br>
    <table border = 1>
    <tr> 
    <td width=150 height=30  align=center><b>과목이름</td>
    <td width=150 height=30  align=center><b>성적</td>
    </tr>
    </table>";
    
 
    for($i = 0; $i < $numrow; $i++){ 
        $mName[] = $row[$i][0];  
        $Grades[] = $row[$i][1];
         echo "  
    
 

<table border = 1>

        <tr>
            <td colspan=2 width=250 height=30  align=center>$mName[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$Grades[$i]</td>
         </tr>
</table>
            ";
    }

$conn->close();
?>
<form action="index.php" method = "POST">
			<p align = "center">
            <input type="submit" value="확인"/>
</form>
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
      
    $stu_numberss = unserialize($_SESSION['numbers']);
    
    $sql="select stu_num, stu_name, stu_major_name, stu_grade from Student where stu_num = '$stu_numberss'";     // SELECT 구문을 통해 테이블 가져옴

    $result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인  
    
    $row[0] = mysqli_fetch_array($result);
    
    $sNums= $row[0][0];
    $sNames = $row[0][1];
    $mNames = $row[0][2];
    $grade = $row[0][3];
  
     echo "<h5>학과 : $mNames&nbsp<br/> 학번 : $sNums<br/> 학년 : $grade 학년 <br/>성명 : $sNames 님<br/> 환영합니다</h5>";
?>
								</section>

							<!-- Menu -->
							<nav id="menu">
								<header class="major">
									<h2>Menu</h2>
								</header>
								<ul>
								<li><a href="index.php">Home</a></li>
									<li><a href="allcourse.php">개설교과목 조회 및 수강 신청</a></li>
									<!--<li><a href="curricum.php">수강신청</a></li>-->
									<li><a href="grade.php">성적 조회</a></li>
									<li><a href="counsel.php">상담 조회</a></li>
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
