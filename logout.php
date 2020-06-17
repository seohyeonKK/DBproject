<?php
session_start();

 if($_SESSION['id']!=null)
 {
  session_destroy();
  echo '<h1> 로그아웃 하였습니다. </h1>';
  echo "<script>window.alert('로그아웃 완료');</script>";
}
  echo '<h1> 로그인 상태가 아닙니다. </h1>';
echo "<script>location.href='index.html';</script>";
 ?>
