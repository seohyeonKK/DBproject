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
      </table>
      <form name='delete_check_form' action='delete_check.php' method='POST'>
      ";

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


      echo "<br><br><input type='submit' id='btn_delete' value='삭제'></a>";
      echo "<br><br><a href='main.php'><input type='button' id='btn_ok' value='메인페이지'></a></form>";
      mysqli_close($conn)

      ?>
  </body>

</html>
