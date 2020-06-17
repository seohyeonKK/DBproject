<?php
  session_start();
  include './dbconn.php';

  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  echo"<br><br>";
  echo '<center>';
  echo '<h1> 마이페이지 </h1>';
  echo"<br>";
  echo $_SESSION['id']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
  echo"<br><br>";
  echo "&nbsp; <a href='logout.php'><input type='button' value='Logout'></a>"


 ?>
