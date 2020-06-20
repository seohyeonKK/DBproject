<?
  session_start();
  include './dbconn.php';
  include './user_information.php';


  $account = $_POST['account'];
  $item = $_POST['item'];
  $price = $_POST['price'];
  $site = $_POST['site'];
  $site_id = $_POST['site_id'];


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
  $query = "INSERT INTO site_info (cheater_id, site, cheater_code_site, register_code_site) VALUES ('$site_id', '$site', $cheater_code, $register_code)";
  mysqli_query($conn, $query);


?>



<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="common.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">
  </head>

  <body topmargin=0 leftmargin=0 text="#464646">
    <center>
    <br>
    <form name="register_info" action="insert.php" method="post">
      <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor="#777777">
        <tr>
          <td id = "table_title">
            <b>등록 정보 확인</b>
          </td>
        </tr>

        <tr>
          <td bgcolor=white>&nbsp;
            <table align=center>
              <tr >
                <td id = "acc_information">등록자</td>
                <td id = "acc_information"><?=$_SESSION['id']?></td>
              </tr>
              <tr>
                <td id = "acc_information">계좌</td>
                <td id = "acc_information"><?=$account?></td>
              </tr>
              <tr>
                <td id = "acc_information" >품목</td>
                <td id = "acc_information"><?=$item?></td>
              </tr>
              <tr>
                <td id = "acc_information" >가격</td>
                <td id = "acc_information"><?=$price?></td>
              </tr>
              <tr>
                <td id = "acc_information">사기꾼 아이디</td>
                <td id = "acc_information"><?=$site_id?></td>
              </tr>
              <tr>
                <td id = "acc_information">사기당한 사이트</td>
                <td id = "acc_information"><?=$site?></td>
              </tr>
            </table>
          <center>
            <br><input type="button" id="btn_ok" value="확인" name="main" onclick="location.href='main.php'"><br><br>
          </cemter>
        </tr>

      </table>
    </form>

  </body>
</html>
