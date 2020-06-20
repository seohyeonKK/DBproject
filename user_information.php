<?
  session_start();
  $now = date("Y-m-d A h:i:s");
  echo"<br>";
  echo "<div id ='login_status' style=\"text-align:right\">";
  echo $_SESSION['id']."(".$_SESSION['name'].")님이 로그인 하였습니다.";

  echo "&nbsp; <a href='mypage.php'><input type='button' id='btn_mypage_logout' value='마이페이지'></a>"; // 마이페이지로 이동
  echo "&nbsp; <a href='logout.php'><input type='button' id='btn_mypage_logout' value='로그아웃'></a> &nbsp;&nbsp;</div>";
  echo '<div style=\'text-align:right\'> now : '.$now.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></div>';

?>
