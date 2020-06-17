<?php
session_start();
if($_SESSION['user_id'] == null){ //로그인x
?>

<center><br><br><br>
<form name="login_form" action="login_check.php" method="post">
  <label> 아이디: </label><input type="text" name = "user_id"><br>
  <label> 비밀번호 : </label><input type="password" name ="user_password">
  <br><br>
  <input type="submit" name= "login" value="로그인">
</form>
</center>

<?php
}else{
  echo"<center><br><br><br>";
  //echo $_SESSION['id']."(".$_SESSION['id']")님이 로그인 하였습니다.";
  echo "&nbsp; <a href='logout.php'><input type='button' value='Logout'></a>";
  echo "</center>";
}
 ?>
