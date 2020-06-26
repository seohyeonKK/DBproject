<!--
  메뉴화면에서 '삭제'버튼을 누르면 실행되는 화면을 보이는 파일입니다.
 -->

<html>
  <head>
    <?
      session_start();
      include './dbconn.php';
      include './user_information.php';
    ?>

    <link rel="stylesheet" href="common.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">
  </head>

  <body>
    <center>
    <h2 id='page_title'> '<?=$_SESSION['id']?>' 회원이 등록한 정보 조회 </h2>
    <br>
    <?
    // id를 통해 memeber의 고유번호 member_num을 받아옵니다.
    $id = $_SESSION["id"];

    //member_id를 통해 victim_info 테이블에서 register_code를 구합니다.
    $query = "SELECT * FROM victim_info WHERE member_id_victim = '$id'";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 불러오는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }

    echo "
      <table id='delete_table'>
        <tr>
          <th id = 'td_chk' width=50></th>
          <th id = 'td_account' width =250>&nbsp;계좌번호&nbsp;</th>
          <th id = 'td_item' width =200>&nbsp;품목&nbsp;</th>
          <th id = 'td_item' width =100>&nbsp;가격&nbsp;</th>
          <th id = 'td_item' width =100>&nbsp;사이트&nbsp;</th>
          <th id = 'td_cheate' width =150>&nbsp;사이트 아이디 &nbsp;</th>
        </tr>
      </table>";

    // 체크박스 중 선택된 체크박스들의 데이터를 POST방식으로 delete_check.php파일에 전달해줍니다.
    echo "<form name='delete_check_form' action='delete_check.php' method='POST'>";

    // 자신이 등록한 사기 사건의 정보의 내역을 화면에 모두 보여주기 위한 while문입니다.
    // 해당 사건의 계좌번호, 품목, 가격, 사기당한 사이트 및 사기꾼 사이트 아이디를 모두 나열해 줍니다.
    while ($row = mysqli_fetch_array($result))
    {
      $register_code = $row["register_code_victim"];

      $query = "SELECT * FROM cheat_site_info WHERE register_code = $register_code";
      $result2 = mysqli_query($conn, $query);
      if(!$result2)
      {
        echo "<script>alert('사기 정보를 조회하는 과정에서 오류가 발생했습니다.');</script>";
        return;
      }

      $row2 = mysqli_fetch_array($result2);
      $account = $row2["account"];
      $item = $row2["item"];
      $price = $row2["price"];
      $cheater_id = $row2["cheater_id"];
      $site = $row2["site"];
      echo"
        <center>
          <table id ='delete_table'>
            <tr>
              <td id ='td_chk' width = 50><center><input type='checkbox' name='checkbox[]' value='$register_code'></center></td>
              <td id = 'td_account' width = 250><center> $account </center></td>
              <td id = 'td_item' width = 200><center> $item </center></td>
              <td id = 'td_item' width = 100><center> $price </center></td>
              <td id = 'td_item' width = 100><center> $site </center></td>
              <td id = 'td_cheate' width = 150><center> $cheater_id </center</td>
           </tr>
         </table>
       </center>
      ";
    }

    echo "<br><br>";
    //'삭제'버튼을 누르면 delete_check.php 파일로 체크된 체크박스의 데이터들이 전달되고 전달된 데이터들은 삭제됩니다.
    echo "<input type='submit' id='btn_delete' value='삭제'></a>";
    echo "<br><br>";
    // '메인페이지'버튼을 누르면 메뉴 화면으로 돌아 갑니다.
    echo "<a href='main.php'><input type='button' id='btn_ok' value='메인페이지'></a>";
    echo "</form>";
    mysqli_close($conn)

  ?>
 </body>
</html>
