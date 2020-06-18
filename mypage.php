<?php
  session_start();
  include './dbconn.php';

  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  echo"<br><br>";
  echo '<center>';
  echo '<h1> 마이페이지 </h1>';
  echo"<br>";
  echo"<br><br>";
  echo "&nbsp; <a href='main.php'><input type='button' value='메인페이지' name='back'></a>";
  echo "&nbsp; <a href='logout.php'><input type='button' value='로그아웃'></a>";

 ?>
