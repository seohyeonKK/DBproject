<?php
  session_start();
  include './user_information.php';
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>사기 이력 조회</title>
     <link rel="stylesheet" href="common.css" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

     <script>
      function searchAccount(){
        if(document.find_form.account.value.trim() == "")
        {
          alert('계좌를 입력하세요.');
          document.find_form.account.focus();
          return;
        }
        document.find_form.submit();
      }
     </script>
   </head>

   <body topmargin=0 leftmargin=0 text="#464646">
     <center>
     <br>
     <form name="find_form" action="find.php" method="post">
       <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor="#777777" >
         <tr>
           <td id = "table_title">
            <b>사기 이력 조회</b>
           </td>
         </tr>
         <tr>
           <td bgcolor=white >&nbsp;
            <table align=center>
              <tr>
                <td id = "acc_information">조회할 계좌</td>
                <td id = "acc_information"><input type=text name="account" size=25 maxlength=20 placeholder='계좌를 입력하세요'></td>
                <td ><input type="button" id="btn_search" value="검색" name="search_submit" onclick="searchAccount()"></td>
              </tr>
            </table>
            <table align=center>
              <tr>
                <td>
                  <br><input type="button" id="btn_ok" value="메인페이지" name="back" onclick="location.href='main.php'">
                  <br><br>
                </td>
              </tr>
            </table>
          </td>
         </tr>
       </table>
     </form>

   </body>

<div id="find_css">
  <?
   session_start();
   include './dbconn.php';
   if(!isset($_SESSION['id']))
   {
     echo "
     <script>
     alert('로그인 후 이용하세요.');
     location.href='index.html';
     </script>
     ";
   }
   $account = $_POST['account'];
   $string = "계좌를 입력해주세요.";

   $query = "SELECT * FROM account_info WHERE account='$account'";
   $result = mysqli_query($conn, $query);
   if(!$result)
   {
     echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
     return;
   }
   $row = mysqli_fetch_array($result);


   if($account)
   {
     echo "'$account' 를 조회한 결과입니다.<br><br>";
   }

   if ($row)
   {
      $string = "해당 계좌의 사기 이력이 있습니다.";
      echo $string;
      echo "<br><br>";
      echo "<a id='find_link_css' href='find_list.php?account=$account'> ➙ 사기 내역 조회 하러가기</a>";
   }
   else
   {
     if(!$account)
     {
       $string = "계좌를 입력해주세요.";
     }
     else
     {
       $string = "등록된 계좌가 없습니다.";
     }
     echo $string;
   }
   mysqli_close($conn);

  ?>
</div>

 </html>
