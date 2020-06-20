<?php
  session_start();
  include './dbconn.php';

  echo"<br>";
  echo "<div style=\"text-align:right\">";
  echo $_SESSION['id']."(".$_SESSION['name'].")님이 로그인 하였습니다.";
  //echo"<br><br>";
  echo "&nbsp; <a href='mypage.php'><input type='button' value='마이페이지'></a>"; // 마이페이지로 이동
  echo "&nbsp; <a href='logout.php'><input type='button' value='로그아웃'></a> &nbsp;&nbsp;";

  echo"<br><br>";
  echo '<center>';
  echo '<h1> 메인페이지 </h1>';
  echo"<br><br><br>";

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <input type='button' value='등록' onClick="location.href='register.php'";>
    &nbsp; &nbsp;
    <input type='button' value='조회' onClick="location.href='find.php'";>
    &nbsp; &nbsp;
    <input type='button' value='삭제' onClick="location.href='delete.php'";>
  </body>
</html>
