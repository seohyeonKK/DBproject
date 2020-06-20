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
    var name = document.change_user_name.user_name.value;
    if(name.trim() == "")
    {
      alert("변경할 이름을 입력하세요.");
      document.change_user_name.user_name.focus();
      return;
    }
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
