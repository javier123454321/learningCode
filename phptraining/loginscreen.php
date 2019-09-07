<?php
$sqlservername = "localhost";
$sqlusername = "root";
require_once("sqlpassword.php");
$sqlbdname = "form_db";

$conn = new mysqli($sqlservername, $sqlusername, $sqlpassword, $sqlbdname);

if($conn->connect_error){
  die("Connection failed" . $conn->connect_error);
}

$uid_selection = $uname_selection = $email_selection = $pword_selection = "";

if (isset($_GET["username"])){
  $uname = $_GET["username"];
} else {
  $uname = "";
}



if (!empty($uname)) {

    //first prepare, theen execute, then store in php, bind to a variable, and fetch to select them, then close

    //begin by preparing the sql query and create a connection object
    //$sqlselect is a version of the $conn
   $sqlselect = $conn->prepare("SELECT * FROM user_info WHERE uname = ?");

   //the bind_param makes sure we only select the info in db only where username = the value in the GET form
   $sqlselect->bind_param("s", $uname);

   // after preparing, you must execute "->" represents the variable is going to be treated as an Sql
   $sqlselect->execute();

   $sqlselect->store_result();
   //bind collects the data and binds it to the variables id, uname, etc.
   $sqlselect->bind_result($uid_selection, $uname_selection, $email_selection, $pword_selection);

   $sqlselect->fetch();

   $sqlselect->close();

   $conn->close();
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="userInfo">

          Hello World <br>
          <br><br>

      <form method="get" >
        <input type="text" name="username" placeholder="Username"/><br>
        <input type="submit"/>
      </form>
      <br><br><br>
      <div class="list">

        <ul>
          <li><b>User ID: </b> <?php echo $uid_selection ?> </li>
          <li><b>Username: </b> <?php echo $uname_selection ?> </li>
          <li><b>Email: </b> <?php echo $email_selection ?> </li>
          <li><b>Password: </b> <?php echo $pword_selection ?> </li>
      </div class="list">

    </div>
  </body>


  <style media="screen">

    .userInfo{
      width:300px;
      text-align: center;
      margin: auto;
      margin-top: 200px;
    }
    .list{
      text-align: left;
    }

  </style>
</html>
