<?php
     include_once('database/db.php');
     $encomendas = getAllEncomendas();

    $id=$_POST["id"];
    $estado=$_POST["estado"];

    foreach($encomendas as $encomenda){
        if($encomenda['encomendaId']==$id){
            $db = Database::instance()->db();
            $stmt = $db->prepare("UPDATE encomenda SET estado=? WHERE encomendaId = $id;");
            $stmt->execute(array($estado));
            echo json_encode(array("estado"=>$estado, "id"=>$id));
            exit();
        }
    }
?>