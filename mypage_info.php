<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    include './dbconn.php';

    $id = $_SESSION['id'];
    $pwd = $_SESSION['pwd'];
    $name = $_SESSION['name'];

  ?>
  <meta charset="UTF-8">

  <script>
    function changePassword()
    {
        window.open("password.php", "changePassword", "width=500, height=500, menubar=no, toolbar=no");
    }
    function changeName()
    {
        window.open("name.php", "changeName", "width=500, height=500, menubar=no, toolbar=no");
    }

  </script>


  <title>마이페이지</title>
</head>

<body align=center>
  <h2>회원 정보</h2>

  <br><br>
  <center>
  <h1>'<? echo"$name";?>(<? echo"$id";?>)'님의 정보입니다.</h1>
  아이디: <? echo"$id";?><br>
  회원 이름: <? echo"$name";?>
  <br>
  <br><br>
  <input type="button" name="change_password" value="비밀번호 변경" onclick="changePassword()">
  <input type="button" name="change_name" value="회원 이름 변경" onclick="changeName()">
  <br><br>
  <a href='main.php'><input type='button' value='메인페이지' name='back'></a>
  &nbsp; <a href='logout.php'><input type='button' value='로그아웃'></a>


</body>
</html>
