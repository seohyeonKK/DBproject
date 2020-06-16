<?
  /* db_project에 연결합니다. */
  $host_name = "localhost";
  $db_user_id = "root";
  $db_pwd = "0000";
  $db_name = "db_project"
  $conn = mysqli_connect($host_name, $db_user_id, $db_pwd, $db_name);

  /* 연결을 체크합니다. */
  if($conn->connect_error)
  {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
  }

  //안녕하세요

?>
