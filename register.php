<?php
session_start();
include './dbconn.php';

$id = $_POST['user_id'];
$pwd = $_POST['user_password'];

echo"<br>";
echo "<div style=\"text-align:right\">";
echo $_SESSION['id']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
//echo"<br><br>";
echo "&nbsp; <a href='mypage.php'><input type='button' value='마이페이지'></a>"; // 마이페이지로 이동
echo "&nbsp; <a href='logout.php'><input type='button' value='로그아웃'></a> &nbsp;&nbsp;";

echo"<br><br>";

 ?>

<html>
  <head>
    <title>사기 사건 등록</title>

    <script>

    function checkInput(){
      if(!document.register_info.account.value)
      {
        alert("사기꾼의 계좌를 입력하세요.");
        document.register_info.account.focus();
        return;
      }
      else if(!document.register_info.item.value)
      {
        alert("사기당한 품목을 입력하세요.");
        document.register_info.item.focus();
        return;
      }
      else if(!document.register_info.price.value)
      {
        alert("사기당한 금액을 입력하세요.");
        document.register_info.price.focus();
        return;
      }
      else if(!document.register_info.site.value)
      {
        alert("사기당한 사이트를 입력하세요.");
        document.register_info.site.focus();
        return;
      }
      else if(!document.register_info.site_id.value)
      {
        alert("사기꾼의 아이디를 입력하세요.");
        document.register_info.site_id.focus();
        return;
      }
      document.register_info.submit();

    }

    </script>

  </head>
  <body topmargin=0 leftmargin=0 text="#464646">
    <center>
    <br>

    <form name="register_info" action="insert.php" method="post">
      <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor="#777777" >
        <tr>
          <td height=20 align=center bgcolor="#999999">
          <font color=white><b>사건 정보 등록</b></font></td>
        </tr>

        <tr>
          <td bgcolor=white>&nbsp;
            <table align=center>
              <tr>
                <td width=160 aligh=left>등록자</td>
                <td align=left><input type=text value="<?=$_SESSION['id']?>" name="name" size=25 maxlength=10 readonly></td>
              </tr>
              <tr>
                <td width=160 aligh=left>계좌</td>
                <td align=left><input type=text name="account" size=25 maxlength=20 >
              </tr>
              <tr>
                <td width=160 aligh=left>품목</td>
                <td align=left><input type=text name="item" size=25 maxlength=20 ></td>
              </tr>
              <tr>
                <td width=160 aligh=left>가격</td>
                <td align=left><input type=text name="price" size=25 maxlength=10 ></td>
              </tr>
              <tr>
                <td width=160 aligh=left>사기꾼 아이디</td>
                <td align=left><input type=text name="site_id" size=25 maxlength=15></td>
              </tr>
              <tr>
                <td width=160 aligh=left>사기당한 사이트</td>
                <td align=left><input type=text name="site" size=25 maxlength=15></td>
              </tr>

              <tr>
                <td></td>
                <td align=left>
                <br>
                <input type="button" value="등록" name="acc_submit" onclick="checkInput()">
                 &nbsp;
                <input type="reset" value="리셋" name="reset">
                 &nbsp;
                <input type="button" value="뒤로가기" name="back" onclick="history.back()">
                <br></br></td>
              </tr>
            </table>
        </tr>

      </table>
    </form>

  </body>
</html>
