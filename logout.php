<!--
로그아웃 버튼을 누르면 실행되는 파일입니다.
session의 값을 파괴하여 현재 session된 데이터를 완전히 종료시켜줍니다.
-->

<?php
  session_start();

  if($_SESSION['id']!=null)
  {
    // 모든 session 변수의 등록 해지해줍니다.
    session_unset();
    // 세션 아이디의 삭제를 해줍니다.
    session_destroy();
    // 로그아웃이 성공적으로 이루어진 걸 알려주는 경고창을 생성해줍니다.
    echo "<script>window.alert('로그아웃 완료');</script>";
  }
  echo "<script>location.href='index.html';</script>";
 ?>
