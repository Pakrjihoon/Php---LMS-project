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
    
  
    function Checks(action){
      var f = document.list;
      var size = document.getElementsByName("rea");
      var CheckAll = null;
      for(var i = 0; i < size.length; i++){
        if(size[i].checked == true){
          CheckAll = size[i].value;
        }
      }
      
      if(action == "logins")
      {
        if(CheckAll == "학생"){
          f.action = "Slogin.php";
        }
        else if(CheckAll == "교수"){
          f.action = "Plogin.php";
        }
        else{
          f.action = "Ologin.php";
        }
      }
      
      f.method = "POST";
      f.submit();
    }
    
    
  </script>
</head>

<body>
  <center>
  <div class="login-card">
    <h1>Log-in</h1><br>

  <form name = "list">
     <i class="fa fa-user-circle fa-4x" ></i><br><br>
    <input type="radio" id = "a" name="rea" value="교수" checked="checked"/>교수
    <input type="radio" id = "a" name="rea" value="학생" /> 학생
    <input type="radio" id = "a" name="rea" value="관리자" /> 관리자<br><br/>
   
    <input type="text" name="s_number" placeholder="Username">
    <center><input type="button" name="login" class="login login-submit" value="login" onClick="Checks('logins')" style="width:170px";/></center>
  </form>
    
  <div class="login-help">
    <br>
   <a onClick="window.open('https://www.facebook.com', 'guide','width=800,height=800,left=50,top-50,scrollbars=yes')"><i class="fa fa-facebook-square fa-4x"></i></a>&nbsp
   <a onClick="window.open('https://www.google.co.kr', 'guide','width=800,height=800,left=50,top-50,scrollbars=yes')"><i class="fa fa-google-plus-square fa-4x"></i></a>&nbsp
   <a onClick="window.open('twitter.php', 'guide','width=800,height=800,left=50,top-50,scrollbars=yes')"><i class="fa fa-twitter-square fa-4x"></i></a><br>
   <font color=#bab4b4><a onClick = "window.open('forgot.php','guide','width = 500, height = 350, ,left = 50, top-50, scrollbars = no')">Forgot</a></font>
 
   
  </div>
  </center>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

</body>
</html>


