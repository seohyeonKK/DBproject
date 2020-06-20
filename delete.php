<html>
  <head>
    <?
      session_start();
      include './dbconn.php';
      include './user_information.php';

      $id = $_POST['user_id'];
      $pwd = $_POST['user_password'];
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
    $query = "SELECT * FROM member_info WHERE member_id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $member_num = $row["member_num"];

    //member_num을 통해 victim_info 테이블에서 register_code를 구합니다.
    $query = "SELECT * FROM victim_info WHERE member_num_victim = $member_num";
    $result = mysqli_query($conn, $query);
      echo "
      <table id='delete_table'>
         <tr>
            <th id = 'td_chk' width=50></th>
            <th id = 'td_item' width =100>&nbsp;품목&nbsp;</th>
            <th id = 'td_item' width =100>&nbsp;가격&nbsp;</th>
            <th id = 'td_item' width =100>&nbsp;사이트&nbsp;</th>
            <th id = 'td_cheate' width =150>&nbsp;사이트 아이디 &nbsp;</th>
            <th id = 'td_account' width =250>&nbsp;계좌 번호&nbsp;</th>
         </tr>
      </table>
      <form name='delete_check_form' action='delete_check.php' method='POST'>
      ";


      while ($row = mysqli_fetch_array($result))
      {
        $register_code = $row["register_code_victim"];

        $query2 = "SELECT * FROM cheat_info WHERE register_code = $register_code";
        $result2 = mysqli_query($conn, $query2);
        $row2 = mysqli_fetch_array($result2);

        $cheater_code = $row2["cheater_code_cheat"];
        $item = $row2["item"];
        $price = $row2["price"];

        $query2 = "SELECT * FROM site_info WHERE register_code_site = $register_code";
        $result2 = mysqli_query($conn, $query2);
        $row2 = mysqli_fetch_array($result2);

        $site = $row2["site"];
        $cheater_id = $row2["cheater_id"];

        $query2 = "SELECT * FROM cheater_info WHERE cheater_code = $cheater_code";
        $result2 = mysqli_query($conn, $query2);
        $row2 = mysqli_fetch_array($result2);

        $account = $row2["account"];


        echo"
          <center>

            <table id ='delete_table'>
               <tr>
                  <td id ='td_chk' width = 50><center><input type='checkbox' name='checkbox[]' value='$register_code'></center></td>
                  <td id = 'td_item' width = 100><center> $item </center></td>
                  <td id = 'td_item' width = 100><center> $price </center></td>
                  <td id = 'td_item' width = 100><center> $site </center></td>
                  <td id = 'td_cheate' width = 150><center> $cheater_id </center</td>
                  <td id = 'td_account' width = 250><center> $account </center></td>
               </tr>
            </table>

          </center>

        ";
      }

      echo "<br><br><input type='submit' id='btn_delete' value='삭제'></a>";
      echo "<br><br><br><a href='main.php'><input type='button' id='btn_ok' value='메인페이지'></a></form>";
      mysqli_close($conn)

      ?>
  </body>

</html>
