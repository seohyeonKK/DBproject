<!--
'메뉴'화면에서 '전체 조회'버튼 클릭 시 보이는 화면입니다.
사이트에 등록된 모든 사기 내역에 대한 정보를 확인 할 수 있습니다.
기본으로는 등록순서대로 보입니다.
-->

<html>
  <?
    session_start();
    include './dbconn.php';

    if(!isset($_SESSION['id'])){
      echo "
      <script>
      alert('로그인 후 이용하세요.');
      location.href='index.html';
      </script>
      ";
    }
    $option = $_GET['option'];
  ?>
  <head>
    <link rel="stylesheet" href="common.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

    <script type="text/javascript">

    // 정렬 순서에 대해 선택한 정보를 option으로 넘깁니다.
    function select_align(e){
      window.location.href = "allfind.php?option=" + e.value;
    }

    </script>

  </head>

  <body>
    <br><br>
    <h3 id='page_sub_title' align="center"> 사이트에 등록된 사기 내역 </h3>

    <center>
      <br><br>
      <a href='find.php'><input id='btn_delete' type='button' value='계좌로 조회'></a>&nbsp;&nbsp;&nbsp;
      <a href='main.php'><input id='btn_ok' type='button' value='메인페이지'></a>
      <br><br><br>
    <div id="select_box">
      <select id="list_align" name="list_align" onchange="select_align(this)">
        <option selected disabled value="0">정렬 순서</option>
        <option value="1">등록번호</option>
        <option value="2">계좌</option>
        <option value="3">품목</option>
        <option value="4">가격</option>
        <option value="5">사이트아이디</option>
        <option value="6">사이트</option>
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

      if($option=="1"){ //등록 번호 순으로 정렬합니다.
        $query = "SELECT * FROM cheat_site_info ORDER BY register_code";
      }
      else if($option=="2"){ // 계좌 번호 순으로 정렬합니다.
        $query = "SELECT * FROM cheat_site_info ORDER BY account";
      }
      else if($option=="3"){ // 품목의 이름 순으로 정렬합니다.
        $query = "SELECT * FROM cheat_site_info ORDER BY item";
      }
      else if($option=="4"){ // 가격이 낮은 순에서 높은 순으로 정렬합니다.
        $query = "SELECT * FROM cheat_site_info ORDER BY price";
      }
      else if($option=="5"){ //사기꾼의 아이디 정보로 정렬합니다.
        $query = "SELECT * FROM cheat_site_info ORDER BY cheater_id";
      }
      else if($option=="6"){ // 사기 당한 사이트 정보로 정렬합니다.
        $query = "SELECT * FROM cheat_site_info ORDER BY site";
      }
      else { // 그 외는 모두 등록 번호 순으로 정렬합니다. (기본)
        $query = "SELECT * FROM cheat_site_info ORDER BY register_code";
      }

      $result = mysqli_query($conn, $query);
      if(!$result){
        echo "<script>alert('사기 정보를 조회하는 과정에서 오류가 발생했습니다.');</script>";
        return;
      }

      // mysqli_query를 통해 얻은 result set에서 mysqli_fetch_array()함수를 통해 레코드를 한 개씩 반환받아 row배열에 저장합니다.
      // result set을 한 개씩 출력합니다.
      while ($row = mysqli_fetch_array($result)){
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
        </center>
         ";
      }


      mysqli_close($conn);
    ?>

</body>
</html>
