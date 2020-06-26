<!--
'메뉴'화면에서 '전체 조회'에서 정렬순서를 '가격순'으로 했을 때 보이는 화면입니다.
사이트에 등록된 모든 사기 내역에 대한 정보를 확인 할 수 있습니다.
-->

<html>
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
  ?>
  <head>
    <link rel="stylesheet" href="common.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

    <script type="text/javascript">

    function select_align(e){
      if(e.value=="record"){
         location.href='./allfind.php'
      }
      else if(e.value="price"){
        location.href='./allfind_price.php'
      }
    }

    </script>

  </head>

  <body>
    <br><br>
    <h3 id='page_sub_title' align="center"> 사이트에 등록된 사기 내역 </h3>

    <center>
    <div id="select_box">
      <label for="list_align">정렬순서</label>
      <select id="list_align" name="list_align" onchange="select_align(this)">
        <option >정렬순서</option>
        <option value="record">등록순</option>
        <option value="price" selected>금액순</option>
      </select>
    </div>
    <br><br>
    </center>

    <!-- db에 등록된 모든 사기 정보를 보여주는 테이블 입니다. -->
    <table id ='delete_table' align="center">
      <tr>
        <th id = 'td_cheate' width =100>&nbsp;사기 등록번호&nbsp;</th>
        <th id = 'td_cheate' width =150>&nbsp;계좌&nbsp;</th>
        <th id = 'td_cheate' width =150>&nbsp;품목&nbsp;</th>
        <th id = 'td_item' width =100>&nbsp;가격&nbsp;</th>
        <th id = 'td_cheate' width =150>&nbsp;사이트 아이디&nbsp;</th>
        <th id = 'td_item' width =100>&nbsp;사이트&nbsp;</th>
      </tr>
    </table>

    <?
      //사건의 정보가 담긴 cheat_info 테이블의 데이터들을 불러와 등록된 사기 목록을 보여줍니다.
      $query = "SELECT * FROM cheat_site_info ORDER BY price ASC";
      $result = mysqli_query($conn, $query);
      if(!$result)
      {
        echo "<script>alert('사기 정보를 조회하는 과정에서 오류가 발생했습니다.');</script>";
        return;
      }
      // mysqli_query를 통해 얻은 result set에서 mysqli_fetch_array()함수를 통해  레코드를 1개씩 반환받아 row배열에 저장합니다.
      while ($row = mysqli_fetch_array($result))
      {
        $account = $row["account"];
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
              <td id = 'td_cheate' width =150><center> $account </center></td>
              <td id = 'td_cheate' width =150><center> $item </center></td>
              <td id = 'td_item' width =100><center> $price </center></td>
              <td id = 'td_cheate' width =150><center> $cheater_id </center></td>
              <td id = 'td_item' width =100><center> $site </center></td>
           </tr>
        </table>

         ";
      }

      echo "<br><br><br>";
      echo "<a href='find.php'><input id='btn_delete' type='button' value='계좌로 조회'></a>";
      echo "<br><br><br>";
      echo "<a href='main.php'><input id='btn_ok' type='button' value='메인페이지'></a>
      </center>";

      mysqli_close($conn);
    ?>

</body>
</html>
