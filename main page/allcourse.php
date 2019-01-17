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
            var f = document.list;
            var size = document.getElementsByName('use[]');
            var CheckAll = null;
            for(var i = 0; i < size.length; i++){
                if(size[i].checked == true){
                    CheckAll = size[i].value;
                    if(action == "send"){
                        f.action = "test.php";
                    }
                }
                else{
                }
            }
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
								<a href="allcourse.php" class="logo">개설 교과목 조회 및 수강 신청</a>
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
      
    $stu_numberss = unserialize($_SESSION['numbers']);
    
    $sql="select stu_num, stu_name, stu_major_name, stu_grade from Student where stu_num = '$stu_numberss'";     // SELECT 구문을 통해 테이블 가져옴

    $result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인  
    
    $row[0] = mysqli_fetch_array($result);
    
    $sNums= $row[0][0];
    $sNames = $row[0][1];
    $mNames = $row[0][2];
    $grade = $row[0][3];
    
    $sqls="select distinct a.osu_make_num, a.osu_sub_num, a.osu_year, a.osu_sub_semester, a.osu_prof_num, b.sub_name, b.sub_major_name, b.goal_grade, b.division 
from Opensubject_view a, Subject_view b
where ((b.sub_major_name = '$mNames' and b.goal_grade = $grade and b.division = '전공') or (b.goal_grade = $grade and b.division = '교양')) and a.osu_sub_num = b.sub_num and a.osu_sub_semester=1 and a.osu_year = 2018";
    
    $results=mysqli_query($conn,$sqls);
    $numrows = mysqli_num_rows($results);   //총 몇 개의 행을 불러왔는지 확인
    
    
    for($i=0; $i<$numrows; $i++){                 //행(ROW) 수 만큼 
        $rows[$i]=mysqli_fetch_array($results);     // 반복
    }    
                  echo "<font size=5 color=#3d4449><b>현재 개설 교과목</b></font><br><br>
                  <table border = 1>
    <tr> 
    <td colspan=2 width=250 height=30  align=center><b>개설번호</td>
    <td colspan=2 width=250 height=30  align=center><b>과목번호</td>
    <td colspan=2 width=250 height=30  align=center><b>년도</td>
    <td colspan=2 width=250 height=30  align=center><b>학기</td>
    <td colspan=2 width=250 height=30  align=center><b>교수번호</td>
    <td colspan=2 width=250 height=30  align=center><b>과목이름</td>
    <td colspan=2 width=250 height=30  align=center><b>학과</td>
    <td colspan=2 width=250 height=30  align=center><b>학년</td>
    <td colspan=2 width=250 height=30  align=center><b>전공/교양</td>
    <td colspan=2 width=250 height=30  align=center><b>수강신청</td>
    </tr>
    </table>";
    
    for($i = 0; $i < $numrows; $i++){ 
        $osumake_num[] = $rows[$i][0];  
        $osusub_num[] = $rows[$i][1];           
        $osuyear[] = $rows[$i][2];
        $osu_sub_sem[] = $rows[$i][3];
        $osu_prof[] = $rows[$i][4];
        $sub_Grade[] = $rows[$i][5];
        $sub_name[] = $rows[$i][6];
        $sub_major[] = $rows[$i][7];
        $division[] = $rows[$i][8];
        echo "  
<form name = \"list\">
    <table border = 1>
        <tr>
            <td colspan=2 width=250 height=30  align=center>$osumake_num[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$osusub_num[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$osuyear[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$osu_sub_sem[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$osu_prof[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$sub_name[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$sub_Grade[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$sub_major[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$division[$i]</td>
            <td colspan=2 width=250 height=30  align=center><input type=\"checkbox\" Id = \"pow[$i]\" name = \"use[]\" value=\"$osumake_num[$i]\"><label for = \"pow[$i]\"></label></td>
         </tr>
    </table>
</from>

            ";
    }
    echo "<p align = \"center\">";
    echo "<input type = \"button\" value = \"수강신청\" onclick = \"sendData('send');\">";

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
      
    $stu_numberss = unserialize($_SESSION['numbers']);
    
    $sql="select stu_num, stu_name, stu_major_name, stu_grade from Student_view where stu_num = '$stu_numberss'";     // SELECT 구문을 통해 테이블 가져옴

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
