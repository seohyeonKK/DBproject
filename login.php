<<<<<<< HEAD
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
=======
<?php
session_start();
if($_SESSION['user_id'] == null){ //로그인x
?>
>>>>>>> a406d0a2cfa1f0798404e86f9e0763f72dabdb2d

<center><br><br><br>
<form name="login_form" action="login_check.php" method="post">
  <label> 아이디: </label><input type="text" name = "user_id"><br>
  <label> 비밀번호 : </label><input type="password" name ="user_password">
  <br><br>
  <input type="submit" name= "login" value="로그인">
</form>
</center>

<?php
}else{
  echo"<center><br><br><br>";
  //echo $_SESSION['id']."(".$_SESSION['id']")님이 로그인 하였습니다.";
  echo "&nbsp; <a href='logout.php'><input type='button' value='Logout'></a>";
  echo "</center>";
}
 ?>
