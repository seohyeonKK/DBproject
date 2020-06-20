<!DOCTYPE html>

<html>
<head>
<script>

function check(){
  var password = document.getElementById("password").value;
  var passwordCheck = document.getElementById("password_Check").value;
  if(!document.join_form.user_id.value)
  {
    alert("아이디를 입력하세요.");
    document.join_form.user_id.focus();
    return;
  }
  else if(!document.join_form.user_name.value)
  {
    alert("이름을 입력하세요.");
    document.join_form.user_name.focus();
    return;
  }
  else if(!document.join_form.user_password.value)
  {
    alert("비밀번호를 입력하세요.");
    document.join_form.user_password.focus();
    return;
  }
  else if(!document.join_form.repw.value)
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
  window.open(url, "chkid", "width=500, height=500, menubar=no, toolbar=no");
}

function pw_Check(){
  var password = document.getElementById("password").value;
  var passwordCheck = document.getElementById("password_Check").value;

  if(passwordCheck == ""){
    document.getElementById("pwchecktext").innerHTML = "";
  }
  else if(password != passwordCheck){
    document.getElementById("pwchecktext").innerHTML = "<b> pwd not same </b>";
  }
  else{
    document.getElementById("pwchecktext").innerHTML = "<b> pwd OK </b>";
  }
}

</script>
</head>
<body>
<h2 align="center">회원 가입 화면</h2>
<form name = "join_form" action = "./join.php" method = "POST">
  <table border="1" align="center" width=600>
    <tr><td height="130" align="center">
    아이디: <input type="text" name="user_id" id="id" maxlength="15">
    <input type="button" name="checkid" value="중복확인" onclick="id_Check()"><br>
    이름: <input type="text" name="user_name" id="name" maxlength="7"><br>
    비밀번호: <input type="password" name="user_password" id="password" maxlength="15"><br>
    비밀번호 확인: <input type="password" name="repw" id="password_Check" onkeyup="pw_Check()" maxlength="15">
    <td id="pwchecktext" width=100></td>
    <td align=center><input type="button" value="회원가입" onclick="check()"></td>
  </table>
  <center>
  <br>
  <input type="button" value="뒤로가기" name="back" onclick="location.href='index.html'">
  </center>
</form>
</tr>
</body>
</html>
