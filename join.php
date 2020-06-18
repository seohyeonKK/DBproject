<?
  include './dbconn.php';

  // user_id와 user_password를 받아옵니다.
  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  // 같은 id가 있는지 중복을 체크합니다.
  $query = "SELECT * FROM member_info WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
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
    $query2 = "INSERT INTO member_info (member_id, member_pw) VALUES ('$id', '$pwd')";
    //$query3 = "INSERT INTO member_info(member_pw) VALUES ('$password')";
    mysqli_query($conn, $query2);
    //mysqli_query($conn, $query3);
    echo "<script> alert('회원가입 성공! 환영합니다 :D'); </script>";
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
