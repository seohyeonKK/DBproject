<!--
마이페이지에서 '회원 이름 변경'버튼 클릭 시, 이름 변경을 위해 실행되는 파일입니다.
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

  <script>

  //'변경'버튼을 눌렀을 때, 실행되는 함수입니다.
  function checkInput()
  {
    var name = document.change_user_name.user_name.value;

    var regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi;

    // 아무것도 입력이 안 된 경우, 변경할 이름을 입력하라고 경고창을 생성합니다.
    if(name.trim() == "")
    {
      alert("변경할 이름을 입력하세요.");
      document.change_user_name.user_name.focus();
      return;
    }
    // 회원 이름에 특수문자가 들어간 경우 특수문자를 제외하라고 경고창을 생성합니다.
    else if(regExp.test(document.change_user_name.user_name.value))
    {
      alert("이름을 입력할 때는 특수문자를 제외해주세요.");
      document.join_form.user_name.focus();
      return;
    }
    // 변경할 이름이 공백이 아니고, 특수문자가 포함되어있지 않으면 change_name.php파일을 실행합니다.
    else
    {
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
