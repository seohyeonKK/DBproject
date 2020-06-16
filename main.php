<center>
  <h2> User Info </h2>
  <p align = "center"><a href = ".login_form.php">login</a></p>
  <table width = "800" border="1">
    <tr>
      <td>아이디</td>
      <td>비밀번호</td>
    </tr>
    <?
    //login2 를 가지고 그 정보를 보여주고 싶음
      include './dbconn.php';

      //중복 체크
      $query = "SELECT * FROM login";
      $result = mysqli_query($conn, $query);

      while($row = mysqli_fetch_array($result))
      {
        echo "
          <tr>
            <td><a href='content.php?id=$row[id]''>$row[id]</a></td>
            <td>$row[pwd]</td>
          </tr>";
      }
      mysqli_close($conn);
?>
  </table>
</center>
</body>
<?
//login2 를 가지고 그 정보를 보여주고 싶음
