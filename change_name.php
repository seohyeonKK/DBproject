<?
  include './dbconn.php';
  session_start();

  $id = $_SESSION['id'];
  $name = $_POST['user_name'];

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
    echo "<script>opener.location.reload();window.close();</script>";
  }
  mysqli_close($conn);
?>
