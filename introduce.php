<?php
  session_start();
  //include './dbconn.php';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="common.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Brush+Script" rel="stylesheet">


  </head>
  <body align=center>
    <div id="introduce_page">
      <h1> Introduce </h1>
      <fieldset>
        <legend> 인영_서현_프로젝트 </legend>
        <h3> 이 사이트를 통해 사기꾼의 정보를 공유해 피해를 방지 할 수 있습니다.</h3>
        <p>
          회원가입을 한 후, 로그인을 하시면 사기꾼의 정보를 등록해서 다른 사람들에게 사기꾼 정보를 공유 할 수 있습니다.</br>
          거래를 할 때, 이 사람이 사기꾼인지 아닌지 해당 사이트에 등록되어있는지의 여부를 확인 해 안전한 거래를 할 수 있습니다.</br>
        </p>
      </fieldset>
      <br>
      <input type='button' value='로그인페이지' id="btn_mainpage" onClick="location.href='index.html'";>
    </div>
  </body>
</html>
