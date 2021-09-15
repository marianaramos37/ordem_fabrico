<?php
     include_once('database/db.php');
     $encomendas = getAllEncomendas();

    $id=$_POST["id"];
    $data=$_POST["data"];

    foreach($encomendas as $encomenda){
        if($encomenda['encomendaId']==$id){
            $db = Database::instance()->db();
            $stmt = $db->prepare("UPDATE encomenda SET inicioReal=? WHERE encomendaId = $id;");
            $stmt->execute(array($data));
            exit();
        }
    }
?>