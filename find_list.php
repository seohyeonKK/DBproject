<html>
<head>
  <?
    session_start();
    include './dbconn.php';

    if(!isset($_SESSION['id']))
    {
      echo "
      <script>
      alert('로그인 후 이용하세요.');
      location.href='index.html';
      </script>
      ";
    }

    $account = $_GET['account'];

    $query = "SELECT * FROM account_info WHERE account='$account'";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 조회하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
    $row = mysqli_fetch_array($result);
    $cheater_code = $row["cheater_code_account"];

    $query = "SELECT total_price, cheat_count FROM cheater_info WHERE cheater_code=$cheater_code";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 조회하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
    $row = mysqli_fetch_array($result);

    $total_price = $row["total_price"];
    $cheat_count = $row["cheat_count"];

  ?>
  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

</head>

<body align=center>
  <br>
  <h2 id='page_title'> '<?=$account?>' 계좌의 사기 이력 </h2>

<!-- 사기꾼의 총 이력을 합산하여 나타내줍니다.-->
  <center>
    <table id='delete_table' border=1>
       <tr>
          <th id = 'td_account' width =200>&nbsp;계좌번호&nbsp;</th>
          <th id = 'td_item' width =100>&nbsp;총사기금액&nbsp;</th>
          <th id = 'td_item' width =100>&nbsp;총사기횟수&nbsp;</th>
       </tr>
       <tr>
          <td id = 'td_account'><center><? echo $account; ?></center></td>
          <td id = 'td_item'><center><? echo $total_price; ?></center></td>
          <td id = 'td_item'><center><? echo $cheat_count; ?></center></td>
       </tr>
    </table>
  </center>
</body>
</html>


<?
  echo "
  <center>
    <br><h3 id='page_sub_title'> 상세 이력 </h3>
    <table id ='delete_table'>
       <tr>
          <th id = 'td_cheate' width =100>&nbsp;사기 등록번호&nbsp;</th>
          <th id = 'td_cheate' width =150>&nbsp;품목&nbsp;</th>
          <th id = 'td_item' width =100>&nbsp;가격&nbsp;</th>
          <th id = 'td_cheate' width =150>&nbsp;사이트 아이디&nbsp;</th>
          <th id = 'td_item' width =100>&nbsp;사이트&nbsp;</th>
       </tr>
    </table>
  ";

  $query = "SELECT * FROM cheat_site_info WHERE cheater_code_cheat=$cheater_code";
  $result = mysqli_query($conn, $query);
  if(!$result)
  {
    echo "<script>alert('사기 정보를 조회하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }

  while ($row = mysqli_fetch_array($result))
  {
    $item = $row["item"];
    $price = $row["price"];
    $cheater_id = $row["cheater_id"];
    $site = $row["site"];
    $register_code = $row["register_code"];

    echo "
    <center>
    <table id ='delete_table'>
       <tr>
          <td id = 'td_item' width =100><center> $register_code </center></td>
          <td id = 'td_cheate' width =150><center> $item </center></td>
          <td id = 'td_item' width =100><center> $price </center></td>
          <td id = 'td_cheate' width =150><center> $cheater_id </center></td>
          <td id = 'td_item' width =100><center> $site </center></td>
       </tr>
    </table>
    </center>
     ";
  }

  echo "<br><br><br><a href='find.php'><input id='btn_delete' type='button' value='재조회'></a><br><br>";
  echo "<a href='allfind.php'><input id='btn_delete' type='button' value='전체 조회'></a><br><br>";
  echo "<a href='main.php'><input id='btn_ok' type='button' value='메인페이지'></a>";
  mysqli_close($conn);
?>
