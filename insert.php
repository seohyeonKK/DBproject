<?

  session_start();
  include './dbconn.php';
  //
  // $id = $_POST['user_id'];
  // $pwd = $_POST['user_password'];
  $account = $_POST['account'];
  $item = $_POST['item'];
  $price = $_POST['price'];
  $site = $_POST['site'];
  $site_id = $_POST['site_id'];

  echo"<br>";
  echo "<div style=\"text-align:right\">";
  echo $_SESSION['id']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
  //echo"<br><br>";
  echo "&nbsp; <a href='mypage.php'><input type='button' value='MyPage'></a>"; // 마이페이지로 이동
  echo "&nbsp; <a href='logout.php'><input type='button' value='Logout'></a>";

  echo"<br><br>";

  $query = "SELECT * FROM cheater_info WHERE account='$account'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $cheater_code = $row["cheater_code"];

//cheater_info 테이블에 대한 값을 갱신해주거나 만들기

  if($cheater_code) //해당 account에 대한 사기꾼 정보가 이미 존재할 경우
  {
    //total_price값 갱신
    $query = "UPDATE cheater_info SET total_price=total_price+$price where cheater_code='$cheater_code'";
    mysqli_query($conn, $query);

    //cheat_count값 갱신
    $query = "UPDATE cheater_info SET cheat_count=cheat_count+1 where cheater_code='$cheater_code'";
    mysqli_query($conn, $query);
  }
  else  //해당 account에 대한 정보가 없을 경우 (새로 생성해주어야 함)
  {
    //해당 account에 대한 정보 삽입
    $query = "INSERT INTO cheater_info (account, total_price) VALUES ('$account', $price)";
    mysqli_query($conn, $query);
    $cheater_code = mysqli_insert_id($conn);
  }


  //cheat_info 테이블에 대한 값을 삽입 (해당 사기 정보)
  $query = "INSERT INTO cheat_info (cheater_code_cheat, item, price) VALUES ($cheater_code, '$item', $price)";
  mysqli_query($conn, $query);


  //cheat_info를 등록하면서 부여된 register_code 받아오기
  $register_code = mysqli_insert_id($conn);

  $id = $_SESSION['id'];
  //victim_info 테이블에 대한 값을 삽입 (사기당한 해당 회원)
  $query = "SELECT * FROM member_info WHERE member_id='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $member_num = $row["member_num"];
  $query = "INSERT INTO victim_info (member_num_victim, register_code_victim) VALUES ($member_num, $register_code)";
  mysqli_query($conn, $query);


  //site_info 테이블에 대한 값을 삽입 (사기당한 사이트 정보)
  $query = "INSERT INTO site_info (cheater_id, site, cheater_code_site) VALUES ('$site_id', '$site', $cheater_code)";
  mysqli_query($conn, $query);



?>
