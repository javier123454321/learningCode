<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>PHP Intro lecture</title>
  </head>
  <body>
    <h1><?php echo "Data Types:" ?></h1>
    <div class="description">
      <h2>Variables</h2>
      <p>Variables in PHP start with the "<strong>$</strong>" sign: i.e. <strong>$string</strong></p>
      <?php
        $int = 100;
        $float = .100;
        $string = 'this is a string';
        $bool = false;
        $array = array($int, $float, $string, $bool);
        $assoc_array = array("name" => "John", "age" => 25, "fav_color" => "orange")
       ?>
  <pre class="code">

   $int = 100;
   $float = .100;
   $string = 'this is a string';
   $bool = false;
   $array = array($int, $float, $string, $bool);
   $assoc_array = array("name" => "John", "age" => 25,
                  "fav_color" => "orange");
  </pre>
               <p><i>This last one is like a dictionary in python, or a object in JS. It is an array with keys instead of indexes</i></p>
        </ul>
    </div>


    <div class="description">
      <h2>Var Dump</h2>
      <p>you can use the var_dump() command to see the data type of an object</p>

      <p><?php
       echo "For command: <strong>var_dump('This is a string')</strong>, the result is: ";
       var_dump('This is a string');
       echo "<br><br> data_type(the length of the string) 'the value of the string'</p>";
       echo "<p>you can do it for int, float, bool, arrays, etc.<p>";
       ?>
       <ul>
              <li>var_dump($int) = <?php var_dump($int);?></li>
              <li>var_dump($float) = <?php var_dump($float);?></li>
              <li>var_dump($string) = <?php var_dump($string);?></li>
              <li>var_dump($bool) = <?php var_dump($bool);?></li>
              <li>var_dump($array) = <?php var_dump($array); ?></li>
              <li>var_dump($assoc_array) = <?php var_dump($assoc_array); ?></li>
       </ul>

    </div>

    <div class="description">
      <h2>Class</h2>

        <pre class="code">

         class Car{
            function Car(){
              $this -> model = "Ferrari";
              $this -> color = "Red";
            }
          }

          $object = new Car();
          echo $object -> model;
        </pre>
        <h3>Output: </h3>
        <div class="output">

            <?php
              class Car{
                function Car(){
                  $this -> model = "Ferrari";
                  $this -> color = "Red";
                }
              }

              $object = new Car();
              echo $object -> model;
              ?>
              <p>Classes allow OOP</p>
        </div>
    </div>


    <div class="description">
      <h2>PHP Strings</h2>
   <pre class="code">

    $name = "John";
    $age = 25;

    echo "A person named $name, of age $age.";
    echo "Person Name, Age: " . $name . ", ". $age . " ";
    </pre>

    <h3>Output:</h3>
    <div class="output">


    <?php
    $name = "John";
    $age = 25;

    echo "<p>A person named $name, of age $age. </p>";
    echo "<p>Person: Name, Age = " . $name . ", ". $age . "</p>";
    ?>
        </div>
    <strong> Notes: </strong>The dot notation allows for concatenation of strings</p>

   <p> Concatenation is useful for putting together variables as It can also be used for a complex
      expression, but as shown in the first exampl it might be better to just put the variable
      inside the echo statement instead of closing the string, adding a dot, putting the variable
      etc as done in the second statement.</p>

<h3>Concatenation Example</h3>
       <pre class="code">

     $a = "Home";
     $b = "Base";

     echo "$a.$b"
       </pre>
    <h3>Output:</h3>
<div class="output">
       <?php

     $a = "Home";
     $b = "Base";

     echo "<p>".$a.$b."</p>";

        ?>
</div>

<h3>String Functions:</h3>
<pre class="code">

    $string1 = "This is a long string of a certain length";
    $string1Length = strlen($string1);
    $string1WordCount = str_word_count($string1);
    $string1Reversed = strrev($string1);

    echo "$string1";
    echo "$string1Length";
    echo "$string1WordCount";
    echo "$string1Reversed";

</pre>

<h3>Output</h3>
    <div class="output">

    <?php
    $string1 = "This is a long string of a certain length";
    $string1Length = strlen($string1);
    $string1WordCount = str_word_count($string1);
    $string1Reversed = strrev($string1);

    echo "<p>$string1</p>";
    echo "<p>$string1Length</p>";
    echo "<p>$string1WordCount</p>";
    echo "<p>$string1Reversed</p>";
     ?>


    </div>
  </div>


  <div class="description">
    <h2>Regular Expressions</h2>

    <h3>String Position</h3>
    <p>the strpos() command finds the index at which a specific sequence of characters
      occurs in a string</p>

  <pre class="code">

    $pos = strpos("This string has the word
        name in it", "name"); //strpos expects
        2 parameters

    echo "$pos";
  </pre>

  <h3>Output</h3>

  <div class="output">
    <?php
      $pos = strpos("This string has the word name in it", "name"); //strpos expects 2 parameters
      echo $pos;
     ?>
  </div>

  <h3>String Replace</h3>
  <p>str_replace() starts with what you want replaced, and then the string that you
    will replace it with.</p>

    <pre class="code">

  $replacedString = str_replace("word", "taco", "String
      with a word that we want to change");

  echo "$replacedString";
    </pre>

    <div class="output">

    <?php

      $replacedString = str_replace("word", "taco", "String with a word that we want to change");

      echo "$replacedString";
     ?>
     </div>

    <h3>Regular Expressions</h3>
    <p>A test string that verifies if the input is valid "according to the specification
      of the regular expression"</p>
      <a href="http://rubular.com">Rubular allows to check regexes</a>
      <p>We use Regexes to sanitize strings and make sure that the input is formatted as expected.
      A way to search for the values in a string and replace it with what you want (see if it is a valid link, etc)</p>
  </div>

  <div class="description">
    <h2>Operators</h2>

    <h3>for loops</h3>

    <p> The format is the following:</p>

    <pre class="code">

      $int = 5;

      for ($i = 0; $i < 10; $i ++){
        $int += 10;
        echo "loop iteration $i, int = $int"
    </pre>

    <h3>Output:</h3>
    <div class="output">
      <?php
        $int = 5;

        for ($i = 0; $i < 10; $i ++){
          $int += 10;
          echo "loop iteration $i, int = $int <br>";
        }
       ?>
    </div>


    <h3>Equivalence:</h3>

     <pre class="code">

   $int = 5;

   echo var_dump($int == '5'); //should return True, checking for equivalence
                              //in values regardless of type

   echo var_dump($int === '5'); //Checking the value and type for equivalence
     </pre>

     <h3>Output:</h3>
     <div class="output">
       <?php
       $int = 5;

       echo var_dump($int == '5'); //should return True, checking for equivalence in values  regardless of type
       echo "<br>";

       echo var_dump($int === '5');
       ?>
    </div>
  </div>

  <div class="description">
    <h2>If else switch</h2>
    <pre class="code">

      if ("statement"==true){
        echo "statement is True";//in this case, this just
                                //says that string is not null
      }
    </pre>

    <h3>Output:</h3>
    <div class="output">

      <?php
      if ("statement"==true){
        echo "statement is True";//in this case, this just says that string is not null
      }
       ?>
     </div>
       <h2>switch</h2>
       <pre class="code">
      switch($favcolor){
        case "red":
              echo "Favorite color is red";
              case "blue":
                echo "Favorite color is blue"
              }
       </pre>
       <h3>Output:</h3>
       <div class="output">
         <form method="post">
           <input type="text" name="fav_color" value="Favorite Color">
           <input type="submit">
           <br><br>
         </form>

         <?php
         if (isset($_POST['fav_color'])){
         $favcolor = $_POST['fav_color'];
         switch($favcolor){
            case "red":
              echo "red sucks though";
            case "blue":
              echo "blue is ok";
            default:
              echo "$favcolor is your favorite color";
            };}else{
              echo "Type a favcolor";
            };
          ?>

      </div>
      <h2>switch True</h2>
      <code>
        <pre class="code">
        $t = date("H");
        
        switch(true){
          case $t < 3:
            echo "Morning";
          case $t < 19:
            echo "Afternoon";
          default:
            echo "Evening";
        }
      </pre>
      </code>
      <h3>Output:</h3>
      <div class="output">
        <?php
        $t = date("H");
        switch(true){
          case $t<3:
            echo "Morning";
            break;
          case $t<19:
            echo "Afternoon";
            break;
          default:
            echo "Evening";
        }

       ?>
     </div>
    </div>

    <div class="description">
    <h2>Functions</h2>
    <pre class="code">

      function displayHeight($height=50){//Here height is predefined
        return "Height: $height";
      }

      echo displayHeight();
      echo "< br>";
      echo displayHeight(51);
    </pre>

    <h3>Output:</h3>
    <div class="output">

      <?php
      function displayHeight($height=50){
        //Here height is predefined
        return "Height: $height";
      }

      echo displayHeight();
      echo "<br>";
      echo displayHeight(51);
      ?>
    </div>
  </div>

  <div class="description">
    <h2>Arrays</h2>
    <pre class="code">

      $sampleArray = array('car' => 'prius', 
                            'brand' => 'Toyota',
                             'color' => 'Red');
      var_dump($sampleArray);

      foreach($sampleArray as $key => $value){
        echo '$key name: $value < br >';
      }

    </pre>

    <h3>Output:</h3>
    <div class="output">

      <?php
       $sampleArray = array('car' => 'prius', 
                            'brand' => 'Toyota',
                             'color' => 'Red');
        var_dump($sampleArray);
        echo "<br>";
        echo "<br>";

        foreach($sampleArray as $key => $value){
          echo "$key name: $value <br>";
        }

      ?>
    </div>
  </div>

  <div class="description">
    <h2>Advanced Arrays</h2>
    <pre class="code">

    $indexedArray = array('classical', 'rock', 'hip-hop', 'blues');

    print_r($indexedArray);

    sort($indexedArray);

    print_r($indexedArray);


    $associatedArray = array('Mark' => 'Mexican', 'John' => 'Cuban', 'Zita' => 'Hungarian', 'Juancarlos' => 'Brazilian');
    print_r($associatedArray);

    echo "Asort:";
    asort($associatedArray);
    print_r($associatedArray);
    
    echo "ARsort:";
    arsort($associatedArray);
    print_r($associatedArray);

    echo "Ksort:";
    ksort($associatedArray);
    print_r($associatedArray);
    
    echo "KRsort:";
    krsort($associatedArray);
    print_r($associatedArray);
    </pre>
              <h4> For indexed arrays:</h4>
    <p>Sort alphabetizes the items in the array or orders numbers in ascending order</p>
    <p>rsort is equivalent but reverse</p>
    <h4> For associative arrays:</h4>
    <p>asort and arsort indexes the values of the array</p>
    <p>And k (key) sort sorts the keys</p>


    <h3>Output:</h3>
    <div class="output">

      <?php
       $indexedArray = array('classical', 'rock', 'hip-hop', 'blues');

        print_r($indexedArray);
        echo "<br>";
        echo "<br>";
    
        sort($indexedArray);

        print_r($indexedArray);
        echo"<br>";
        echo"<br>";


       $associatedArray = array('Mark' => 'Mexican', 'John' => 'Cuban', 'Zita' => 'Hungarian', 'Juancarlos' => 'Brazilian');
        print_r($associatedArray);
        echo "<br><br>";

        echo "Asort:<br>";
        asort($associatedArray);
        print_r($associatedArray);
        echo"<br>";
        echo "ARsort:<br>";
        arsort($associatedArray);
        print_r($associatedArray);
        echo"<br>";
        echo"<br>";

        echo "Ksort:<br>";
        ksort($associatedArray);
        print_r($associatedArray);
        echo"<br>";
        echo "KRsort:<br>";
        krsort($associatedArray);
        print_r($associatedArray);
        echo"<br>";
      ?>

</div>
      <h2>Multidimensional Arrays:</h2>
    <pre class="code">

    $multidimensionalArray = array
          (
            array('Brand' => 'Ferrari', 'Colors' => array('White', 'Black', 'Orange')),
            array('Brand' => 'Lambo', 'Colors' => array('Yellow', 'Green', 'Blue')),
            array('Brand' => 'Jeep', 'Colors' => array('Green', 'Red', 'Blue')),
          );
          echo $multidimensionalArray [1]['Brand'];
          echo $multidimensionalArray[0]['Colors'][2];

    </pre>
      <h3>Output:</h3>
    <div class="output">
        <?php
          $multidimensionalArray = array
          (
            array('Brand' => 'Ferrari', 'Colors' => array('White', 'Black', 'Orange')),
            array('Brand' => 'Lambo', 'Colors' => array('Yellow', 'Green', 'Blue')),
            array('Brand' => 'Jeep', 'Colors' => array('Green', 'Red', 'Blue')),
          );
          echo $multidimensionalArray [1]['Brand'] ."<br><br>";
          echo $multidimensionalArray[0]['Colors'][2];


        ?>

    </div>

    </div>

    <div class="description">
    <h2>SuperGlobals</h2>
    <pre class="code">

    $x = 5;

    function printXlocal($x){
    //You have to input the parameter or 
    //it won't recognize the variable outside of the scope
    //of the function
      echo $x;
    };

    function printXGlobal(){//We'll fetch x no problem here
      echo $GLOBALS['x'];
    }

    printXlocal($x);
    printXGlobal();
    </pre>
    <h3>Output:</h3>
    <div class="output">

      <?php
       $x = 5;

       function printXlocal($x){
        //You have to input the parameter or 
        //it won't recognize the variable outside of the scope
        //of the function
         echo $x ."<br>";
       };

       function printXGlobal(){//We'll fetch x no problem here
         echo $GLOBALS['x'];
       }

      printXlocal($x);
      printXGlobal();
      ?>
    </div><p> Post, Get, Session, Cookies, Server, Request, etc are all super Global Variables</p>

  </div>


  </body>

  <style media="screen">
    body{
      background-color: #77898B;
      font-family: sans-serif;
      max-width: 750px;
      margin: auto;
    }
    h1{
      text-align: left;
      color: white;
      font-size: 24px;
    }
    h2{
      font-size: 20px;
    }
    h3{
      font-size: 18px;
    }

    .description, .output{
      text-align: left;
      background-color: silver;
      padding:30px;
      max-width: 500px;
      margin: auto;
      margin-bottom: 20px;
    }
    .output{
      background-color: grey;
      padding-top: 10px;
      padding-bottom: 10px;
      margin-left: 5px;
    }
    .description > li{
      padding-top: 10px;
    }


    pre.code{
      padding: 20px;
      overflow: scroll;
      background-color: dimgrey;
      color:white;
      margin-left: 5px;
    }

  </style>
</html>
