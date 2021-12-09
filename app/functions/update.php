<?php
function updateEntregador($id_entregador, $nome, $cpf, $bairro)
{
    $conn = new PDO("mysql:dbname=projeto_pi;host=localhost", "root", "");

    $stmt = $conn->prepare("UPDATE entregador SET nome = :NOME, cpf = :CPF, bairro = :BAIRRO WHERE id_entregador = :ID_ENTREGADOR");
    $stmt->bindParam(":ID_ENTREGADOR", $id_entregador);
    $stmt->bindParam(':NOME', $nome);
    $stmt->bindParam(':CPF', $cpf);
    $stmt->bindParam(':BAIRRO', $bairro);
    $stmt->execute();
}


function updateEncomenda($id_encomenda, $rastreador, $cep, $bairro, $entregador_id)
{
    $conn = new PDO("mysql:dbname=projeto_pi;host=localhost", "root", "");

    $stmt = $conn->prepare("UPDATE encomenda SET rastreador = :RASTREADOR, cep = :CEP, bairro = :BAIRRO, entregador_id = :ENTREGADOR_ID WHERE id_encomenda = :ID_ENCOMENDA");
    $stmt->bindParam(":ID_ENCOMENDA", $id_encomenda);
    $stmt->bindParam(":RASTREADOR", $rastreador);
    $stmt->bindParam(":CEP", $cep);
    $stmt->bindParam(":BAIRRO", $bairro);
    $stmt->bindParam(':ENTREGADOR_ID', $entregador_id);
    $stmt->execute();
}


function updatetCep($cep)
{
    $link = "https://viacep.com.br/ws/$cep/json/";
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $resposta = json_decode(curl_exec($ch), true);
    curl_close($ch);

    $bairro = $resposta['bairro'];

    return $bairro;
}


function updateId($bairro)
{
    $conn = new PDO("mysql:dbname=projeto_pi;host=localhost", "root", "");

    $stmt = $conn->prepare("SELECT id_entregador FROM entregador e WHERE e.bairro = '$bairro' LIMIT 1;");
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    foreach ($resultado as $res) {
        $id = intval($res['id_entregador']);
    }

    return $id;
}
