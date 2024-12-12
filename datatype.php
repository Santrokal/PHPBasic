<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:900i');

* {
  box-sizing: border-box;
}


.wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
}

.button-container {
  margin: 0 20px; /* Adjust the value as needed to create more space between buttons */
}

.cta {
    display: flex;
    align-items: center;
    padding: 5px 10px;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    font-size: 20px;
    color: white;
    background: #6225E6;
    transition: 1s;
    box-shadow: 6px 6px 0 black;
    transform: skewX(-15deg);
}

.cta span {
  margin: 0 10px; /* Adjust the spacing within the button */
}

.cta:focus {
   outline: none; 
}

.cta:hover {
    transition: 0.5s;
    box-shadow: 10px 10px 0 #FBC638;
}

.cta span:nth-child(2) {
    transition: 0.5s;
    margin-right: 0px;
}

.cta:hover  span:nth-child(2) {
    transition: 0.5s;
    margin-right: 45px;
}

  span {
    transform: skewX(15deg) 
  }

  span:nth-child(2) {
    width: 20px;
    margin-left: 30px;
    position: relative;
    top: 12%;
  }
  
/**************SVG****************/

path.one {
    transition: 0.4s;
    transform: translateX(-60%);
}

path.two {
    transition: 0.5s;
    transform: translateX(-30%);
}

.cta:hover path.three {
    animation: color_anim 1s infinite 0.2s;
}

.cta:hover path.one {
    transform: translateX(0%);
    animation: color_anim 1s infinite 0.6s;
}

.cta:hover path.two {
    transform: translateX(0%);
    animation: color_anim 1s infinite 0.4s;
}

svg {
  fill: #FFFFFF;
}

/* SVG animations */

@keyframes color_anim {
    0% {
        fill: white;
    }
    50% {
        fill: #FBC638;
    }
    100% {
        fill: white;
    }
}
    </style>
</head>
<body>
<div style="text-align: center;">
<h1>PHP Data Type</h1>
</div>
<h2>PHP supports the following data types:</h2>

<?php
echo"String<br>";
echo"Integer<br>";
echo"Float (floating point numbers - also called double)<br>";
echo"Boolean<br>";
echo"Array<br>";
echo"Object<br>";
echo"NULL<br>";
echo"Resource<br>";
?>

<div style="text-align: center;">
    <h3>Declaring PHP String</h3>
</div>

<?php
$x = "It's a String!";
$y = 'PHP String!';

var_dump($x);
echo "<br>";
var_dump($y);
?>

<div style="text-align: center;">
    <h3>Declaring PHP Integer</h3>
</div>

<?php
$x = 231013;
var_dump($x);
?>
<div style="text-align: center;">
    <h3>Declaring PHP Float</h3>
</div>

<?php
$x = 80.98;
var_dump($x);
?>
<div style="text-align: center;">
    <h3>Declaring PHP Boolean</h3>
</div>

<?php
$x = true;
$y = false;
var_dump($x);
echo"<br><br>";
var_dump($y);
?>

<div style="text-align: center;">
    <h3>Declaring PHP Array</h3>
</div>
<?php
$games = array("God of War V","Free Fire","Grand Thief Auto VI");
var_dump($games);
?>

<div style="text-align: center;">
    <h3>Declaring PHP Object</h3>
</div>
<?php
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
      $this->color = $color;
      $this->model = $model;
    }
    public function message() {
      return "My car is a " . $this->color . " " . $this->model . "!";
    }
  }
  
  $myCar = new Car("red", "Volvo");
  var_dump($myCar);
?>
<div style="text-align: center;">
    <h3>Declaring PHP Null Value</h3>
</div>
<?php
$x = "Hello world!";
$x = null;
var_dump($x);
echo"<br><br>";
?>


<div class="wrapper">
  <div class="button-container">
    <a class="cta" href="echo.php">
      <span>
        <svg width="30px" height="20px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <path class="one" d="M0.308386606,22.2151689 L21.3228325,42.8607372 C21.5173671,43.0518571 21.8291689,43.0518421 22.0236851,42.8607034 L25.8456067,39.1051455 C26.0453987,38.9017916 26.0425131,38.5852223 25.8454792,38.391748 L9.00623952,21.8567233 C8.80479243,21.6623887 8.80479243,21.3376113 9.00623952,21.1432188 L25.8454438,4.60650147 C26.0470343,4.41221348 26.0470343,4.08778653 25.8454438,3.89349853 L22.0237147,0.139148749 C21.8291758,-0.0519357538 21.5174043,-0.0519058578 21.322902,0.139316927 L0.308323844,20.7886508 C-0.0911862855,21.1950775 -0.0855800979,21.8282176 0.308386606,22.2151689 Z" fill="#FFFFFF"></path>
            <path class="two" d="M20.3083866,22.2151689 L41.3228325,42.8607372 C41.5173671,43.0518571 41.8291689,43.0518421 42.0236851,42.8607034 L45.8456067,39.1051455 C46.0453987,38.9017916 46.0425131,38.5852223 45.8454792,38.391748 L29.0062395,21.8567233 C28.8047924,21.6623887 28.8047924,21.3376113 29.0062395,21.1432188 L45.8454438,4.60650147 C46.0470343,4.41221348 46.0470343,4.08778653 45.8454438,3.89349853 L42.0237147,0.139148749 C41.8291758,-0.0519357538 41.5174043,-0.0519058578 41.322902,0.139316927 L20.3083238,20.7886508 C19.9088137,21.1950775 19.9144199,21.8282176 20.3083866,22.2151689 Z" fill="#FFFFFF"></path>
            <path class="three" d="M40.3083866,22.2151689 L61.3228325,42.8607372 C61.5173671,43.0518571 61.8291689,43.0518421 62.0236851,42.8607034 L65.8456067,39.1051455 C66.0453987,38.9017916 66.0425131,38.5852223 65.8454792,38.391748 L49.0062395,21.8567233 C48.8047924,21.6623887 48.8047924,21.3376113 49.0062395,21.1432188 L65.8454438,4.60650147 C66.0470343,4.41221348 66.0470343,4.08778653 65.8454438,3.89349853 L62.0237147,0.139148749 C61.8291758,-0.0519357538 61.5174043,-0.0519058578 61.322902,0.139316927 L40.3083238,20.7886508 C39.9088137,21.1950775 39.9144199,21.8282176 40.3083866,22.2151689 Z" fill="#FFFFFF"></path>
          </g>
        </svg>
      </span>
      <span>PREV</span>
    </a>
  </div>

  
  <div class="button-container">
    <a class="cta" href="casting.php">
      <span>NEXT</span>
      <span>
        <svg width="30px" height="20px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
            <path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
            <path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
          </g>
        </svg>
      </span> 
    </a>
  </div>
</div>

    
</body>
</html>