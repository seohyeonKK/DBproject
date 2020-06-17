<?
  include './dbconn.php';

  // user_id와 user_password를 받아옵니다.
  $id = $_GET['user_id'];

  // 같은 id가 있는지 중복을 체크합니다.
  $query = "SELECT * FROM member_info WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);

  if ( ($id=='') ){ // id,pw 공백일 시
    printf("아이디 또는 패스워드를 입력하여 주세요.");
    return;
  }
  // 데이터 받아온 것을 넘깁니다.
  // 중복된 것이 없으면 if(!0) 하여 if문의 조건을 만족하게 됩니다.
  if($num)
  {
    printf("이미 존재하는 아이디입니다!");
    // echo "<script> alert('중복아님다'); </script>";
    // echo "<script> window.history.back(); </script>";
    //location.href='./main.php'</script>";
  }
  else
  {
    printf("사용 가능한 아이디입니다 :)");
    // echo "<script> alert('중복임다'); </script>";
    // echo "<script> window.history.back(); </script>";
    //location.href='./login_form.php'</script>";
  }


?>
