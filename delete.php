<html>
  <head>
    <?
      session_start();
      include './dbconn.php';

      $id = $_POST['user_id'];
      $pwd = $_POST['user_password'];

      echo"<br>";
      echo "<div style=\"text-align:right\">";
      echo $_SESSION['id']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
      //echo"<br><br>";
      echo "&nbsp; <a href='mypage.php'><input type='button' value='마이페이지'></a>"; // 마이페이지로 이동
      echo "&nbsp; <a href='logout.php'><input type='button' value='로그아웃'></a> &nbsp;&nbsp;";

      echo"<br><br>";
      echo "<center>";
      echo "<h1> 삭제 페이지 </h1>";
?>

  </head>

  <body>
    <h2> '<?=$_SESSION['id']?>' 회원이 등록한 정보 조회 </h2>
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
      <table border='1'>
         <tr>
            <th width=50/>
            <th width =100>&nbsp;품목&nbsp;</th>
            <th width =100>&nbsp;가격&nbsp;</th>
            <th width =100>&nbsp;사이트&nbsp;</th>
            <th width =150>&nbsp;사이트 아이디 &nbsp;</th>
            <th width =250>&nbsp;계좌 번호&nbsp;</th>
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
          <table border=1>
             <tr>
                <td width = 50><center><input type='checkbox' name='checkbox[]' value='$register_code'></center></td>
                <td width = 100><center> $item </center></td>
                <td width = 100><center> $price </center></td>
                <td width = 100><center> $site </center></td>
                <td width = 150><center> $cheater_id </center</td>
                <td width = 250><center> $account </center></td>
             </tr>
          </table>
          </center>

        ";
      }

      echo "<br><br><input type='submit' value='삭제'></a>";
      echo "<br><br><a href='main.php'><input type='button' value='메인페이지'></a></form>";
      mysqli_close($conn)

      ?>
  </body>

</html>
