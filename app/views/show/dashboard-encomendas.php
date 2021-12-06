<?php
include_once('app/database/connection.php');


// Cadastro
if (isset($_POST['rastreador']) && isset($_POST['cep'])) {
    echo "<h5 class='msg'>Encomenda cadastrada com sucesso!</h5>";

    $rastreador = $_POST['rastreador'];
    $cep = $_POST['cep'];

    $link = "https://viacep.com.br/ws/$cep/json/";
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $resposta = json_decode(curl_exec($ch), true);
    curl_close($ch);

    $bairro = $resposta['bairro'];
    $stmt = $conn->prepare("INSERT INTO encomenda(rastreador,cep,bairro) VALUES (:RASTREADOR, :CEP, :BAIRRO)");
    $stmt->bindParam(':RASTREADOR', $rastreador);
    $stmt->bindParam(':CEP', $cep);
    $stmt->bindParam(':BAIRRO', $bairro);
    $stmt->execute();
}


// Delete
if (isset($_POST['id'])) {
    echo "<h5 class='msg'>Encomenda excluída com sucesso!</h5>";

    $stmt = $conn->prepare("DELETE FROM encomenda WHERE id_encomenda = :ID_ENCOMENDA");

    $id_encomenda = $_POST["id"] ?? "";

    $stmt->bindParam(":ID_ENCOMENDA", $id_encomenda);
    $stmt->execute();
}


// Update
if (isset($_POST['id_encomenda']) && isset($_POST['edit-rastreador']) && isset($_POST['edit-cep'])) {
    echo "<h5 class='msg'>Encomenda Editada com sucesso!</h5>";

    $stmt = $conn->prepare("UPDATE encomenda SET rastreador = :RASTREADOR, cep = :CEP, bairro = :BAIRRO WHERE id_encomenda = :ID_ENCOMENDA");

    $id_encomenda = $_POST['id_encomenda'] ?? "";
    $rastreador = $_POST['edit-rastreador'] ?? "";
    $cep = $_POST['edit-cep'] ?? "";

    $link = "https://viacep.com.br/ws/$cep/json/";
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $resposta = json_decode(curl_exec($ch), true);
    curl_close($ch);

    $bairro = $resposta['bairro'];

    $stmt->bindParam(":ID_ENCOMENDA", $id_encomenda);
    $stmt->bindParam(":RASTREADOR", $rastreador);
    $stmt->bindParam(":CEP", $cep);
    $stmt->bindParam(":BAIRRO", $bairro);
    $stmt->execute();
}
?>


<!-- Table encomendas -->
<main class="container">
    <div class="col-md-12 dashboard-title-container">
        <h1>Encomendas</h1>
    </div>
    <div class="col-md-12 dashboard-container-packages">

        <?php
        include_once('app/database/connection.php');
        $selection = $conn->PREPARE("SELECT encomenda.id_encomenda as id_encomenda, encomenda.rastreador as rastreador,encomenda.cep as cep, encomenda.bairro as bairro, entregador.nome as entregador FROM encomenda LEFT JOIN entregador on encomenda.entregador_id = entregador_id;");
        $selection->execute();
        $encomendas = $selection->fetchAll();

        if (count($encomendas) > 0) {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>#</th>";
            echo "<th scope='col'>Rastreador</th>";
            echo "<th scope='col'>CEP</th>";
            echo "<th scope='col'>Bairro</th>";
            echo "<th scope='col'>Entregador</th>";
            echo "<th scope='col'>Ações</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody";

            foreach ($encomendas as $i => $encomenda) {
                echo "<tr><td scope='row'>" . $i + 1 . "</td>";
                echo "<td>" . $encomenda['rastreador'] . "</td>";
                echo "<td>" . $encomenda['cep'] . "</td>";
                echo "<td>" . $encomenda['bairro'] . "</td>";
                echo "<td>" . $encomenda['entregador'] . "</td>";
                echo "<td> <form action='?i=edit/encomenda' method='POST'>
                            <button type='submit' name='id' value='" . $encomenda['id_encomenda'] . "' class='btn btn-outline-info btn-sm delete-btn'>
                                <ion-icon name='create-outline'></ion-icon>
                                    Editar
                            </button>
                        </form>";
                echo "<form method='POST'>
                            <button type='submit' name='id' value='" . $encomenda['id_encomenda'] . "' class='btn btn-outline-danger btn-sm delete-btn'>
                                <ion-icon name='trash-outline'></ion-icon>
                                    Deletar
                            </button>
                        </form>";
                echo "</td></tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nenhuma há encomenda disponível.</p>";
        }
        ?>
    </div>
</main>





<!--
class Delete
{

function destroy($id)
{
include_once('app/database/connection.php');

$id_encomenda = $id["id"];

$stmt = $conn->prepare("DELETE FROM entregador WHERE id_encomenda = :ID_ENCOMENDA");
$stmt->bindParam(":ID_ENCOMENDA", $id_encomenda);
$stmt->execute();
}
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // aqui é onde vai decorrer a chamada se houver um *request* POST
$product = new Delete;
$product->destroy($_POST);
}


function destroy($id)
{
include_once('app/database/connection.php');

$stmt = $conn->prepare("DELETE FROM entregador WHERE id_encomenda = :ID_ENCOMENDA");
$stmt->bindParam(":ID_ENCOMENDA", $id);
$stmt->execute();
}

$operacao = $_GET['op'] ?? "n";

if ($operacao == "del") {
$id = $_GET['id'] ?? "";

$stmt = $conn->prepare("DELETE FROM entregador WHERE id_encomenda = :ID");
$stmt->bindParam(":ID", $id);
$stmt->execute();
} -->