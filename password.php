<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();

    $id = $_SESSION['id'];
    $pwd = $_SESSION['pwd'];
    //$name = $_POST['user_name'];

  ?>
  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

  <script>

  function checkInput()
  {
    var password = document.change_user_password.user_password;
    var check_the_password = document.change_user_password.repw;

    if(password.value.trim() == "")
    {
      alert("변경할 비밀번호를 입력하세요.");
      pssword.focus();
      return;
    }
    else if(check_the_password.value.trim() == "")
    {
      alert("비밀번호를 확인하세요.");
      password.focus();
      return;
    }
    else if(password.value != check_the_password.value)
    {
      alert("비밀번호가 같지 않습니다.");
      check_the_password.focus();
      return;
    }
    else
    {
      document.change_user_password.submit();
    }
  }

  function pw_Check(){
    var pw_password = document.getElementById("new_password").value;
    var pw_passwordCheck = document.getElementById("password_Check").value;

    if(pw_password != pw_passwordCheck){
      document.getElementById("pwchecktext").innerHTML = "<b> ✘ </b>";
      document.getElementById("pwchecktext").style.color = 'red';
    }
    else{
      document.getElementById("pwchecktext").innerHTML = "<b> ✔ </b>";
      document.getElementById("pwchecktext").style.color = 'green';
    }
  }

  </script>
  <title>비밀번호 변경</title>
</head>

<body align=center>
  <br>
  <center>
  <form name = "change_user_password" action="change_password.php" method="post">
    <table>
      <tr>
        <td><label>비밀번호: </label></td>
        <td><input type="password" name="user_password" id="new_password" maxlength="15"><br></td>
      </tr>
      <tr>
        <td><label>비밀번호 확인:</td>
        <td></label><input type="password" name="repw" id="password_Check" onkeyup="pw_Check()" maxlength="15"></td>
        <td align ="left" value= " " id="pwchecktext"></td>
      </tr><br>
    </table>
    <br><br>
    <input type="button" id="btn_ok" value="변경" onClick="checkInput()"></td>
  </form>
  </center>
</body>
</html>
