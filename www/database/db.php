<?php

include_once('db_connection.php');


function getAllEncomendas() {
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM encomenda");
    $stmt->execute();
    return $stmt->fetchAll();
}

function insertEncomenda($cliente,$ndocumento,$nomeProduto ,$inicioPrevisto ,$terminoPrevisto ,$numeroPecas ) {
    $db = Database::instance()->db();
    $stmt = $db->prepare("INSERT INTO encomenda (cliente, ndocumento, nomeProduto, inicioPrevisto, terminoPrevisto,numeroPecas,estado) VALUES (?,?,?,?,?,?,'Por começar')");
    $stmt->execute(array($cliente,$ndocumento,$nomeProduto ,$inicioPrevisto ,$terminoPrevisto ,$numeroPecas));
}

function getHorario() {
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM horario");
    $stmt->execute();
    return $stmt->fetchAll();
}
   
function updateHorario($a1,$b1,$a2,$b2,$a3,$b3,$a4,$b4,$a5,$b5, $c1,$d1,$c2,$d2,$c3,$d3,$c4,$d4,$c5,$d5, $e1,$f1,$e2,$f2,$e3,$f3,$e4,$f4,$e5,$f5, $g1,$h1,$g2,$h2,$g3,$h3,$g4,$h4,$g5,$h5) {
    $db = Database::instance()->db();
    $stmt = $db->prepare("UPDATE horario SET a1 = ?, b1= ?, a2= ?, b2= ?, a3= ?,b3 = ?, a4= ?, b4= ?,a5= ?, b5= ?, c1 = ?, d1= ?, c2= ?, d2= ?, c3= ?,d3 = ?, c4= ?, d4= ?,c5= ?, d5= ?, e1 = ?, f1= ?, e2= ?, f2= ?, e3= ?,f3 = ?, e4= ?, f4= ?,e5= ?, f5= ?, g1 = ?, h1= ?, g2= ?, h2= ?, g3= ?,h3 = ?, g4= ?, h4= ?,g5= ?, h5= ?  WHERE empresaId = 1;");
    $stmt->execute(array($a1,$b1,$a2,$b2,$a3,$b3,$a4,$b4,$a5,$b5, $c1,$d1,$c2,$d2,$c3,$d3,$c4,$d4,$c5,$d5, $e1,$f1,$e2,$f2,$e3,$f3,$e4,$f4,$e5,$f5, $g1,$h1,$g2,$h2,$g3,$h3,$g4,$h4,$g5,$h5));
}

function getDados() {
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT * FROM empresa");
    $stmt->execute();
    return $stmt->fetchAll();
}

function updateDados($custoMin,$tempoSetup,$numeroTrabalhadores) {
    $db = Database::instance()->db();
    $stmt = $db->prepare("UPDATE empresa SET custoPorMinuto=?, tempoSetup=?, numeroTrabalhadores=? WHERE empresaId = 1;");
    $stmt->execute(array($custoMin,$tempoSetup,$numeroTrabalhadores));
}

?>


