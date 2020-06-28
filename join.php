<!--
join_form.php에서 회원가입 시 필요한 데이터들을 전달받아 member_info테이블에 데이터를 생성합니다.
-->

<?
  include './dbconn.php';

  // join_form에서 입력받은 user_id, user_password, user_name을 받아옵니다.
  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];
  $name = $_POST['user_name'];

  // 다시 한 번 같은 id가 있는지 중복여부를 체크합니다.
  $query = "SELECT * FROM member_info WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "<script>alert('회원가입을 하는 과정에서 오류가 발생했습니다.');</script>";
    return;
  }
  $num = mysqli_num_rows($result);


  if(!$num){// 중복된 것이 없을 경우 회원 정보를 등록합니다.
    $query2 = "INSERT INTO member_info (member_id, member_pw, member_name) VALUES ('$id', '$pwd', '$name')";
    //받아 온 정보를 db에 등록합니다.
    $result = mysqli_query($conn, $query2);
    if(!$result){
      echo "<script>alert('회원가입을 하는 과정에서 오류가 발생했습니다.');</script>";
      return;
    }
    echo "<script> alert('회원가입 성공! 환영합니다 :D
    다시 로그인 해주세요 ^^ '); </script>";
    echo "<script>location.href='./index.html'</script>";
  }
  else{
    echo "<script> alert('중복된 아이디입니다. 중복 검사를 해주세요.'); </script>";
    echo "<script> window.history.back(); </script>";
  }
  mysqli_close($conn);
?>
