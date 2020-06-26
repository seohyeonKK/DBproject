<html>
<head>
  <?php
    session_start();
    if(!isset($_SESSION['id']))
    {
      echo "
      <script>
      alert('로그인 후 이용하세요.');
      location.href='index.html';
      </script>
      ";
    }
    $id = $_SESSION['id'];
    $pwd = $_SESSION['pwd'];
    $s_name = $_SESSION['name'];
    $name = $_POST['user_name'];
  ?>
  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

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

  <div id="loginer">
    <div id="form" align=center>
      <fieldset>
        <legend> MyPage </legend>
          <h1 id='page_title'> '<? echo"$s_name";?>'의 개인 정보</h1>
          <p id='page_sub_title'> 회원 정보를 조회하려면 비밀번호를 입력해주세요. </p>
          <form name = "check">
            <label id='user_id_pwd_label'>비밀번호</labe> &nbsp; <input type="password" name="password_check" maxlength="15"> &nbsp;&nbsp;
            <input type="button" value="확인" id='btn_search' onclick="checkPassword()">
          </form>

          <br><br><br>
          <a href='logout.php'><input type='button' id='btn_delete' value='로그아웃 '></a>
          <br><br>
          <a href='main.php'><input type='button' id='btn_ok' value='메인페이지' name='back'></a>
          <br><br>
      </fieldset>
    </div>
  </div>
</body>
</html>
