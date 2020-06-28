<!--
join_form.php파일에서 아이디 중복확인을 위한 버튼을 누르면 실행되는 파일입니다.
join_form.php파일에서 입력받은 id를 전달받아 db의 member_info테이블에 존재하는지 확인합니다.
해당 아이디가 유일한 값인지 중복을 확인합니다.
-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?
      include './dbconn.php';
    ?>

    <link rel="stylesheet" href="common.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

    <script type="text/javascript">
      function close_check(){
        window.close();
      }
    </script>

  </head>

  <body id="pop_up_css">

    <?
      // user_id와 user_password를 받아옵니다.
      $id = $_GET['user_id'];

      // 같은 id가 있는지 중복을 체크합니다.
      $query = "SELECT * FROM member_info WHERE member_id = '$id'";
      $result = mysqli_query($conn, $query);
      if(!$result){
        echo "<script>alert('중복을 확인하는 과정에서 오류가 발생했습니다.');</script>";
        return;
      }
      $num = mysqli_num_rows($result);

      // 데이터 받아온 것을 넘깁니다.
      // 중복된 것이 없으면 조건을 만족하게 됩니다.
      if($num){
        printf("이미 존재하는 아이디입니다!");
      }
      else{
        printf("사용 가능한 아이디입니다. :)");
      }

      mysqli_close($conn);
    ?>
    <br><br>
    <input type="button" value="확인" id="btn_check" onClick="close_check()">

</body>
</html>
