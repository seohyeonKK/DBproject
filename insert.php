<?php
session_start();
include './dbconn.php';

$id = $_POST['user_id'];
$pwd = $_POST['user_password'];

echo"<br>";
echo "<div style=\"text-align:right\">";
echo $_SESSION['id']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
//echo"<br><br>";
echo "&nbsp; <a href='mypage.php'><input type='button' value='MyPage'></a>"; // 마이페이지로 이동
echo "&nbsp; <a href='logout.php'><input type='button' value='Logout'></a>";

echo"<br><br>";

 ?>
