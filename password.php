<!--
마이페이지에서 '비밀번호 변경'버튼 클릭 시, 비밀번호 변경을 위해 실행되는 파일입니다.
-->

<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();

    $id = $_SESSION['id'];
    $pwd = $_SESSION['pwd'];
  ?>

  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

  <title>비밀번호 변경</title>

  <script>
  //'변경'버튼을 눌렀을 때, 실행되는 함수입니다.
  function checkInput()
  {
    var password = document.change_user_password.user_password;
    var check_the_password = document.change_user_password.repw;

    // 비밀번호가 입력이 안 되어었을 때 입력하라고 경고창을 생성합니다.
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
    // 변경할 비밀번호와 변경할 비밀번호의 확인을 위해 입력한 값이 같지 않을 경우 다르다고 경고창을 생성합니다.
    else if(password.value != check_the_password.value)
    {
      alert("비밀번호가 같지 않습니다.");
      check_the_password.focus();
      return;
    }
    // 비밀번호가 공백이 아니고, 비밀번호와 비밀번호 확인이 동일하면 change_password.php파일을 실행합니다.
    else
    {
      document.change_user_password.submit();
    }
  }

  // 비밀번호와 비밀번호 확인 입력 시, 두 개 다 정확하게 같은 비밀번호로 입력했는지 한 눈에 확인할 수 있게 해주는 함입니다.
  // 비밀번호 두 개가 정확하게 같게 입력될 경우 초록색 체크 특수문자가 보이고, 다르게 입력될 경우 빨간 엑스 특수문자가 보여줍니다.
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
</head>

<body align=center>
  <br>
  <center>
  <!--
  비밀번호이므로 값을 보호해 줘야하므로 POST방식으로 change_password.php파일에 입력된 값을 전달해준다.
  -->
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
