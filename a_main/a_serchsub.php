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
			function mk_subject(action){
            	var f = document.mksubject;
            	if(action == "mksjt")
                	f.action = "mksubject.php";
                
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
								<a href="" class="logo">개설 교과목 조회</a>
								<ul class="action">
									<div style="text-align:right">
									<?php
										echo "<a href=\"https://dbterm-bbakji.c9users.io/Logout.php\"class=\"button\"><span class=\"label\">Log out</span></a>";
									?>
								</div>
								</ul>
							</header>
							<!-- Content -->
							<form name="mksubject">
								<br>
            <fieldset>
                <legend><b><font size=5>개설된 교과목</font></b></legend>
                <br>
            
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


 $sql="select * from Osubject_view";     // SELECT 구문을 통해 테이블 가져옴
  
    $result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
        $row[$i]=mysqli_fetch_array($result);     // 반복
    }    
  
    echo " 
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
    </tr>
    </table>";
 
    for($i = 0; $i < $numrow; $i++){ 
        $osumake_num[] = $row[$i][0];  
        $osusub_num[] = $row[$i][1];           
        $osuyear[] = $row[$i][2];
        $osu_sub_sem[] = $row[$i][3];
        $osu_prof[] = $row[$i][4];
        $sub_Grade[] = $row[$i][5];
        $sub_name[] = $row[$i][6];
        $sub_major[] = $row[$i][7];
        $division[] = $row[$i][8];
         echo " 
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
        		</tr>
			</table>
            ";
    }
    

    
$conn->close();
?>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
								<h5>관리자 님<br/> 환영합니다</h5>

								</section>

							<!-- Menu -->
							<nav id="menu">
								<header class="major">
									<h2>Menu</h2>
								</header>
								<ul>
									<li><a href="a_index.php">Home</a></li>
									<li><a href="a_check.php">구성원 조회</a></li>
									<li><a href="a_input.php">구성원 입력,수정 및 삭제</a></li>
									<li><a href="a_inputsub.php">개설 교과목 입력</a></li>
									<li><a href="a_serchsub.php">개설된 교과목 조회</a></li>
									<li><a href="a_agree.php">수강 승인</a></li>
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