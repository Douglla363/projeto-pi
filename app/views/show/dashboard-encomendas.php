<?php
include_once('app/functions/insert.php');
include_once('app/functions/delete.php');
include_once('app/functions/update.php');


// Insert
if (isset($_POST['rastreador']) && isset($_POST['cep'])) {
    echo "<h5 class='msg'>Encomenda cadastrada com sucesso!</h5>";

    $rastreador = $_POST['rastreador'];
    $cep = $_POST['cep'];
    $bairro = insertCep($cep);
    $entregador_id = insertId($bairro);

    insertEncomenda($rastreador, $cep, $bairro, $entregador_id);
}

// Delete
if (isset($_POST['id'])) {
    echo "<h5 class='msg'>Encomenda excluída com sucesso!</h5>";

    $id_encomenda = $_POST["id"] ?? "";

    deletEncomenda($id_encomenda);
}


// Update
if (isset($_POST['id_encomenda']) && isset($_POST['edit-rastreador']) && isset($_POST['edit-cep'])) {
    echo "<h5 class='msg'>Encomenda Editada com sucesso!</h5>";

    $id_encomenda = $_POST['id_encomenda'] ?? "";
    $rastreador = $_POST['edit-rastreador'] ?? "";
    $cep = $_POST['edit-cep'] ?? "";
    $bairro = updatetCep($cep);
    $entregador_id = updateId($bairro);

    updateEncomenda($id_encomenda, $rastreador, $cep, $bairro, $entregador_id);
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
        $selection = $conn->PREPARE("SELECT encomenda.id_encomenda as id_encomenda, encomenda.rastreador as rastreador,encomenda.cep as cep, encomenda.bairro as bairro, entregador.nome as entregador FROM encomenda LEFT JOIN entregador on encomenda.entregador_id = id_entregador;");
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