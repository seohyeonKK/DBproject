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

  // $query = "SELECT * FROM cheater_info WHERE account='$account'";
  // $result = mysqli_query($conn, $query);
  // $row = mysqli_fetch_array($result);
  // $cheater_code = $row["cheater_code"];
  //
  // if ($row) {
  //   echo"
  //     <tr>
  //       <td><a href='content.php?id=$row[cheater_code]'>$row[cheater_code]</a></td>
  //       <td>$row[account]</td>
  //     </tr>";
  // }
  // mysqli_close($conn);

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
           <font color=white><b>사기 이력 조회</b></font></td></tr>
         <tr>
           <td bgcolor=white>&nbsp;
            <table align=center>
                <tr>
                 <td width=160 aligh=left>조회할 계좌</td>
                 <td align=left><input type=text name="account" size=25 maxlength=20 >
                </tr>
            </table>
            <table align=center>
              <tr>
                <td>
                  <br>
                  <center>
                   <input type="button" value="검색" name="search_submit" onclick="searchAccount()"> &nbsp;&nbsp;
                   <input type="button" value="메인페이지" name="back" onclick="location.href='main.php'">
                   </center>
                   <br>
                 </td>
               </tr>
             </table>
         </tr>
       </table>
     </form>

   </body>
 </html>

 <?
 //session_start();
 //include './dbconn.php';

 $account = $_POST['account'];

 $query = "SELECT * FROM cheater_info WHERE account='$account'";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_array($result);
 $cheater_code = $row["cheater_code"];

 if ($row) {
   echo"
     <tr>
       <td><a href='content.php?id=$row[cheater_code]'>$row[cheater_code]</a></td>
       <td>$row[account]</td>
     </tr>";
 }
 else{
   echo"<td> <p> 등록된 계좌가 없습니다.</p></td>";
 }
 mysqli_close($conn);

?>
