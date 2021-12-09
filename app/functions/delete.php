<?php
function deletEntregador($id)
{
    $conn = new PDO("mysql:dbname=projeto_pi;host=localhost", "root", "");

    $stmt = $conn->prepare("DELETE FROM entregador WHERE id_entregador = :ID_ENTREGADOR");

    $stmt->bindParam(":ID_ENTREGADOR", $id);
    $stmt->execute();
}


function deletEncomenda($id)
{
    $conn = new PDO("mysql:dbname=projeto_pi;host=localhost", "root", "");

    $stmt = $conn->prepare("DELETE FROM encomenda WHERE id_encomenda = :ID_ENCOMENDA");

    $stmt->bindParam(":ID_ENCOMENDA", $id);
    $stmt->execute();
}
