<!--
마이페이지에서 '비밀번호 변경'버튼 클릭 시, 비밀번호 변경을 위해 변경할 비밀번호를 입력 받습니다.
-->

<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    if(!isset($_SESSION['id'])){
      echo "
      <script>
      alert('로그인 후 이용하세요.');
      location.href='index.html';
      </script>
      ";
    }

    $id = $_SESSION['id'];
    $pwd = $_SESSION['pwd'];
  ?>

  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

  <title>비밀번호 변경</title>

  <script>

  function checkInput(){ //제대로 된 입력을 확인합니다.
    var password = document.change_user_password.user_password;
    var check_the_password = document.change_user_password.repw;

    if(password.value.trim() == ""){ //아무것도 입력이 안 된 경우, 비밀번호를 다시 입력 받습니다.
      alert("변경할 비밀번호를 입력하세요.");
      pssword.focus();
      return;
    }
    else if(check_the_password.value.trim() == ""){ //확인 비밀번호를 입력하지 않았을 경우 알려줍니다.
      alert("비밀번호를 확인하세요.");
      password.focus();
      return;
    }
    else if(password.value != check_the_password.value){
      // 변경할 비밀번호와 비밀번호 확인이 같지 않을 경우 다시 입력 받습니다.
      alert("비밀번호가 같지 않습니다.");
      check_the_password.focus();
      return;
    }
    else{// 제대로 된 입력을 받을 경우 change_password.php파일에서 비밀번호를 바꿔줍니다.
      document.change_user_password.submit();
    }
  }

  function pw_Check(){// 변경할 비밀번호와 비밀번호 확인 입력 시, 같은 비밀번호로 입력했는지 확인합니다.
    var pw_password = document.getElementById("new_password").value;
    var pw_passwordCheck = document.getElementById("password_Check").value;

    if(pw_password != pw_passwordCheck){ //다르게 입력될 경우 빨간 엑스를 표시합니다.
      document.getElementById("pwchecktext").innerHTML = "<b> ✘ </b>";
      document.getElementById("pwchecktext").style.color = 'red';
    }
    else{// 비밀번호 두 개가 같게 입력될 경우 초록색 체크를 표시합니다.
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
