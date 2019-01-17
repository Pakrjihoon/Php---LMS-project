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
								<a href="" class="logo">구성원 조회</a>
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
								
		<form action="#" method="POST">
		    <br>
		    <fieldset>
		        <br>
            <legend><b><font size=5>학생</font></b></legend>
            <select name="grade">
                <option value="0">학년선택</option>
                <option value="1">1학년</option>
                <option value="2">2학년</option>
                <option value="3">3학년</option>
                <option value="4">4학년</option>
            </select>
            <br>
            <select name="major">
                <option value="학과선택">학과선택</option>
                <option value="컴퓨터공학과">컴퓨터공학과</option>
                <option value="기계공학과">기계공학과</option>
                <option value="유아교육과">유아교육과</option>
                <option value="연극무용학과">연극무용학과</option>
                <option value="전자공학과">전자공학과</option>
                <option value="영문학과">영문학과</option>
                <option value="관광경영학과">관광경영학과</option>
                <option value="의예과">의예과</option>
                <option value="사회체육학과">사회체육학과</option>
            </select>
            <br>
            <input type="submit" name = "submit" value="검색"/>
            <input type="submit" name = "allt" value = "전체조회"/>
        </form>
        
        <form action="#" method="POST">
              <br>
		    <fieldset>
		        <br>
            <legend><b><font size=5>교수</font></b></legend>
            </fieldset>
            <select name="major2">
                <option value="학과선택">학과선택</option>
                <option value="컴퓨터공학과">컴퓨터공학과</option>
                <option value="기계공학과">기계공학과</option>
                <option value="유아교육과">유아교육과</option>
                <option value="연극무용학과">연극무용학과</option>
                <option value="전자공학과">전자공학과</option>
                <option value="영문학과">영문학과</option>
                <option value="관광경영학과">관광경영학과</option>
                <option value="의예과">의예과</option>
                <option value="사회체육학과">사회체육학과</option>
            </select>
            <br>
            <input type="submit" name = "subm" value="검색"/>
            <input type="submit" name = "allp" value = "전체조회"/>
            </fieldset>
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
if(isset($_POST['allp'])){
    echo " <font size=5 color=black><b>교수</b></font>
    <table border = 1>
    <tr> 
    <td width=150 height=30  align=center><b>교수번호</td>
    <td width=150 height=30  align=center><b>이름</td>
    <td width=150 height=30  align=center><b>학과</td>
    </tr>
    </table>";
    $sql = "select * from Professor_view";
    	$result=mysqli_query($conn,$sql);
    	$numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    	for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
    		 $row[$i]=mysqli_fetch_array($result);     // 반복
    	}
    	
    	for($i = 0; $i < $numrow; $i++){ 
        $pNun[] = $row[$i][prof_num];  
        $pName[] = $row[$i][prof_name];           
        $pmName[] = $row[$i][prof_major_name];
         echo "  
<table border = 1>

        <tr>
            <td colspan=2 width=250 height=30  align=center>$pNun[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$pName[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$pmName[$i]</td>
         </tr>
</table>
            ";
    }
}
if(isset($_POST['allt'])){
    echo " <legend><b><font size=5>학생</font></b></legend>
    <table border = 1>
    <tr> 
    <td width=150 height=30  align=center><b>학번</td>
    <td width=150 height=30  align=center><b>이름</td>
    <td width=150 height=30  align=center><b>학년</td>
    <td width=150 height=30  align=center><b>학과</td>
    <td width=150 height=30  align=center><b>교수번호</td>
    <td width=150 height=30  align=center><b>성별</td>
    </tr>
    </table>";
    $sql = "select * from Student_view order by stu_grade, stu_major_name";
    
	$result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
        $row[$i]=mysqli_fetch_array($result);     // 반복
    }    
 
    for($i = 0; $i < $numrow; $i++){          
        $sNum[] = $row[$i][stu_num];  
        $sName[] = $row[$i][stu_name];           
        $sGrade[] = $row[$i][stu_grade];           
        $mName[] = $row[$i][stu_major_name];      
        $pNum[] = $row[$i][stu_prof_num];
        $sGen[] = $row{$i}[stu_gender];
         echo "           
         

<table border = 1>
         <tr>
            <td colspan=2 width=150 height=30  align=center>$sNum[$i] </td>
            <td colspan=2 width=150 height=30  align=center>$sName[$i] </td>
            <td colspan=2 width=150 height=30  align=center>$sGrade[$i]</td>
            <td colspan=2 width=150 height=30  align=center>$mName[$i]</td>
            <td colspan=2 width=150 height=30 align=center >$pNum[$i]</td>
            <td colspan=2 width=150 height=30 align=center >$sGen[$i]</td>
         </tr>
</table>
            ";
    }
}

if(isset($_POST['subm'])){
	$check_major2 = $_POST['major2'];
	
	 echo " <font size=5 color=black><b>교수</b></font>
    <table border = 1>
    <tr> 
    <td width=150 height=30  align=center><b>교수번호</td>
    <td width=150 height=30  align=center><b>이름</td>
    <td width=150 height=30  align=center><b>학과</td>
    </tr>
    </table>";
    if(isset($_POST['major2'])){
    	$sql = "select * from Professor_view where prof_major_name = '$check_major2'";
    	$result=mysqli_query($conn,$sql);
    	$numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    	for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
    		 $row[$i]=mysqli_fetch_array($result);     // 반복
    	}
    	
    	for($i = 0; $i < $numrow; $i++){ 
        $pNun[] = $row[$i][prof_num];  
        $pName[] = $row[$i][prof_name];           
        $pmName[] = $row[$i][prof_major_name];
         echo "  
<table border = 1>

        <tr>
            <td colspan=2 width=250 height=30  align=center>$pNun[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$pName[$i]</td>
            <td colspan=2 width=250 height=30  align=center>$pmName[$i]</td>
         </tr>
</table>
            ";
    }
    }
}

if(isset($_POST['submit'])){
	$check_grade = $_POST['grade'];
	$check_major = $_POST['major'];
	echo " <legend><b><font size=5>학생</font></b></legend>
    <table border = 1>
    <tr> 
    <td width=150 height=30  align=center><b>학번</td>
    <td width=150 height=30  align=center><b>이름</td>
    <td width=150 height=30  align=center><b>학년</td>
    <td width=150 height=30  align=center><b>학과</td>
    <td width=150 height=30  align=center><b>교수번호</td>
    <td width=150 height=30  align=center><b>성별</td>
    </tr>
    </table>";
	if(isset($_POST['grade']) & $check_major == "학과선택"){
	    $sql = "select * from Student_view where stu_grade = '$check_grade'";
    
	$result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
        $row[$i]=mysqli_fetch_array($result);     // 반복
    }    
 
    for($i = 0; $i < $numrow; $i++){          
        $sNum[] = $row[$i][stu_num];  
        $sName[] = $row[$i][stu_name];           
        $sGrade[] = $row[$i][stu_grade];           
        $mName[] = $row[$i][stu_major_name];      
        $pNum[] = $row[$i][stu_prof_num];
        $sGen[] = $row{$i}[stu_gender];
         echo "           
         

<table border = 1>
         <tr>
            <td colspan=2 width=150 height=30  align=center>$sNum[$i] </td>
            <td colspan=2 width=150 height=30  align=center>$sName[$i] </td>
            <td colspan=2 width=150 height=30  align=center>$sGrade[$i]</td>
            <td colspan=2 width=150 height=30  align=center>$mName[$i]</td>
            <td colspan=2 width=150 height=30 align=center >$pNum[$i]</td>
            <td colspan=2 width=150 height=30 align=center >$sGen[$i]</td>
         </tr>
</table>
            ";
    }
		
	}
	if(isset($_POST['major']) && $check_grade == 0){
	    $sql = "select * from Student_view where stu_major_name = '$check_major' order by stu_grade";
	$result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
        $row[$i]=mysqli_fetch_array($result);     // 반복
    }    
 
    for($i = 0; $i < $numrow; $i++){          
        $sNum[] = $row[$i][stu_num];  
        $sName[] = $row[$i][stu_name];           
        $sGrade[] = $row[$i][stu_grade];           
        $mName[] = $row[$i][stu_major_name];      
        $pNum[] = $row[$i][stu_prof_num];
        $sGen[] = $row{$i}[stu_gender];
         echo "           
         

<table border = 1>
         <tr>
            <td colspan=2 width=150 height=30  align=center>$sNum[$i] </td>
            <td colspan=2 width=150 height=30  align=center>$sName[$i] </td>
            <td colspan=2 width=150 height=30  align=center>$sGrade[$i]</td>
            <td colspan=2 width=150 height=30  align=center>$mName[$i]</td>
            <td colspan=2 width=150 height=30 align=center >$pNum[$i]</td>
            <td colspan=2 width=150 height=30 align=center >$sGen[$i]</td>
         </tr>
</table>
            ";
    }
		
	}
	if(isset($_POST['major']) & isset($_POST['grade'])){
		$sql = "select * from Student_view where stu_grade = '$check_grade' and stu_major_name = '$check_major' ";
	$result=mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인
    
    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 
        $row[$i]=mysqli_fetch_array($result);     // 반복
    }    
 
    for($i = 0; $i < $numrow; $i++){          
        $sNum[] = $row[$i][stu_num];  
        $sName[] = $row[$i][stu_name];           
        $sGrade[] = $row[$i][stu_grade];           
        $mName[] = $row[$i][stu_major_name];      
        $pNum[] = $row[$i][stu_prof_num];
        $sGen[] = $row{$i}[stu_gender];
         echo "           
         

<table border = 1>
         <tr>
            <td colspan=2 width=150 height=30  align=center>$sNum[$i] </td>
            <td colspan=2 width=150 height=30  align=center>$sName[$i] </td>
            <td colspan=2 width=150 height=30  align=center>$sGrade[$i]</td>
            <td colspan=2 width=150 height=30  align=center>$mName[$i]</td>
            <td colspan=2 width=150 height=30 align=center >$pNum[$i]</td>
            <td colspan=2 width=150 height=30 align=center >$sGen[$i]</td>
         </tr>
</table>
            ";
    }
	}
}
?>
								
							</section>
							

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
