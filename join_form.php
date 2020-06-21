<!DOCTYPE html>

<html>
<head>
  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">


  <script>
  function check(){
    var password = document.getElementById("password").value;
    var passwordCheck = document.getElementById("password_Check").value;
    if(document.join_form.user_id.value.trim() == "")
    {
      alert("아이디를 입력하세요.");
      document.join_form.user_id.focus();
      return;
    }
    else if(document.join_form.user_name.value.trim() == "")
    {
      alert("이름을 입력하세요.");
      document.join_form.user_name.focus();
      return;
    }
    else if(document.join_form.user_password.value.trim() == "")
    {
      alert("비밀번호를 입력하세요.");
      document.join_form.user_password.focus();
      return;
    }
    else if(document.join_form.repw.value.trim() == "")
    {
      alert("비밀번호를 확인하세요.");
      document.join_form.user_password.focus();
      return;
    }
    else if(password != passwordCheck){
      alert("비밀번호가 같지 않습니다.");
      document.join_form.repw.focus();
      return;
    }
    document.join_form.submit();
  }

  function id_Check()
  {
    var userid = document.all.user_id.value;
    url = "checkid.php?user_id="+userid;
    window.open(url, "chkid", "width=400, height=200, menubar=no, toolbar=no");
  }

  function pw_Check(){
    var password = document.getElementById("password").value;
    var passwordCheck = document.getElementById("password_Check").value;

    if(passwordCheck == ""){
      document.getElementById("pwchecktext").innerHTML = "";
    }
    else if(password != passwordCheck){
      document.getElementById("pwchecktext").innerHTML = "<b>&nbsp;&nbsp;&nbsp;✘</b>";
      document.getElementById("pwchecktext").style.color = 'red';
    }
    else{
      document.getElementById("pwchecktext").innerHTML = "<b>&nbsp;&nbsp;&nbsp;✔</b>";
      document.getElementById("pwchecktext").style.color = 'green';
    }
  }
</script>
</head>


<body align="center">
  <br>
  <div id="loginer">
    <div id="form">
      <fieldset>
        <legend id="page_title">&nbsp;회원 가입&nbsp;</legend>
          <form name = "join_form" action = "./join.php" method = "POST">
            <table align="center">
              <tr align="right">
                <td> 아이디 &nbsp;</td>
                <td> <input type="text" name="user_id" id="id" maxlength="15"></td>
                <td> &nbsp; <input type="button" id="btn_check" name="checkid" value="중복확인" onclick="id_Check()" ><br></td>
              </tr>
              <tr align="right">
                <td> 이름 &nbsp;</td>
                <td> <input type="text" name="user_name" id="name" maxlength="7" ><br></td>
              </tr>
              <tr align="right">
                <td>비밀번호 &nbsp;</td>
                <td><input type="password" name="user_password" id="password" maxlength="15"><br></td>
              </tr>
              <tr align="right">
                <td>비밀번호 확인 &nbsp;</td>
                <td><input type="password" name="repw" id="password_Check" onkeyup="pw_Check()" maxlength="15"></td>
                <td align="left" rowspan="1" id="pwchecktext"></td>
              </tr>
              <tr align="center">
                <td colspan="3" align=center><br><input type="button" id="btn_pwd_update" value="회원가입" onclick="check()"></td>
              </tr>
              <tr>
                <td colspan="3" align-center><br><input type="button" id="btn_name_update" value="뒤로가기" name="back" onclick="location.href='index.html'"></td>
              </tr>
              <br>
            </table>
          </form>
        </fieldset>
      </div>
    </div>
</body>
</html>
