<!--
마이페이지에서 이름을 변경시 이용되는 파일입니다.
이름을 성공적으로 변경하면 세션과 db의 name값을 변경해 줍니다.
 -->

<?
  include './dbconn.php';
  session_start();

  $id = $_SESSION['id'];
  $name = $_POST['user_name'];

  // 받아온 값으로 해당 아이디에 대한 사용자의 이름을 바꿔줍니다.
  $query = "UPDATE member_info SET member_name = '$name' WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "<script>alert('이름을 변경하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }
  else{ // session의 name값도 변경된(받아 온) 값으로 바꿔줍니다.
    $_SESSION['name'] = $name;
    echo "<script>
          opener.location.reload();
          window.close();
          </script>";
  }
  mysqli_close($conn);
?>
