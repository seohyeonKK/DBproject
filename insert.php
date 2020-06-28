<!--
register.php파일에서 등록한 사건에 대한 데이터들을 전달받아 입력한 값들을 사용자가 한 번 더 확인할 수 있도록 합니다.
-->
<?
  session_start();
  include './dbconn.php';
  include './user_information.php';

  $id = $_SESSION['id'];

  // register.php애서 입력받은 데이터들을 각 변수에 저장합니다.
  $account = $_POST['account'];
  $item = $_POST['item'];
  $price = $_POST['price'];
  $site = $_POST['site'];
  $site_id = $_POST['site_id'];

  // 이미 등록된 계좌 번호인지 확인합니다.
  $query = "SELECT * FROM account_info WHERE account='$account'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "<script>alert('사기정보를 등록하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }
  $num = mysqli_num_rows($result);

  //cheater_info 테이블에 대한 값을 갱신해주거나 만들어 줍니다.

  if($num){//해당 account에 대한 사기꾼 정보가 이미 존재할 경우에는 cheater_info테이블의 데이터를 갱신해줍니다.
    $row = mysqli_fetch_array($result);
    $cheater_code = $row["cheater_code_account"];
    $query = "UPDATE cheater_info SET total_price=total_price+$price where cheater_code='$cheater_code'";
    //total_price값 갱신
    $result = mysqli_query($conn, $query);
    if(!$result){
      echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }

    $query = "UPDATE cheater_info SET cheat_count=cheat_count+1 where cheater_code='$cheater_code'";
    //cheat_count값 갱신
    $result = mysqli_query($conn, $query);
    if(!$result){
      echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
  }

  else{//해당 account에 대한 정보가 없을 경우에는 cheater_info테이블에 데이터를 새로 만듭니다.
    $query = "INSERT INTO cheater_info (total_price) VALUES ($price)";
    //cheater_info에 정보 삽입합니다.
    $result = mysqli_query($conn, $query);
    if(!$result){
      echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
    $cheater_code = mysqli_insert_id($conn);
    //cheater_info를 등록하면서 부여된, account_info의 외래키로 사용되는 register_code 받아옵니다.
    $query = "INSERT INTO account_info (account, cheater_code_account) VALUES ($account, $cheater_code)";
    //account_info에 정보 삽입합니다.
    $result = mysqli_query($conn, $query);
    if(!$result){
      echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
  }


  // 해당 계좌에 대한 사기꾼의 정보(부모)가 있으니, 사기 정보(자식)를 등록합니다.
  $query = "INSERT INTO cheat_info (cheater_code_cheat, item, price) VALUES ($cheater_code, '$item', $price)";
  //cheat_info 테이블에 해당 사기 정보에 대한 자세한 값을 삽입합니다.
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }

  $register_code = mysqli_insert_id($conn);
  //cheat_info를 등록하면서 부여된, victim_info의 외래키로 사용되는 register_code 받아옵니다.
  $query = "INSERT INTO victim_info (member_id_victim, register_code_victim) VALUES ('$id', $register_code)";
  //victim_info 테이블에 사기당한 해당 회원에 대한 값을 삽입합니다.
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }

  $query = "INSERT INTO site_info (cheater_id, site, register_code_site) VALUES ('$site_id', '$site', $register_code)";
  //site_info 테이블에 사기당한 사이트 정보에 대한 값을 삽입합니다.
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }

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
    <!-- 등록한 정보를 확인하기 위해 다시 보여주는 table입니다. -->
    <form name="register_info" action="insert.php" method="post">
      <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor="#777777">
        <tr>
          <td id = "table_title">
            <b>등록 정보 확인</b>
          </td>
        </tr>
        <tr>
          <td bgcolor=white>
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

    <?mysqli_close($conn);?>
  </body>
</html>
