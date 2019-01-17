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
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script>-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" />-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<script>
			function sendData(action){
            var f = document.list;
            var size = document.getElementsByName('use[]');
            var CheckAll = null;
            for(var i = 0; i < size.length; i++){
                if(size[i].checked == true){
                    CheckAll = size[i].value;
                    if(action == "send")
                        f.action = "apply2.php";
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
								<a href="" class="logo">수강 승인</strong></a>
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
    
    
    $sqls="select * from Sugang_view";
    
    $results=mysqli_query($conn,$sqls);
    $numrows = mysqli_num_rows($results);   //총 몇 개의 행을 불러왔는지 확인
    
    
    for($i=0; $i<$numrows; $i++){                 //행(ROW) 수 만큼 
        $rows[$i]=mysqli_fetch_array($results);     // 반복
    }    
  
                  echo "<br><font size=5 color=black><b>수강 신청 목록</b></font><br><br>
                  <table border = 1>
    <tr> 
    <td colspan=2 width=150 height=30  align=center><b>학번</td>
    <td colspan=2 width=250 height=30  align=center><b>개설번호</td>
    <td colspan=2 width=250 height=30  align=center><b>승인여부</td>
    <td colspan=2 width=250 height=30  align=center><b>승인</td>
    </tr>
    </table>";
    
    for($i = 0; $i < $numrows; $i++){ 
        $stu_number[] = $rows[$i][0];  
        $make_num[] = $rows[$i][1];           
        $apply[] = $rows[$i][2];
        $score[] = $rows[$i][3];
        echo "  
         
<form name = \"list\">
    <table border = 1>
        <tr>
            <td colspan=2 width=150 height=30  align=center>$stu_number[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$make_num[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$apply[$i]</td>
            <td colspan=2 width=250 height=30  align=center><input type=\"checkbox\" Id = \"pow[$i]\" name = \"use[]\" value=\" $stu_number[$i],$make_num[$i]\"><label for = \"pow[$i]\"></label></td>
         </tr>
    </table>
    


            ";
    }
    echo "<p align = \"center\">";
    echo "<input type = \"button\" value = \"수강승인\" onclick = \"sendData('send')\">";

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
