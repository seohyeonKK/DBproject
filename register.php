<?php
  session_start();
  include './dbconn.php';
  include './user_information.php';
  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

 ?>

<html>
  <head>
    <title>사기 사건 등록</title>
    <link rel="stylesheet" href="common.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

    <script>

    function checkInput()
    {
      var regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi;

      if(document.register_info.account.value.trim() == "")
      {
        alert("사기꾼의 계좌를 입력하세요.");
        document.register_info.account.focus();
        return;
      }
      else if(document.register_info.item.value.trim() == "")
      {
        alert("사기당한 품목을 입력하세요.");
        document.register_info.item.focus();
        return;
      }
      else if(document.register_info.price.value.trim() == "")
      {
        alert("사기당한 금액을 입력하세요.");
        document.register_info.price.focus();
        return;
      }
      else if(document.register_info.site_id.value.trim() == "")
      {
        alert("사기꾼의 아이디를 입력하세요.");
        document.register_info.site_id.focus();
        return;
      }
      else if(document.register_info.site.value.trim() == "")
      {
        alert("사기당한 사이트를 입력하세요.");
        document.register_info.site.focus();
        return;
      }
      else if(isNaN(account_int))
      {
        alert("계좌 번호는 숫자만 입력해주세요.");
        document.register_info.account.focus();
        return;
      }
      else if(regExp.test(document.register_info.item.value))
      {
        alert("특수문자를 제외하고 입력해주세요.");
        document.register_info.item.focus();
        return;
      }
      else if(isNaN(price_int))
      {
        alert("금액은 숫자만 입력해주세요.");
        document.register_info.price.focus();
        return;
      }
      else if(regExp.test(document.register_info.site.value))
      {
        alert("사이트의 이름만을 입력해주세요");
        document.register_info.price.focus();
        return;
      }
      document.register_info.account.value = account_int;
      document.register_info.price.value = price_int;
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
          <td id = "table_title">
          <b>사건 정보 등록</b></td>
        </tr>

        <tr>
          <td bgcolor=white>&nbsp;
            <table id ="acc_table" align=center>
              <tr>
                <td id = "acc_information">등록자</td>
                <td id = "acc_input">&nbsp;&nbsp;<input type=text value="<?=$_SESSION['id']?>" name="name" size=25 maxlength=10 readonly></td>
              </tr>
              <tr>
                <td id = "acc_information">계좌</td>
                <td id = "acc_information"><input type=text name="account" size=25 maxlength=20 >
              </tr>
              <tr>
                <td id = "acc_information">품목</td>
                <td id = "acc_information"><input type=text name="item" size=25 maxlength=20 ></td>
              </tr>
              <tr>
                <td id = "acc_information">가격</td>
                <td id = "acc_information"><input type=text name="price" size=25 maxlength=10 ></td>
              </tr>
              <tr>
                <td id = "acc_information">사기꾼 아이디</td>
                <td id = "acc_information" ><input type=text name="site_id" size=25 maxlength=15></td>
              </tr>
              <tr>
                <td id = "acc_information" >사기당한 사이트</td>
                <td id = "acc_information"><input type=text name="site" size=25 maxlength=15></td>
              </tr>
            </table>
            <center><br>
            <input type="button" id="btn_ok" value="등록" name="acc_submit" onclick="checkInput()">
             <br><br>
            <input type="reset"  id="btn_delete"value="리셋" name="reset">
             <br><br>
            <input type="button" id="btn_ok" value="뒤로가기" name="back" onclick="history.back()">
            <br></br></center>
        </tr>

      </table>
    </form>

  </body>
</html>
