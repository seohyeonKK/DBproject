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
if(!$result)
{
  echo "<script>alert('로그인을 하는 과정에서 오류가 발생했습니다.');</script>";
  return;
}
$row = mysqli_fetch_array($result);

if ($id =$row['member_id'] && $pwd == $row['member_pw'])
{
  $_SESSION['id'] = $row['member_id'];
  $_SESSION['pwd'] = $row['member_pw'];
  $_SESSION['name'] = $row['member_name'];

  echo "<script>window.alert('로그인 완료');</script>";
  //echo"<center><br><br><br>";
  //echo $_SESSION['id']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
  //echo "&nbsp; <a href='logout.php'><input type='button' value='Logout'></a>";
  echo "<script>location.href='main.php';</script>"; // 로그인 시 메인페이지로 이동하도록

  //
}
else{
  echo "<script>window.alert('로그인 실패'); </script>";
  echo "<script>location.href='index.html';</script>";
  //echo "<script>location.href='login.php';</script>";
}
mysqli_close($conn);
?>
