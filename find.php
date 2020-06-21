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
                <td id = "acc_information"><input type=text name="account" size=25 maxlength=20 ></td>
              </tr>
            </table>
            <table align=center>
              <tr>
                <td>
                  <br><center>
                    <input type="button" id="btn_ok" value="검색" name="search_submit" onclick="searchAccount()"> &nbsp;&nbsp;
                    <br><br>
                    <input type="button" id="btn_ok" value="메인페이지" name="back" onclick="location.href='main.php'">
                  </center><br>
                </td>
              </tr>
            </table>
          </td>
         </tr>
       </table>
     </form>

   </body>
   <br>


<?
 //session_start();
 include './dbconn.php';
 $account = $_POST['account'];
 $string = "계좌를 입력해주세요.";

 $query = "SELECT * FROM cheater_info WHERE account='$account'";
 $result = mysqli_query($conn, $query);
 if(!$result)
 {
   echo "<script>alert('계좌를 조회하는 과정에서 오류가 발생했습니다.');</script>";
   return;
 }
 $row = mysqli_fetch_array($result);


 if($account)
 {
   echo $account;
   echo "를 조회한 결과입니다.<br><br>";
 }

 if ($row)
 {
    $string = "사기 이력이 있습니다.";
    echo $string;
    echo "<br><br>";
    echo "<a href='find_list.php?account=$account'>사기 내역 조회를 원하시면 클릭하세요.</a>";
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


 </html>
