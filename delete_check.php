<?php
  session_start();
  include './dbconn.php';

  $num = count($_POST['checkbox']);

  for($i=0;$i<$num;$i++){
    echo $_POST['checkbox'][$i];
    if($i != $sum -1){
      echo ', ';
    }
  }


?>
