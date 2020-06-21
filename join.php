<?
  include './dbconn.php';

  // user_id와 user_password를 받아옵니다.
  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];
  $name = $_POST['user_name'];

  // 같은 id가 있는지 중복을 체크합니다.
  $query = "SELECT * FROM member_info WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
  if(!$result)
  {
    echo "<script>alert('회원가입을 하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }
  $num = mysqli_num_rows($result);

  // if ( ($id=='') || ($pwd=='') ){ // id,pw 공백일 시
  //   echo "<script> alert('아이디 또는 비밀번호를 입력해'); </script>";
  //   echo "<script> window.history.back(); </script>";
  //   return;
  // }

  // 데이터 받아온 것을 넘깁니다.
  // 중복된 것이 없으면 if(!0) 하여 if문의 조건을 만족하게 됩니다.
  if(!$num)
  {
    $query2 = "INSERT INTO member_info (member_id, member_pw, member_name) VALUES ('$id', '$pwd', '$name')";
    //$query3 = "INSERT INTO member_info(member_pw) VALUES ('$password')";
    $result = mysqli_query($conn, $query2);
    if(!$result)
    {
      echo "<script>alert('회원가입을 하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
    //mysqli_query($conn, $query3);
    echo "<script> alert('회원가입 성공! 환영합니다 :D
    다시 로그인 해주세요 ^^ '); </script>";
    echo "<script>location.href='./index.html'</script>";
  }
  else
  {

    // <script>
    //   alert('Duplicated Id');
    //   location.href = './index.html';
    // </script>
    echo "<script> alert('중복된 아이디입니다. 중복 검사를 해주세요.'); </script>";
    echo "<script> window.history.back(); </script>";
    //location.href='./login_form.php'</script>";
  }
  mysqli_close($conn);
?>
