<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>JavaScript Tutorial</title>
  </head>
  <body>
    <div class="intro">
          <h1>Base Javascript Tutorial</h1>
    </div>

    <div id="magicBox">

      <h1>Login</h1>
      <form class="sign-in" method="get"><br>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="text" name="fav_color" placeholder="Favorite Color"><br>
        <textarea name="bio" placeholder="Enter info here"></textarea><br><br>
        <button type="submit" name="UpdateInfo" id="submitButton">Update Info</button>
      </form>
      <div class="displayInfo">
        <ul>
          <li><strong>Name: </strong></li>
          <li><strong>Favorite Color: </strong></li>
          <li><strong>Bio: </strong></li>
        </ul>
      </div>

    </div>



  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(function(){
      $('sign-in').submit(function(){

        var form_data = $('sign-in').serialize();

        $.ajax({
            method: 'get',
            url: 'process.php',
            data: form_data,

            success: function(){
              alert("Form sent success");
            }
        });
        return false;
      });
  })


  </script>

  <style media="screen">
    body{
      background-color: #23495B;
      font-family: Nunito;
    }
    .intro{
      text-align: center;
      margin-top: 5%;
      color: white;
    }
    h1{

      font-size: 22px;
      -webkit-transition: 1s all;
    }

    #magicBox{
      text-align: center;
      padding: 0%;
      box-sizing: border-box;
      color: #DAE1E8;
      box-shadow:-10px 10px 30px 5px #1B3A48;
      background-color: #7B919C;
      margin: auto;
      border: solid 4px #606764;
      border-radius: 40px;
      max-width:90%;
      width:700px;
      min-height: 300px;
      -webkit-transition: 1s all;
    }
    ul{
      text-align: left;
      margin-left: 10px;
      padding-left: 25px;
    }
    ul,li {
      list-style-type: none;
      list-style-position:inside;
      margin:10px;
      margin-left: 35px;
      padding:0;
    }

    input, textarea{
      margin-top: 8px;
      color: MIDNIGHTBLUE;
      border-radius: 5px;
      background: none;
      padding: 2px;
      border: none;
      border-bottom: solid 1px grey;
      -webkit-transition: .4s all;
      width: 150px;
    }
    ::placeholder{
      color:LIGHTCYAN;
    }

    input:focus{
      background: LIGHTSKYBLUE;
    }
    textarea{
      border:solid 1px grey;
      width:500px;
      height:50px;
    }

    /* #magicBox:hover{
      cursor: pointer;
      transition-timing-function: linear;
      transform: scale(1.01);
      -webkit-transition: .4s all;
    }
    #magicBox:active{
      box-shadow:-10px 10px 30px 5px grey;
    } */

  </style>
</html>
