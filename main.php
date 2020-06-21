<?php
  session_start();
  include './user_information.php';

 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="common.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">

    <center>
      <h1 id="page_title"> 메뉴 </h1>
      <br>
    </center>
  </head>
  <body>
    <center>
      <table>
        <tr>
          <td rowspan="2"><input type='button' value='등록' id="btn_mainpage_insert" onClick="location.href='register.php'";>
          &nbsp; &nbsp;&nbsp; &nbsp;</td>
          <td><input type='button' value='계좌로 조회' id="btn_mainpage_find" onClick="location.href='find.php'";>
          &nbsp; &nbsp;&nbsp; &nbsp;</td>
          <td rowspan="2"><input type='button' value='삭제' id="btn_mainpage_delete" onClick="location.href='delete.php'";>
          </td>
        </tr>
        <tr>
          <td><input type='button' value='전체 조회' id="btn_mainpage_allfind" onClick="location.href='allfind.php'";></td>
        </tr>
      </table>
      <br><br><br><br><br><br>
      <input type="button" value="페이지 안내서" id="btn_ok" onclick="location.href='introduce.php'";>
      <br><br>
    </center>
  </body>
</html>
