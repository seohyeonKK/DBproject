<!DOCTYPE html>

<html>
<head>
<script>


// function checkform() {
//   if (!document.login_form.user_id.value) {
//     alert('아이디가 입력되지 않았습니다. ');
//     document.login_form.user_id.focus();
//     return;
//   }
//   else if (!document.login_form.user_password.value) {
//     alert('비밀번호가 입력되지 않았습니다. ');
//     document.login_form.user_password.focus();
//     return;
//   }

function check(){
  if(!document.join_form.user_id.value)
  {
    alert("아이디를 입력하세요.");
    document.join_form.user_id.focus();
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
    아이디: <input type="text" name="user_id" id="id">
    <input type="button" name="checkid" value="중복체크" onclick="id_Check()"><br>
    비밀번호: <input type="password" name="user_password" id="password" ><br>
    비밀번호 확인: <input type="password" name="repw" id="password_Check" onkeyup="pw_Check()">
    <td id="pwchecktext" width=100></td>
    <td><input type="button" value="회원가입" onclick="check()"></td>
  </table>
</form>
</tr>
</body>
</html>