<?php

include_once('database/db.php');


$a1=$_POST["a1"];
$b1=$_POST["b1"];
$a2=$_POST["a2"];
$b2=$_POST["b2"];
$a3=$_POST["a3"];
$b3=$_POST["b3"];
$a4=$_POST["a4"];
$b4=$_POST["b4"];
$a5=$_POST["a5"];
$b5=$_POST["b5"];

$c1=$_POST["c1"];
$d1=$_POST["d1"];
$c2=$_POST["c2"];
$d2=$_POST["d2"];
$c3=$_POST["c3"];
$d3=$_POST["d3"];
$c4=$_POST["c4"];
$d4=$_POST["d4"];
$c5=$_POST["c5"];
$d5=$_POST["d5"];

$e1=$_POST["e1"];
$f1=$_POST["f1"];
$e2=$_POST["e2"];
$f2=$_POST["f2"];
$e3=$_POST["e3"];
$f3=$_POST["f3"];
$e4=$_POST["e4"];
$f4=$_POST["f4"];
$e5=$_POST["e5"];
$f5=$_POST["f5"];

$g1=$_POST["g1"];
$h1=$_POST["h1"];
$g2=$_POST["g2"];
$h2=$_POST["h2"];
$g3=$_POST["g3"];
$h3=$_POST["h3"];
$g4=$_POST["g4"];
$h4=$_POST["h4"];
$g5=$_POST["g5"];
$h5=$_POST["h5"];


updateHorario($a1,$b1,$a2,$b2,$a3,$b3,$a4,$b4,$a5,$b5, $c1,$d1,$c2,$d2,$c3,$d3,$c4,$d4,$c5,$d5, $e1,$f1,$e2,$f2,$e3,$f3,$e4,$f4,$e5,$f5, $g1,$h1,$g2,$h2,$g3,$h3,$g4,$h4,$g5,$h5);
   
header('Location: index.php')

?>