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
