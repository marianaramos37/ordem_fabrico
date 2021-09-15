<?php

include_once('database/db.php');


$custoMin=$_POST["customin"];
$tempoSetup=$_POST["temposetup"];
$numeroTrabalhadores=$_POST["trabalhadores"];

updateDados($custoMin,$tempoSetup,$numeroTrabalhadores);
   
header('Location: index.php')

?>