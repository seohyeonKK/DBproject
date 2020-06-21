<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();

    $id = $_SESSION['id'];
    $pwd = $_SESSION['pwd'];
    $name = $_SESSION['name'];

  ?>
  <meta charset="UTF-8">

  <script>
    function changePassword()
    {
        window.open("password.php", "changePassword", "width=400, height=200, menubar=no, toolbar=no");
    }
    function changeName()
    {
        window.open("name.php", "changeName", "width=400, height=200, menubar=no, toolbar=no");
    }
  </script>
  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

  <title>마이페이지</title>
</head>

<body>
  <div id="loginer">
    <div id="form" align=center>
      <fieldset>
        <legend> 회원정보 </legend>
          <h1>'<? echo"$name";?>(<? echo"$id";?>)'님의 정보입니다.</h1>
          <table id='info_table'>
            <tr>
              <th id = 'td_name_id' width =150>회원 이름 :</th>
              <th id = 'td_info'> <? echo"$name";?> </th>
             </tr>
             <tr>
              <th id = 'td_name_id' width=70> 아이디 &nbsp;  : </th>
              <th id = 'td_info'><? echo"$id";?> </th>
            </tr>
          </table>
          <br><br>
          <input type="button" id="btn_pwd_update" name="change_password" value="비밀번호 변경" onclick="changePassword()">
          <input type="button" id="btn_name_update" name="change_name" value="회원 이름 변경" onclick="changeName()">
          <br><br><br>
          <a href='main.php'><input id="btn_ok" type='button' value='메인페이지' name='back'></a>
          <br><br>
          <a href='logout.php'><input id="btn_delete" type='button' value='로그아웃'></a>
          <br><br>
      </fieldset>
    </div>
  </div>
</body>
</html>
