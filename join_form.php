<!--
로그인 창에서 회원가입 버튼을 누르면 실행되는 창을 위한 파일입니다.
회원가입을 위한 아이디,비밀번호,이름을 입력받아 정확히 입력받은지 확인 후 입력받은 데이터를 join.php파일로 전달해 회원가입을 진행합니다.
 -->

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

  <script>
  function check(){
    var password = document.getElementById("password").value;
    var passwordCheck = document.getElementById("password_Check").value;

    // 아이디와 이름 입력 시, 아래에 지정한 특수문자의 입력을 막기 위한 정규식입니다.
    // g : 문자열 전체 확인, i : 문자열에서 대소문자 구분 안함.
    var regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi;

    // id,password,name 입력 시, 입력받은 문자열의 앞과 뒤 공백을 제거하고 입력받은 데이터들이 공백이 아닌지 확인합니다.
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
    // 입력받은 아이디,이름에 특수문자가 없는지 확인.
    else if(regExp.test(document.join_form.user_id.value))
    {
      alert("아이디를 입력할 때는 특수문자를 제외해주세요.");
      document.join_form.user_id.focus();
      return;
    }
    else if(regExp.test(document.join_form.user_name.value))
    {
      alert("이름을 입력할 때는 특수문자를 제외해주세요.");
      document.join_form.user_name.focus();
      return;
    }
    // 입력한 비밀번호와 비밀번호 확인을 위해 한 번 더 입력한 비밀번호가 맞는지 확인합니다.
    else if(password != passwordCheck)
    {
      alert("비밀번호가 같지 않습니다.");
      document.join_form.repw.focus();
      return;
    }

    // 아이디,비밀번호,이름을 모두 조건에 따라 잘 입력한 경우, join_form의 데이터가 join.php파일에 전달되어
    // join.php파일에서 해당 db의 member_info 테이블에 입력받은 data(id,password,name)를 추가해줍니다.
    document.join_form.submit();
  }

  // 입력받은 id가 db의 member_info 테이블의 id 컬럼에 존재하는 값인지 확인해 id의 사용가능 여부를 확인 할 수 있습니다.
  function id_Check()
  {
    var userid = document.all.user_id.value;
    var regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi;
    if(regExp.test(document.join_form.user_id.value))
    {
      alert("아이디를 입력할 때는 특수문자를 제외해주세요.");
      document.join_form.user_id.focus();
      return;
    }

    // 새로운 window창에서 checkid.php파일을 여는 것으로 url은 새 창에 보여질 주소.
    // 입력받은 user_id의 값이 저장된 userid 변수의 값을 get방식으로 임의로 넘겨줍니다.
    // id의 값은 비밀스러운 값이 아니므로 간단하게 get방식으로 넘겨줍니다.
    url = "checkid.php?user_id="+userid;
    window.open(url, "chkid", "width=400, height=200, menubar=no, toolbar=no");
  }

  // 비밀번호와 비밀번호 확인 입력 시, 두 개 다 정확하게 같은 비밀번호로 입력했는지 한 눈에 확인할 수 있게 해주는 함입니다.
  // 비밀번호 두 개가 정확하게 같게 입력될 경우 초록색 체크 특수문자가 보이고, 다르게 입력될 경우 빨간 엑스 특수문자가 보여줍니다.
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

<body>
  <br>
  <div id="loginer">
    <div id="form">
      <fieldset>
        <legend id="page_title">&nbsp;회원 가입&nbsp;</legend>
          <!--
          회원가입시 입력받은 아이디,이름,비밀번호의 정보를 빠짐없이 입력받고, 조건에따라 잘 입력받은 경우
          db의 member_info에 저장해주는 join.php파일에 POST방식으로 전달합니다.
          비밀번호가 포함되어 있으므로 정보를 보호해야 하므로 POST 방식으로 전달합니다.
          -->
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
