<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Forms</title>
</head>
<body>
<div class="form">
    <h1>Input User</h1>
    <form>
        <input type="text" placeholder="name" name="username" required> <br>
        <input type="email" placeholder="email" name="email" required/>
        <input class="submitButton" type="submit">
    </form>
</div>

<div class="output">
    <?php
    if(isset($_GET["username"]) || isset($_GET["email"])){
        echo print_r($_GET); 
    }else{
        echo "<h4>Submit something to show the output here</h4>";
    };

    if(isset($_GET["username"])){
        echo "<h4> User Name: ". $_GET["username"] ."</h4>";
    }; 
    if(isset($_GET["email"])){
        echo "<h4> E-Mail: ". $_GET["email"] ."</h4>";
    }
    ?>
</div>
</body>

<style media="screen">
body{
    font-family: nunito;
    background-color: slategrey;
}
.form, .output{
    width: 40%;
    margin: 40px auto;
}
.output{
    background-color: darkgrey;
    padding: 40px;
}
input{
    padding: 10px 20px;
    margin-bottom: 10px;
    width: 100%;
    border-radius: 15px;
    indent: none;
}
.submitButton{
    background-color: #aaa;
}
</style>
</html>