<?
  session_start();
  include './dbconn.php';
  
  $now = date("Y-m-d A h:i:s");
  echo"<br>";
  echo "<div id ='login_status' style=\"text-align:right\">";
  $s_id = $_SESSION['id'];
  $query = "SELECT * FROM member_info WHERE member_id='$s_id'";
  $result = mysqli_query($conn,$query);
  if(!$result)
  {
    echo "<script>alert('오류가 발생했습니다.');</script>";
    return;
  }
  $row = mysqli_fetch_array($result);
  $_SESSION['name'] = $row['member_name'];

  echo $_SESSION['name']."(".$s_id.")님이 로그인 하였습니다.";

  echo "&nbsp; <a href='mypage.php'><input type='button' id='btn_mypage' value='마이페이지'></a>"; // 마이페이지로 이동
  echo "&nbsp; <a href='logout.php'><input type='button' id='btn_mypage_logout' value='로그아웃'></a> &nbsp;&nbsp;</div>";
  echo '<div style=\'text-align:right\'> now : '.$now.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></div>';

?>
