<?php
session_start();

  if($_SESSION['id']!=null)
  {
    session_destroy();
    echo "<script>window.alert('로그아웃 완료');</script>";
  }
echo "<script>location.href='index.html';</script>";
 ?>
