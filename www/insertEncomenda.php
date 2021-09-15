<?php

include_once('database/db.php');


$name=$_POST["name"];
$cliente=$_POST["cliente"];
$ndocumento=$_POST["documento"];

$numeroPecas=$_POST["quantidade"];
$nsetups=$_POST["nsetups"];

$time_days=$_POST["time_days"];
$time_hours=$_POST["time_hours"];
$time_minutes=$_POST["time_minutes"];
$time_seconds=$_POST["time_seconds"];

$data=$_POST["data"];
$hora=$_POST["hora"];

$fimprevisto = $_POST["finaldatehidden"];

$inicioprevisto="{$data}"." "."{$hora}";

insertEncomenda($cliente,$ndocumento,$name ,$inicioprevisto ,$fimprevisto ,$numeroPecas );
   

?>