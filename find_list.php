<?php
  session_start();
  include './dbconn.php';

  $account = $_GET['account'];

  echo"<br><br><br>";
  //echo $_SESSION['account']."(".$_SESSION['account'].")의 사기 내역입니다.";
  echo $account;
  echo "의 사기 내역입니다.";
?>
