<?php
session_start();
include './dbconn.php';

  $account = $_POST['account'];

  echo"<br>";
  echo "<div style=\"text-align:right\">";
  echo $_SESSION['id']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
  //echo"<br><br>";
  echo "&nbsp; <a href='mypage.php'><input type='button' value='마이페이지'></a>"; // 마이페이지로 이동
  echo "&nbsp; <a href='logout.php'><input type='button' value='로그아웃'></a> &nbsp;&nbsp;";

  echo"<br><br>";


 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <title>사기 이력 조회</title>

     <script>
      function searchAccount(){
        if(!document.find_form.account.value)
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
           <td height=20 align=center bgcolor="#999999">
             <font color=white><b>사기 이력 조회</b></font>
           </td>
         </tr>
         <tr>
           <td bgcolor=white >&nbsp;
            <table align=center>
              <tr>
                <td width=160 aligh=left>조회할 계좌</td>
                <td align=left><input type=text name="account" size=25 maxlength=20 ></td>
              </tr>
            </table>
            <table align=center>
              <tr>
                <td>
                  <br><center>
                    <input type="button" value="검색" name="search_submit" onclick="searchAccount()"> &nbsp;&nbsp;
                    <input type="button" value="메인페이지" name="back" onclick="location.href='main.php'">
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
 //include './dbconn.php';
 $account = $_POST['account'];

 $query = "SELECT * FROM cheater_info WHERE account='$account'";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_array($result);
 $cheater_code = $row["cheater_code"];

 $string = "계좌를 입력해주세요.";

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
   //cho"<td> <p> 등록된 계좌가 없습니다.</p></td>";
   echo $string;
 }
 mysqli_close($conn);

?>


 </html>
