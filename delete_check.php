<!--
delete.php파일에서 '삭제'버튼을 누르면 실행되는 파일으로 db에 저장된 사건의 데이터를 삭제 및 갱신합니다.
-->

<?
  session_start();
  include './dbconn.php';

  // 삭제하려고 선택된 checkbox가 없는 경우에 예외처리를 통해 삭제할 정보를 선택하라고 알려줍니다.
  if($_POST['checkbox'] == 0)
  {
    echo "<script>alert('삭제할 정보를 선택해주세요.');</script>";
    echo "<script> location.href='./delete.php';</script>";
  }

  // 넘겨받은 checkbox의 갯수를 세아려 줍니다.
  $num = count($_POST['checkbox']);

  for($i=0;$i<$num;$i++)
  {
    // 넘겨받은 checkbox를 차례대로 사건 정보에 대한 정보가 담긴 register_code를 통해 삭제를 진행합니다.
    $register_code =  $_POST['checkbox'][$i];

    //site_info 테이블의 튜플부터 삭제합니다.
    $query = "DELETE FROM site_info WHERE register_code_site=$register_code";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.1');</script>";
      return;
    }

    //victim_info 테이블의 튜플을 삭제합니다.
    $query = "DELETE FROM victim_info WHERE register_code_victim=$register_code";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.2');</script>";
      return;
    }

    // //cheat_info 테이블의 튜플을 삭제하기 전, cheater_code를 받아옵니다.
    $query = "SELECT * FROM cheat_info WHERE register_code=$register_code";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
    $row = mysqli_fetch_array($result);
    $cheater_code = $row["cheater_code_cheat"];
    $price = $row["price"];

    //cheat_info 테이블의 튜플을 삭제합니다.
    $query = "DELETE FROM cheat_info WHERE register_code=$register_code";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.4');</script>";
      return;
    }

    //cheater_info 테이블의 튜플을 삭제합니다.
    //총사기횟수가 1이면 해당 사기꾼의 정보를 삭제하고,
    //총사기횟수가 2이상이면 총사기횟수와 총사기금액을 갱신해준다.

    //총사기횟수(cheat_count)를 받아온다.
    $query = "SELECT * FROM cheater_info WHERE cheater_code=$cheater_code";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
    $row = mysqli_fetch_array($result);
    $cheat_count = $row["cheat_count"];

    if($cheat_count > 1) //총사기횟수가 2이상이면 총사기횟수와 사기금액을 갱신해준다.
    {
      $query = "UPDATE cheater_info SET cheat_count = cheat_count - 1 WHERE cheater_code = $cheater_code";
      $result = mysqli_query($conn, $query);
      if(!$result)
      {
        echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.');</script>";
        return;
      }
      $query = "UPDATE cheater_info SET total_price = total_price - $price WHERE cheater_code = $cheater_code";
      $result = mysqli_query($conn, $query);
      if(!$result)
      {
        echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.');</script>";
        return;
      }
    }
    else //총사기횟수가 1 이면 사기꾼의 정보를 삭제합니다.
    {
      $query = "DELETE FROM account_info WHERE cheater_code_account=$cheater_code";
      $result = mysqli_query($conn, $query);
      if(!$result)
      {
        echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.');</script>";
        return;
      }

      $query = "DELETE FROM cheater_info WHERE cheater_code=$cheater_code";
      $result = mysqli_query($conn, $query);
      if(!$result)
      {
        echo "<script>alert('사기 정보를 삭제하는 과정에서 오류가 발생했습니다.');</script>";
        return;
      }
    }
  }

  mysqli_close($conn);
  echo "<script> alert('선택한 정보가 삭제되었습니다.');</script>";
  echo "<script> location.href='./delete.php';</script>";

?>
