<!--
로그인 창인 index.html에서 로그인 버튼을 누르면 실행되는 페이지로 로그인을 진행하는 파일입니다.
index.html파일에서 입력받은 user_id와 user_password를 전달받아 로그인을 진행합니다.
-->

<?php
  session_start();
  include './dbconn.php';

  //if (!isset($_POST['user_id']) || !isset($_POST['password'])) exit; //머드라

  // 전달받은 id와 password를 변수에 저장합니다.
  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];
  // 전달받은 id와 password가 공백인지 검사합니다.
  if ( ($id=='') || ($pwd=='') )
  {
    echo "<script>
           alert('아이디 또는 패스워드를 입력하여 주세요.');
           history.back();
          </script>";
  }

  // 입력받은 id와 password가 db의 member_info테이블에 저장되어 있는 지 확인해 있는 경우 로그인을 진행합니다.
  $query = "SELECT * FROM member_info WHERE member_id='$id' AND member_pw ='$pwd'";
  $result = mysqli_query($conn,$query);
  if(!$result)
  {
    echo "<script>alert('로그인을 하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }

  $row = mysqli_fetch_array($result);
  if ($id =$row['member_id'] && $pwd == $row['member_pw'])
  {
    // 로그인 성공 시, 사용자 정보를 서버파일에 저장해서 로그인 정보를 유지하는데 사용됩니다.
    $_SESSION['id'] = $row['member_id'];
    $_SESSION['pwd'] = $row['member_pw'];
    $_SESSION['name'] = $row['member_name'];

    // 로그인 성공 시, main.php인 메뉴 화면으로 이동합니다.
    echo "<script>window.alert('로그인 완료');</script>";
    echo "<script>location.href='main.php';</script>";
  }
  else
  {
    // 로그인 실패 시, 다시 index.html인 로그인 화면으로 돌아갑니다.
    echo "<script>window.alert('로그인 실패'); </script>";
    echo "<script>location.href='index.html';</script>";
  }
  mysqli_close($conn);
?>
