<?php
    include_once('database/db.php');
    $encomendas = getAllEncomendas();
    
    echo json_encode($encomendas);
?>