<html>
<head>
  <?
    session_start();
    include './dbconn.php';

    $account = $_GET['account'];

    $query = "SELECT * FROM cheater_info WHERE account='$account'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $cheater_code = $row["cheater_code"];


    $query = "SELECT total_price, cheat_count, arrest FROM cheater_info WHERE account='$account'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $total_price = $row["total_price"];
    $cheat_count = $row["cheat_count"];
    $arrest = $row["arrest"];

    if($arrest==0) $arrest='X';
    else $arrest='X';

  ?>
</head>

<body align=center>
  <br>
  <h2> 사기꾼 세부 이력 조회 </h2>
  <br>

<!-- 사기꾼의 총 이력을 합산하여 나타내줍니다.-->
<center>
<table border="1">
   <tr>
      <th width =200>&nbsp;계좌번호&nbsp;</th>
      <th width =100>&nbsp;총사기금액&nbsp;</th>
      <th width =100>&nbsp;총사기횟수&nbsp;</th>
      <th width =100>&nbsp;검거여부&nbsp;</th>
   </tr>
   <tr>
      <td><center><? echo $account; ?></center></td>
      <td><center><? echo $total_price; ?></center></td>
      <td><center><? echo $cheat_count; ?></center></td>
      <td><center><? echo $arrest; ?></center></td>
   </tr>
</table>
</center>
</body>
</html>


<?

  $query =
  "SELECT c.cheater_code_cheat,
    c.register_code,
    c.item,
    c.price,
    s.cheater_id,
    s.site
    FROM cheat_info AS c
    JOIN site_info AS s
    ON c.cheater_code_cheat=s.cheater_code_site AND c.register_code=s.register_code_site
    WHERE s.cheater_code_site=$cheater_code
  ";
  echo "<br><h3> 상세 이력 </h3>";
  $result = mysqli_query($conn, $query);
  while (  $row = mysqli_fetch_array($result))
  {
    $item = $row["item"];
    $price = $row["price"];
    $cheater_id = $row["cheater_id"];
    $site = $row["site"];

    echo "
    <center>
    <table border='1'>
       <tr>
          <th width =150>&nbsp;품목&nbsp;</th>
          <th width =100>&nbsp;가격&nbsp;</th>
          <th width =150>&nbsp;사이트 아이디&nbsp;</th>
          <th width =100>&nbsp;사이트&nbsp;</th>
       </tr>

       <tr>
          <td><center> $item </center></td>
          <td><center> $price </center></td>
          <td><center> $cheater_id </center></td>
          <td><center> $site </center></td>
       </tr>
    </table>
    </center>
    <br>
     ";
  }
  echo "<br><a href='main.php'><input type='button' value='메인페이지'></a>";
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='find.php'><input type='button' value='재조회'></a>";
  mysqli_close($conn);
?>
