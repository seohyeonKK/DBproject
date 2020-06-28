<!--
마이페이지에서 '회원 이름 변경'버튼 클릭 시, 이름 변경을 위해 변경할 이름을 입력 받습니다.
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

  <script>

  function checkInput(){ //제대로 된 입력을 확인합니다.
    var name = document.change_user_name.user_name.value;
    var regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi;

    if(name.trim() == ""){ // 아무것도 입력이 안 된 경우, 이름을 다시 입력 받습니다.
      alert("변경할 이름을 입력하세요.");
      document.change_user_name.user_name.focus();
      return;
    }
    else if(regExp.test(document.change_user_name.user_name.value)){
      // 회원 이름에 특수문자가 들어간 경우, 특수문자를 제외하라는 경고 출력 후 다시 입력 받습니다.
      alert("이름을 입력할 때는 특수문자를 제외해주세요.");
      document.join_form.user_name.focus();
      return;
    }
    else{ //제대로 된 입력을 받을 경우 change_name.php에서 이름을 바꿔줍니다.
      document.change_user_name.submit();
    }
  }
  </script>
  <title>이름 변경</title>

</head>

<body align=center>
  <br>
  <form name = "change_user_name" action="change_name.php" method="post">
  <label>변경할 이름:</label> <input type="text" name="user_name" id="name" maxlength="7">
  <br><br>
  <input type="button" id="btn_ok" value="변경" onClick="checkInput()"></td>
  </table>
</body>
</html>
