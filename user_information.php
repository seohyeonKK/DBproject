<!--
로그인 후 메뉴,등록,조회,삭제 페이지의 오른쪽 상단에 표시되는 로그인 한 회원의 정보를 보여주기위한 로그인 상태바입니다.
 -->

<?
  session_start();
  include './dbconn.php';

  $now = date("Y-m-d A h:i:s");
  echo"<br>";

  // 로그인 상태바 레이아웃 div 입니다. session 아이디와 이름을 가져와 표시합니다.
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

  // 마이페이지로 이동하는 버튼과, 로그아웃을 위한 버튼도 표시됩니다.
  echo "&nbsp; <a href='mypage.php'><input type='button' id='btn_mypage' value='마이페이지'></a>"; // 마이페이지로 이동
  echo "&nbsp; <a href='logout.php'><input type='button' id='btn_mypage_logout' value='로그아웃'></a> &nbsp;&nbsp;"
  echo "</div>";

  // 페이지가 갱신된 시간을 알려줍니다.
  echo '<div style=\'text-align:right\'> now : '.$now.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></div>';

?>
