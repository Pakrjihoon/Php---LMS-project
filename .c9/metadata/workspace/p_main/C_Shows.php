{"filter":false,"title":"C_Shows.php","tooltip":"/p_main/C_Shows.php","undoManager":{"mark":33,"position":33,"stack":[[{"start":{"row":0,"column":0},"end":{"row":306,"column":0},"action":"insert","lines":["<!DOCTYPE HTML>","<!--","\tEditorial by HTML5 UP","\thtml5up.net | @ajlkn","\tFree for personal and commercial use under the CCA 3.0 license (html5up.net/license)","-->","<html>","\t<head>","\t\t<title>학사관리 시스템(Term)</title>","\t\t<meta charset=\"utf-8\" />","\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\" />","\t\t<!--[if lte IE 8]><script src=\"assets/js/ie/html5shiv.js\"></script><![endif]-->","\t\t<link rel=\"stylesheet\" href=\"assets/css/main.css\" />","\t\t<!--[if lte IE 9]><link rel=\"stylesheet\" href=\"assets/css/ie9.css\" /><![endif]-->","\t\t<!--[if lte IE 8]><link rel=\"stylesheet\" href=\"assets/css/ie8.css\" /><![endif]-->","\t\t<script>","\t\t</script>","\t</head>","\t<body>","","\t\t<!-- Wrapper -->","\t\t\t<div id=\"wrapper\">","","\t\t\t\t<!-- Main -->","\t\t\t\t\t<div id=\"main\">","\t\t\t\t\t\t<div class=\"inner\">","","\t\t\t\t\t\t\t<!-- Header -->","\t\t\t\t\t\t\t<header id=\"header\">","\t\t\t\t\t\t\t\t<a href=\"\" class=\"logo\">구성원 조회</a>","\t\t\t\t\t\t\t\t<ul class=\"action\">","\t\t\t\t\t\t\t\t\t<div style=\"text-align:right\">","\t\t\t\t\t\t\t\t\t<?php","\t\t\t\t\t\t\t\t\t\techo \"<a href=\\\"https://databaset-bbakji.c9users.io/Logout.php\\\"class=\\\"button\\\"><span class=\\\"label\\\">Log out</span></a>\";","\t\t\t\t\t\t\t\t\t?>","\t\t\t\t\t\t\t\t</div>","\t\t\t\t\t\t\t\t</ul>","\t\t\t\t\t\t\t</header>","\t\t\t\t\t\t\t<!-- Content -->","\t\t\t\t\t\t\t<section>","\t\t\t\t\t\t\t\t","\t\t<form action=\"#\" method=\"POST\">","\t\t    <br>","\t\t    <fieldset>","\t\t        <br>","            <legend><b><font size=5>학생</font></b></legend>","            <select name=\"grade\">","                <option value=\"0\">학년선택</option>","                <option value=\"1\">1학년</option>","                <option value=\"2\">2학년</option>","                <option value=\"3\">3학년</option>","                <option value=\"4\">4학년</option>","            </select>","            <br>","            <select name=\"major\">","                <option value=\"학과선택\">학과선택</option>","                <option value=\"컴퓨터공학과\">컴퓨터공학과</option>","                <option value=\"기계공학과\">기계공학과</option>","                <option value=\"유아교육과\">유아교육과</option>","                <option value=\"연극무용학과\">연극무용학과</option>","                <option value=\"전자공학과\">전자공학과</option>","                <option value=\"영문학과\">영문학과</option>","                <option value=\"관광경영학과\">관광경영학과</option>","                <option value=\"의예과\">의예과</option>","                <option value=\"사회체육학과\">사회체육학과</option>","            </select>","            <br>","            <input type=\"submit\" name = \"submit\" value=\"검색\"/>","            ","        </form>","        ","        <form action=\"#\" method=\"POST\">","              <br>","\t\t    <fieldset>","\t\t        <br>","            <legend><b><font size=5>교수</font></b></legend>","            </fieldset>","            <select name=\"major2\">","                <option value=\"학과선택\">학과선택</option>","                <option value=\"컴퓨터공학과\">컴퓨터공학과</option>","                <option value=\"기계공학과\">기계공학과</option>","                <option value=\"유아교육과\">유아교육과</option>","                <option value=\"연극무용학과\">연극무용학과</option>","                <option value=\"전자공학과\">전자공학과</option>","                <option value=\"영문학과\">영문학과</option>","                <option value=\"관광경영학과\">관광경영학과</option>","                <option value=\"의예과\">의예과</option>","                <option value=\"사회체육학과\">사회체육학과</option>","            </select>","            <br>","            <input type=\"submit\" name = \"subm\" value=\"검색\"/>","            </fieldset>","        </form>","        <?php","$servername = getenv('IP');","$username = getenv('C9_USER');","$password = \"\";","$dbname = \"c9\";","$dbport = 3306;","","// Create connection","    $conn = new mysqli($servername, $username, $password, $dbname, $dbport);","// Check connection","if ($conn->connect_error) {","    die(\"Connection failed: \" . $conn->connect_error);","} ","","if(isset($_POST['subm'])){","\t$check_major2 = $_POST['major2'];","\t","\t echo \" <font size=5 color=black><b>교수</b></font>","    <table border = 1>","    <tr> ","    <td width=150 height=30  align=center><b>교수번호</td>","    <td width=150 height=30  align=center><b>이름</td>","    <td width=150 height=30  align=center><b>학과</td>","    </tr>","    </table>\";","    if(isset($_POST['major2'])){","    \t$sql = \"select * from Professor where prof_major_name = '$check_major2'\";","    \t$result=mysqli_query($conn,$sql);","    \t$numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인","    ","    \tfor($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 ","    \t\t $row[$i]=mysqli_fetch_array($result);     // 반복","    \t}","    \t","    \tfor($i = 0; $i < $numrow; $i++){ ","        $pNun[] = $row[$i][prof_num];  ","        $pName[] = $row[$i][prof_name];           ","        $pmName[] = $row[$i][prof_major_name];","         echo \"  ","<table border = 1>","","        <tr>","            <td colspan=2 width=250 height=30  align=center>$pNun[$i]</td>","            <td colspan=2 width=250 height=30  align=center>$pName[$i]</td>","            <td colspan=2 width=250 height=30  align=center>$pmName[$i]</td>","         </tr>","</table>","            \";","    }","    }","}","","if(isset($_POST['submit'])){","\t$check_grade = $_POST['grade'];","\t$check_major = $_POST['major'];","\techo \" <h1>학생</h1>","    <table border = 1>","    <tr> ","    <td width=150 height=30  align=center><b>학번</td>","    <td width=150 height=30  align=center><b>이름</td>","    <td width=150 height=30  align=center><b>학년</td>","    <td width=150 height=30  align=center><b>학과</td>","    <td width=150 height=30  align=center><b>교수번호</td>","    <td width=150 height=30  align=center><b>성별</td>","    </tr>","    </table>\";","\tif(isset($_POST['grade']) & $check_major == \"학과선택\"){","\t\t$sql = \"select * from Student where stu_grade = '$check_grade'\";","    ","\t$result=mysqli_query($conn,$sql);","    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인","    ","    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 ","        $row[$i]=mysqli_fetch_array($result);     // 반복","    }    "," ","    for($i = 0; $i < $numrow; $i++){          ","        $sNum[] = $row[$i][stu_num];  ","        $sName[] = $row[$i][stu_name];           ","        $sGrade[] = $row[$i][stu_grade];           ","        $mName[] = $row[$i][stu_major_name];      ","        $pNum[] = $row[$i][stu_prof_num];","        $sGen[] = $row{$i}[stu_gender];","         echo \"           ","         ","","<table border = 1>","         <tr>","            <td colspan=2 width=150 height=30  align=center>$sNum[$i] </td>","            <td colspan=2 width=150 height=30  align=center>$sName[$i] </td>","            <td colspan=2 width=150 height=30  align=center>$sGrade[$i]</td>","            <td colspan=2 width=150 height=30  align=center>$mName[$i]</td>","            <td colspan=2 width=150 height=30 align=center >$pNum[$i]</td>","            <td colspan=2 width=150 height=30 align=center >$sGen[$i]</td>","         </tr>","</table>","            \";","    }","\t}","\tif(isset($_POST['major']) && $check_grade == 0){","\t\t$sql = \"select * from Student where stu_major_name = '$check_major' order by stu_grade\";","\t$result=mysqli_query($conn,$sql);","    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인","    ","    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 ","        $row[$i]=mysqli_fetch_array($result);     // 반복","    }    "," ","    for($i = 0; $i < $numrow; $i++){          ","        $sNum[] = $row[$i][stu_num];  ","        $sName[] = $row[$i][stu_name];           ","        $sGrade[] = $row[$i][stu_grade];           ","        $mName[] = $row[$i][stu_major_name];      ","        $pNum[] = $row[$i][stu_prof_num];","        $sGen[] = $row{$i}[stu_gender];","         echo \"           ","         ","","<table border = 1>","         <tr>","            <td colspan=2 width=150 height=30  align=center>$sNum[$i] </td>","            <td colspan=2 width=150 height=30  align=center>$sName[$i] </td>","            <td colspan=2 width=150 height=30  align=center>$sGrade[$i]</td>","            <td colspan=2 width=150 height=30  align=center>$mName[$i]</td>","            <td colspan=2 width=150 height=30 align=center >$pNum[$i]</td>","            <td colspan=2 width=150 height=30 align=center >$sGen[$i]</td>","         </tr>","</table>","            \";","    }","\t}","\tif(isset($_POST['major']) & isset($_POST['grade'])){","\t\t$sql = \"select * from Student where stu_grade = '$check_grade' and stu_major_name = '$check_major' \";","\t$result=mysqli_query($conn,$sql);","    $numrow = mysqli_num_rows($result);   //총 몇 개의 행을 불러왔는지 확인","    ","    for($i=0; $i<$numrow; $i++){                 //행(ROW) 수 만큼 ","        $row[$i]=mysqli_fetch_array($result);     // 반복","    }    "," ","    for($i = 0; $i < $numrow; $i++){          ","        $sNum[] = $row[$i][stu_num];  ","        $sName[] = $row[$i][stu_name];           ","        $sGrade[] = $row[$i][stu_grade];           ","        $mName[] = $row[$i][stu_major_name];      ","        $pNum[] = $row[$i][stu_prof_num];","        $sGen[] = $row{$i}[stu_gender];","         echo \"           ","         ","","<table border = 1>","         <tr>","            <td colspan=2 width=150 height=30  align=center>$sNum[$i] </td>","            <td colspan=2 width=150 height=30  align=center>$sName[$i] </td>","            <td colspan=2 width=150 height=30  align=center>$sGrade[$i]</td>","            <td colspan=2 width=150 height=30  align=center>$mName[$i]</td>","            <td colspan=2 width=150 height=30 align=center >$pNum[$i]</td>","            <td colspan=2 width=150 height=30 align=center >$sGen[$i]</td>","         </tr>","</table>","            \";","    }","\t}","}","?>","\t\t\t\t\t\t\t\t","\t\t\t\t\t\t\t</section>","\t\t\t\t\t\t\t","","\t\t\t\t\t\t</div>","\t\t\t\t\t</div>","","\t\t\t\t<!-- Sidebar -->","\t\t\t\t\t<div id=\"sidebar\">","\t\t\t\t\t\t<div class=\"inner\">","","\t\t\t\t\t\t\t<!-- Search -->","\t\t\t\t\t\t\t\t<section id=\"search\" class=\"alt\">","                            \t\t\t\t\t\t\t\t<h5>admin 님 환영합니다</h5>","        ","\t\t\t\t\t\t\t\t</section>","","\t\t\t\t\t\t\t<!-- Menu -->","\t\t\t\t\t\t\t<nav id=\"menu\">","\t\t\t\t\t\t\t\t<header class=\"major\">","\t\t\t\t\t\t\t\t\t<h2>Menu</h2>","\t\t\t\t\t\t\t\t</header>","\t\t\t\t\t\t\t\t<ul>","\t\t\t\t\t\t\t\t\t<li><a href=\"a_index.php\">Home</a></li>","\t\t\t\t\t\t\t\t\t<li><a href=\"a_check.php\">구성원 조회</a></li>","\t\t\t\t\t\t\t\t\t<li><a href=\"a_input.php\">구성원 입력,수정 및 삭제</a></li>","\t\t\t\t\t\t\t\t\t<li><a href=\"a_inputsub.php\">개설 교과목 입력</a></li>","\t\t\t\t\t\t\t\t\t<li><a href=\"a_agree.php\">수강 승인</a></li>","\t\t\t\t\t\t\t\t</ul>","\t\t\t\t\t\t\t</nav>","","","","","\t\t\t\t\t\t</div>","\t\t\t\t\t</div>","","\t\t\t</div>","","\t\t<!-- Scripts -->","\t\t\t<script src=\"assets/js/jquery.min.js\"></script>","\t\t\t<script src=\"assets/js/skel.min.js\"></script>","\t\t\t<script src=\"assets/js/util.js\"></script>","\t\t\t<!--[if lte IE 8]><script src=\"assets/js/ie/respond.min.js\"></script><![endif]-->","\t\t\t<script src=\"assets/js/main.js\"></script>","","\t</body>","</html>",""],"id":1}],[{"start":{"row":54,"column":26},"end":{"row":54,"column":31},"action":"remove","lines":["major"],"id":2},{"start":{"row":54,"column":26},"end":{"row":54,"column":27},"action":"insert","lines":["g"]}],[{"start":{"row":54,"column":27},"end":{"row":54,"column":28},"action":"insert","lines":["e"],"id":3}],[{"start":{"row":54,"column":28},"end":{"row":54,"column":29},"action":"insert","lines":["n"],"id":4}],[{"start":{"row":54,"column":29},"end":{"row":54,"column":30},"action":"insert","lines":["d"],"id":5}],[{"start":{"row":54,"column":30},"end":{"row":54,"column":31},"action":"insert","lines":["e"],"id":6}],[{"start":{"row":54,"column":31},"end":{"row":54,"column":32},"action":"insert","lines":["r"],"id":7}],[{"start":{"row":57,"column":13},"end":{"row":64,"column":54},"action":"remove","lines":["   <option value=\"기계공학과\">기계공학과</option>","                <option value=\"유아교육과\">유아교육과</option>","                <option value=\"연극무용학과\">연극무용학과</option>","                <option value=\"전자공학과\">전자공학과</option>","                <option value=\"영문학과\">영문학과</option>","                <option value=\"관광경영학과\">관광경영학과</option>","                <option value=\"의예과\">의예과</option>","                <option value=\"사회체육학과\">사회체육학과</option>"],"id":8}],[{"start":{"row":56,"column":54},"end":{"row":57,"column":13},"action":"remove","lines":["","             "],"id":9}],[{"start":{"row":55,"column":31},"end":{"row":55,"column":35},"action":"remove","lines":["학과선택"],"id":10},{"start":{"row":55,"column":31},"end":{"row":55,"column":32},"action":"insert","lines":["s"]}],[{"start":{"row":55,"column":31},"end":{"row":55,"column":32},"action":"remove","lines":["s"],"id":11}],[{"start":{"row":55,"column":31},"end":{"row":55,"column":32},"action":"insert","lines":["남"],"id":14}],[{"start":{"row":55,"column":32},"end":{"row":55,"column":33},"action":"insert","lines":["자"],"id":16}],[{"start":{"row":56,"column":31},"end":{"row":56,"column":37},"action":"remove","lines":["컴퓨터공학과"],"id":17}],[{"start":{"row":56,"column":31},"end":{"row":56,"column":32},"action":"insert","lines":["여"],"id":21}],[{"start":{"row":56,"column":32},"end":{"row":56,"column":33},"action":"insert","lines":["자"],"id":22}],[{"start":{"row":55,"column":48},"end":{"row":56,"column":0},"action":"insert","lines":["",""],"id":23},{"start":{"row":56,"column":0},"end":{"row":56,"column":16},"action":"insert","lines":["                "]}],[{"start":{"row":56,"column":16},"end":{"row":56,"column":48},"action":"insert","lines":["<option value=\"남자\">학과선택</option>"],"id":24}],[{"start":{"row":55,"column":31},"end":{"row":55,"column":33},"action":"remove","lines":["남자"],"id":25}],[{"start":{"row":55,"column":31},"end":{"row":55,"column":32},"action":"insert","lines":["선"],"id":28}],[{"start":{"row":55,"column":32},"end":{"row":55,"column":33},"action":"insert","lines":["택"],"id":31}],[{"start":{"row":55,"column":36},"end":{"row":55,"column":37},"action":"remove","lines":["과"],"id":32}],[{"start":{"row":55,"column":35},"end":{"row":55,"column":36},"action":"remove","lines":["학"],"id":33}],[{"start":{"row":55,"column":35},"end":{"row":55,"column":36},"action":"insert","lines":["성"],"id":36}],[{"start":{"row":55,"column":36},"end":{"row":55,"column":37},"action":"insert","lines":["별"],"id":39}],[{"start":{"row":56,"column":35},"end":{"row":56,"column":39},"action":"remove","lines":["학과선택"],"id":40}],[{"start":{"row":56,"column":35},"end":{"row":56,"column":36},"action":"insert","lines":["남"],"id":43}],[{"start":{"row":56,"column":36},"end":{"row":56,"column":37},"action":"insert","lines":["자"],"id":45}],[{"start":{"row":57,"column":35},"end":{"row":57,"column":41},"action":"remove","lines":["컴퓨터공학과"],"id":46}],[{"start":{"row":57,"column":35},"end":{"row":57,"column":36},"action":"insert","lines":["여"],"id":50}],[{"start":{"row":57,"column":36},"end":{"row":57,"column":37},"action":"insert","lines":["자"],"id":52}],[{"start":{"row":64,"column":8},"end":{"row":85,"column":15},"action":"remove","lines":["<form action=\"#\" method=\"POST\">","              <br>","\t\t    <fieldset>","\t\t        <br>","            <legend><b><font size=5>교수</font></b></legend>","            </fieldset>","            <select name=\"major2\">","                <option value=\"학과선택\">학과선택</option>","                <option value=\"컴퓨터공학과\">컴퓨터공학과</option>","                <option value=\"기계공학과\">기계공학과</option>","                <option value=\"유아교육과\">유아교육과</option>","                <option value=\"연극무용학과\">연극무용학과</option>","                <option value=\"전자공학과\">전자공학과</option>","                <option value=\"영문학과\">영문학과</option>","                <option value=\"관광경영학과\">관광경영학과</option>","                <option value=\"의예과\">의예과</option>","                <option value=\"사회체육학과\">사회체육학과</option>","            </select>","            <br>","            <input type=\"submit\" name = \"subm\" value=\"검색\"/>","            </fieldset>","        </form>"],"id":53}],[{"start":{"row":62,"column":15},"end":{"row":63,"column":8},"action":"remove","lines":["","        "],"id":54}],[{"start":{"row":62,"column":15},"end":{"row":63,"column":8},"action":"remove","lines":["","        "],"id":55}]]},"ace":{"folds":[],"scrolltop":3238,"scrollleft":0,"selection":{"start":{"row":53,"column":16},"end":{"row":53,"column":16},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":150,"state":"php-qqstring","mode":"ace/mode/php"}},"timestamp":1512836616039,"hash":"111cfa413f7208b005c161a3101c11e49bba8425"}