<?php
session_start();
include './dbconn.php';

//if (!isset($_POST['user_id']) || !isset($_POST['password'])) exit; //머드라

$id = $_POST['user_id'];
$pwd = $_POST['user_password'];

if ( ($id=='') || ($pwd=='') ){ // id,pw 공백일 시
  echo "<script>alert('아이디 또는 패스워드를 입력하여 주세요.'); history.back();</script>";
}


$query = "SELECT * FROM member_info WHERE member_id='$id' AND member_pw ='$pwd'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

if ($id =$row['member_id'] && $pwd == $row['member_pw']){
  $_SESSION['id'] = $row['member_id'];
<<<<<<< HEAD
  echo "<script>window.alert('login 완료');</script>";
=======
  echo "<script>window.alert('로그인 완료');</script>";
>>>>>>> a406d0a2cfa1f0798404e86f9e0763f72dabdb2d
  //echo"<center><br><br><br>";
  //echo $_SESSION['id']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
  echo "&nbsp; <a href='logout.php'><input type='button' value='Logout'></a>";
  echo "<script>location.href='mypage.php';</script>";

  //
}
else{
<<<<<<< HEAD
  echo "<script>window.alert('login 실패'); </script>";
=======
  echo "<script>window.alert('로그인 실패'); </script>";
>>>>>>> a406d0a2cfa1f0798404e86f9e0763f72dabdb2d
  echo "<script>location.href='login.php';</script>";
  //echo "<script>location.href='login.php';</script>";
}
 ?>
