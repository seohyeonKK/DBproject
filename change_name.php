<!--
마이페이지에서 이름을 변경시 이용되는 파일입니다.
이름을 성공적으로 변경하면 세션의 name값을 변경해 줍니다.
 -->

<?
  include './dbconn.php';
  session_start();

  $id = $_SESSION['id'];
  $name = $_POST['user_name'];

  // db의 member_info테이블에서 해당 아이디와 이름을 확인해서 로그인 유지에 사용되는 session의 값을 변경해줍니다.
  $query = "UPDATE member_info SET member_name = '$name' WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
  if(!$result)
  {
    echo "<script>alert('이름을 변경하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }
  else
  {
    $_SESSION['name'] = $name;
    echo "<script>
          opener.location.reload();
          window.close();
          </script>";
  }
  mysqli_close($conn);
?>
