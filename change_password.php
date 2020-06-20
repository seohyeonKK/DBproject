<?
  include './dbconn.php';
  session_start();

  $id = $_SESSION['id'];
  $password = $_POST['user_password'];

  $query = "UPDATE member_info SET member_pw = '$password' WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
  if(!$result)
  {
    echo "<script>alert('비밀번호 변경을 실패했습니다.');</script>";
  }
  else
  {
    $_SESSION['pwd'] = $password;
    echo "<script>opener.location.reload();window.close();</script>";
  }
  mysqli_close($conn);
?>
