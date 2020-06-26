<!--
매번 db와 연결되는 코드의 중복을 막기 위해 해당 db연결을 위한 파일을 따로 빼서
db연결이 필요 할 때에 해당 파일을 호출합니다.
-->

<?
     $host_name = "localhost";
     $db_user_id = "db_admin";
     $db_pwd = "0000";
     $db_name = "db_project";
     $conn = mysqli_connect($host_name, $db_user_id, $db_pwd, $db_name);

     /* check connection */
     if ($conn->connect_error)
     {
       printf("Connect failed: %s\n", $conn->connect_error);
       exit();
     }
?>
