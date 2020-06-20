<html>
<head>
<?php
  session_start();
  include './dbconn.php';

  $id = $_SESSION['id'];
  $pwd = $_SESSION['pwd'];
  $name = $_POST['user_name'];

?>

  <script>
  function checkPassword()
  {
    var password = "<?echo $pwd;?>";
    var check_it = document.check.password_check.value;
    if(check_it == password)
    {
      location.href='./mypage_info.php'
    }
    else
    {
      alert("다시 입력해주세요.");
      location.href='./mypage.php'
    }
  }

  </script>


</head>
<body>

  <br>
  <center>
  <h1> 마이페이지 </h1>
  <br>
  <h5> 회원 정보를 조회하려면 비밀번호를 확인해주세요. </h5>
  <br>
  <form name = "check">
    비밀번호: <input type="password" name="password_check" maxlength="15"> &nbsp;&nbsp;
    <input type="button" value="확인" onclick="checkPassword()">
  </form>


  <br>
  <br><br>
  <a href='main.php'><input type='button' value='메인페이지' name='back'></a>
  &nbsp; <a href='logout.php'><input type='button' value='로그아웃'></a>

</body>
</html>
