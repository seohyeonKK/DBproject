<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();

    $id = $_SESSION['id'];
    $pwd = $_SESSION['pwd'];
    //$name = $_POST['user_name'];

  ?>

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
  <form name = "change_user_name" action="change_name.php" method="post">
  변경할 이름: <input type="text" name="user_name" id="name" maxlength="7">
  <input type="button" value="변경" onClick="checkInput()"></td>
  </table>
</body>
</html>
