<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JavaScript Tutorial</title>
  </head>
  <body>
    <div class="intro">
          <h1>Base Javascript Tutorial</h1>
    </div>

    <div id="magicBox">
      <h1>About John</h1>
    </div>

  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(function(){
    var human = {
      person: "Man",
      name: "John",
      age: "75",
      getInfo: function(){
        return this.name + ' is a ' + this.person + ' and is ' +this.age +' years old.';
      }
    }

      let magicBox = document.getElementById('magicBox');
      magicBox.addEventListener("click", function(){
        alert(human.getInfo())
      });
  });


  </script>

  <style media="screen">
    body{
      background-color: #23495B;
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
      padding: 4px;
      box-sizing: border-box;
      color: #DAE1E8;
      background-color: #7B919C;
      margin: auto;
      border: solid 4px #606764;
      border-radius: 40px;
      /* max-width:90%; */
      width:200px;
      height: 50px;
      line-height: 0px;
      -webkit-transition: 1s all;
    }
    #magicBox:hover{
      cursor: pointer;
      transition-timing-function: linear;
      transform: scale(1.06);

      box-shadow:-10px 10px 30px 5px #1B3A48;
      -webkit-transition: 1s all;
    }
    #magicBox:active{
      box-shadow:-10px 10px 30px 5px grey;
    }

  </style>
</html>
