<?php
include_once('app/functions/insert.php');
include_once('app/functions/delete.php');
include_once('app/functions/update.php');

// Cadastro
if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['bairro'])) {
    echo "<h5 class='msg'>Entregador(a) cadastrado(a) com sucesso!</h5>";

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $bairro = $_POST['bairro'];

    insertEntregador($nome, $cpf, $bairro);
}


// Delete
if (isset($_POST['id'])) {
    echo "<h5 class='msg'>Entregador(a) excluído(a) com sucesso!</h5>";

    $id_entregador = $_POST["id"] ?? "";

    deletEntregador($id_entregador);
}


// Update
if (isset($_POST['id_entregador']) && isset($_POST['edit-nome']) && isset($_POST['edit-cpf']) && isset($_POST['edit-bairro'])) {
    echo "<h5 class='msg'>Entregador(a) editado(a) com sucesso!</h5>";

    $id_entregador = $_POST['id_entregador'] ?? "";
    $nome = $_POST['edit-nome'] ?? "";
    $cpf = $_POST['edit-cpf'] ?? "";
    $bairro = $_POST['edit-bairro'] ?? "";

    updateEntregador($id_entregador, $nome, $cpf, $bairro);
}
?>


<!-- Table entregadores -->
<main class="container">
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Entregadores</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-container-deliveryman">

        <?php
        include_once('app/database/connection.php');
        $selection = $conn->prepare("SELECT * FROM entregador;");
        $selection->execute();
        $entregadores = $selection->fetchAll();

        if (count($entregadores) > 0) {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>#</th>";
            echo "<th scope='col'>Nome</th>";
            echo "<th scope='col'>Bairro</th>";
            echo "<th scope='col'>Ações</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody";

            foreach ($entregadores as $i => $entregador) {
                echo "<tr><td scope='row'>" . $i + 1 . "</td>";
                echo "<td>" . $entregador['nome'] . "</td>";
                echo "<td>" . $entregador['bairro'] . "</td>";
                echo "<td> <form action='?i=edit/entregador' method='POST'>
                            <button type='submit' name='id' value='" . $entregador['id_entregador'] . "' class='btn btn-outline-info btn-sm delete-btn'>
                                <ion-icon name='create-outline'></ion-icon>
                                    Editar
                            </button>
                        </form>";
                echo "<form method='POST'>
                            <button type='submit' name='id' value='" . $entregador['id_entregador'] . "' class='btn btn-outline-danger btn-sm delete-btn'>
                                <ion-icon name='trash-outline'></ion-icon>
                                    Deletar
                            </button>
                        </form>";
                echo "</td></tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Ainda não há entregadores cadastrados, clique <a href='?i=cadastro/entregador'>aqui</a> para criar.</p>";
        }
        ?>
    </div>
</main>