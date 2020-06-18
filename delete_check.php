<?
  session_start();
  include './dbconn.php';

  $num = count($_POST['checkbox']);

  for($i=0;$i<$num;$i++)
  {
    $register_code =  $_POST['checkbox'][$i];

    //site_info 테이블의 튜플부터 삭제합니다.
    $query = "DELETE FROM site_info WHERE register_code_site=$register_code";
    mysqli_query($conn, $query);

    //victim_info 테이블의 튜플을 삭제합니다.
    $query = "DELETE FROM victim_info WHERE register_code_victim=$register_code";
    mysqli_query($conn, $query);

    //cheat_info 테이블의 튜플을 삭제하기 전, cheater_code를 받아옵니다.
    $query = "SELECT * FROM cheat_info WHERE register_code=$register_code";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $cheater_code = $row["cheater_code_cheat"];

    //cheat_info 테이블의 튜플을 삭제합니다.
    $query = "DELETE FROM cheat_info WHERE register_code=$register_code";
    mysqli_query($conn, $query);

    //cheater_info 테이블의 튜플을 삭제합니다.
    $query = "DELETE FROM cheater_info WHERE cheater_code=$cheater_code";
    mysqli_query($conn, $query);
  }


  mysqli_close($conn);
  echo "<script> window.history.back();</script>";


?>
