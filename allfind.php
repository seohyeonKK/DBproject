<html>
<head>

  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

</head>
  <body align=center>
    <?
      session_start();
      include './dbconn.php';
    ?>
  <br>
  <center>
    <br><h3 id='page_sub_title'> 상세 이력 </h3>
    <table id ='delete_table'>
       <tr>
          <th id = 'td_cheate' width =150>&nbsp;계좌&nbsp;</th>
          <th id = 'td_cheate' width =150>&nbsp;품목&nbsp;</th>
          <th id = 'td_item' width =100>&nbsp;가격&nbsp;</th>
          <th id = 'td_cheate' width =150>&nbsp;사이트 아이디&nbsp;</th>
          <th id = 'td_item' width =100>&nbsp;사이트&nbsp;</th>
       </tr>
    </table>

  <?

    $query = "SELECT * FROM cheat_site_info";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 조회하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }

    while ($row = mysqli_fetch_array($result))
    {
      $account = $row["account"];
      $item = $row["item"];
      $price = $row["price"];
      $cheater_id = $row["cheater_id"];
      $site = $row["site"];

      echo "
      <center>
      <table id ='delete_table'>
         <tr>
            <td id = 'td_cheate' width =150><center> $account </center></td>
            <td id = 'td_cheate' width =150><center> $item </center></td>
            <td id = 'td_item' width =100><center> $price </center></td>
            <td id = 'td_cheate' width =150><center> $cheater_id </center></td>
            <td id = 'td_item' width =100><center> $site </center></td>
         </tr>
      </table>
      </center>
       ";
    }

  echo "<br><br><br><a href='find.php'><input id='btn_delete' type='button' value='계좌로 조회'></a><br><br>";
  echo "<br><a href='main.php'><input id='btn_ok' type='button' value='메인페이지'></a>";
  mysqli_close($conn);
?>

</body>
</html>
