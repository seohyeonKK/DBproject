<?
  include './dbconn.php';

  // user_id와 user_password를 받아옵니다.
  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  // 같은 id가 있는지 중복을 체크합니다.
  $query = "SELECT * FROM member_info WHERE id = '$member_id'";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);

  // 데이터 받아온 것을 넘깁니다.
  // 중복된 것이 없으면 if(!0) 하여 if문의 조건을 만족하게 됩니다.
  if(!$num)
  {
    $query2 = "INSERT INTO member_info VALUES ('$id', '$pwd')";
    mysqli_query($conn, $query2);
    echo "<script> alert('Welcome!'); location.href='./index.html'</script>";
  }
  else
  {
    // <script>
    //   alert('Duplicated Id');
    //   location.href = './index.html';
    // </script>
    echo "<script> alert('Duplicated Id'); location.href='./index.html'</script>";
  }


?>
