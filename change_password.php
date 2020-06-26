<!--
마이페이지에서 비밀번호를 변경시 이용되는 파일입니다.
비밀번호을 성공적으로 변경 할 때에는 세션의 pwd값을 변경해 줍니다.
 -->

<?
  include './dbconn.php';
  session_start();

  $id = $_SESSION['id'];
  $password = $_POST['user_password'];

  $query = "UPDATE member_info SET member_pw = '$password' WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
  if(!$result)
  {
    echo "<script>alert('비밀번호를 변경하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }
  else
  {
    $_SESSION['pwd'] = $password;
    echo "<script>
          opener.location.reload();
          window.close();
          </script>";
  }
  mysqli_close($conn);
?>
