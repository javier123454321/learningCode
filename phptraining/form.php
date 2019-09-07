<?php
$sqlservername = "localhost";
$sqlusername = "root";
require_once("sqlpassword.php");
$sqlbdname = "form_db";

$conn = new mysqli($sqlservername, $sqlusername, $sqlpassword, $sqlbdname);

if($conn->connect_error){
  die("Connection failed" . $conn->connect_error);
}


if (isset($_POST["username"])){
  $uname = $_POST["username"];
} else {
  $uname = "";
}
if (isset($_POST[["email"])){
  $email = $_POST[["email"];
} else {
  $email = "";
}
if (isset($_POST[["password"])){
  $pword = $_POST[["password"];
} else {
  $pword = "";
}
$uid = uniqid();

$sqlinsert = $conn->prepare("insert into user_info(uid, uname, email, pword) values(?, ?, ?, ?)");
$sqlinsert-> bind_param("ssss", $uid, $uname, $email, $pword);
$sqlinsert->execute();
$sqlinsert->close();
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      echo "Hello World <br>";
      echo "<br><br>"
    ?>
    <form method="post" >
      <input type="text" name="username" placeholder="Username"/><br>
      <input type="email" name="email" placeholder="email"/><br>
      <input type="password" name="password" placeholder="password"/><br>
      <input type="submit"/>
    </form>
    </div>
    <div class="">
      <?php
      echo $uname
       ?>
    </div>
  </body>
  <style media="screen">
    body{
      text-align: center;
      margin: auto;
      margin-top: 200px;
    }
  </style>
</html>
