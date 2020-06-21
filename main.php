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
      <h1 id="page_title"> 메인페이지 </h1>
      <br>
    </center>
  </head>
  <body>
    <center>
      <input type='button' value='등록' id="btn_mainpage" onClick="location.href='register.php'";>
      &nbsp; &nbsp;&nbsp; &nbsp;
      <input type='button' value='조회' id="btn_mainpage" onClick="location.href='find.php'";>
      &nbsp; &nbsp;&nbsp; &nbsp;
      <input type='button' value='삭제' id="btn_mainpage" onClick="location.href='delete.php'";>
    </center>
  </body>
</html>
