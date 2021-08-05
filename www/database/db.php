<?php

include_once('db_connection.php');

/**
 * Get available pet sizes
 */
function getAllEncomendas() {
    $db = Database::instance()->db();
    $stmt = $db->prepare("SELECT encomendaId FROM encomenda");
    $stmt->execute();
    return $stmt->fetchAll();
}

?>