<?php

//Connect to SQLiteDatabase
$conn = mysqli_connect('localhost', 'root', '', 'users_test');
echo "<p>PHP File Here</p>";

if(isset($_GET['name'])){
  echo 'GET: Your name is '. $_GET['name'];
}

//On Post, the $name variable that was fed through the form gets updated to go into imap_the
//database that we created in PHPmyAdmin
if(isset($_POST['name'])){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  echo 'POST: Your name is '. $_POST['name'];

  $query = "INSERT INTO users(username) VALUES('$name')";

  if(mysqli_query($conn, $query)){
    echo 'User Added...';
  }else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}


 ?>
