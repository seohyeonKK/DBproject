<?
  include './dbconn.php';

  // user_id와 user_password를 받아옵니다.
  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  // 같은 id가 있는지 중복을 체크합니다.
  $query = "SELECT * FROM member_info WHERE member_id = '$id'";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);

  // 데이터 받아온 것을 넘깁니다.
  // 중복된 것이 없으면 if(!0) 하여 if문의 조건을 만족하게 됩니다.
  if(!$num)
  {
    $query2 = "INSERT INTO member_info (member_id, member_pw) VALUES ('$id', '$pwd')";
    //$query3 = "INSERT INTO member_info(member_pw) VALUES ('$password')";
    mysqli_query($conn, $query2);
    //mysqli_query($conn, $query3);
    echo "<script> alert('Welcome!'); </script>";
    //location.href='./main.php'</script>";
  }
  else
  {

    // <script>
    //   alert('Duplicated Id');
    //   location.href = './index.html';
    // </script>
    echo "<script> alert('Duplicated Id'); </script>";
    //location.href='./login_form.php'</script>";
  }


?>
