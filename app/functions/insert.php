<?php
function insertEntregador($nome, $cpf, $bairro)
{
    $conn = new PDO("mysql:dbname=projeto_pi;host=localhost", "root", "");

    $stmt = $conn->prepare("INSERT INTO entregador (nome,bairro,cpf) VALUES (:NOME, :CEP, :BAIRRO)");
    $stmt->bindParam(':NOME', $nome);
    $stmt->bindParam(':CEP', $cpf);
    $stmt->bindParam(':BAIRRO', $bairro);
    $stmt->execute();
}


function insertEncomenda($rastreador, $cep, $bairro, $entregador_id)
{
    $conn = new PDO("mysql:dbname=projeto_pi;host=localhost", "root", "");

    $stmt = $conn->prepare("INSERT INTO encomenda(rastreador,cep,bairro,entregador_id) VALUES (:RASTREADOR, :CEP, :BAIRRO, :ENTREGADOR_ID)");
    $stmt->bindParam(':RASTREADOR', $rastreador);
    $stmt->bindParam(':CEP', $cep);
    $stmt->bindParam(':BAIRRO', $bairro);
    $stmt->bindParam(':ENTREGADOR_ID', $entregador_id);
    $stmt->execute();
}


function insertCep($cep)
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


function insertId($bairro)
{
    $conn = new PDO("mysql:dbname=projeto_pi;host=localhost", "root", "");

    $stmt = $conn->prepare("SELECT id_entregador FROM entregador E WHERE E.bairro = '$bairro' LIMIT 1;");
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    foreach ($resultado as $res) {
        $id = intval($res['id_entregador']);
    }

    return $id;
}
