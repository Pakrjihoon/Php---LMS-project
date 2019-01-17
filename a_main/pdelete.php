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
            	var f = document.prof;
            	if(action == "insert")
                	f.action = "pinsert.php";
            	else
	                f.action = "pupdate.php";
                
    	        f.method = "POST";
            
        	    f.submit();
        	}
        
        function ssendData(action){
            var f = document.stu;
        		if(action == "insert")
                	f.action = "sinsert.php";
            	else
                	f.action = "supdate.php";
                
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
								<a href="" class="logo">구성원 입력,수정 및 삭제</a>
								<ul class="action">
									<div style="text-align:right">
									<?php
										echo "<a href=\"https://dbterm-bbakji.c9users.io/Logout.php\"class=\"button\"><span class=\"label\">Log out</span></a>";
									?>
								</div>
								</ul>
							</header>
							<!-- Content -->
							<form name="prof">
								<br>
            <fieldset>
            	<br>
            	<legend><b><font size=5>교수</font></b></legend>
            교수번호 : <input type="text" name="s_number"/>
            교수이름 : <input type="text" name="s_name"/>
            학과 : <input type="text" name="s_level"/>
            <br>
            <input type="button" value="추가" onClick="sendData('insert');"/>
            <input type="button" value="수정" onClick="sendData('update');"/>
            </fieldset>
        </form>
        <br>
        <form name="stu">
            <fieldset>
            	<br>
                <legend><b><font size=5>학생</font></b></legend>
            학번 : <input type="text" name="s_number"/>
            이름 : <input type="text" name="s_name"/>
            학년 : <input type="text" name="s_grade"/>
            학과 : <input type="text" name="s_major"/>
            담당교수번호 : <input type="text" name="s_level"/>
            성별 : <input type = "text" name="s_gender"/>
            <br>
            <input type="button" value="추가" onClick="ssendData('insert');"/>
            <input type="button" value="수정" onClick="ssendData('update');"/>
         </fieldset>
        </form>
        <br>
        
        <form action="pdelete.php" method = "POST">
            <fieldset>
            	<br>
                <legend><b><font size=5>삭제</font></b></legend>
            교수번호 또는 학번 : <input type="text" name="s_number" />
            <br>
            <input type="submit" value="삭제"; />
            </fieldset><br>
        </form>

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

$sql = "delete from Professor where prof_num = '$_POST[s_number]'";


if ($conn->query($sql) === TRUE) {
   
} else {
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "delete from Student where stu_num = '$_POST[s_number]'";

if ($conn->query($sql) === TRUE) {
    //echo "<script>alert(\"정상적으로 삭제 완료\");</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    //echo "<script>alert(\"값이 없거나 값을 잘못넣었습니다.\");</script>";
}
$conn->close();
?>



