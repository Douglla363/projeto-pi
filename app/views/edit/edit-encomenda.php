<main class="container">
    <div id="create-container" class="col-md-6 offset-md-3">

        <?php
        include_once('app/database/connection.php');

        if (isset($_POST['id'])) {
            $stmt = $conn->prepare("SELECT * FROM encomenda WHERE id_encomenda = :ID_ENCOMENDA");

            $id_encomenda = $_POST["id"] ?? "";

            $stmt->bindParam(":ID_ENCOMENDA", $id_encomenda);
            $stmt->execute();
            $encomendas = $stmt->fetchAll();
        }

        foreach ($encomendas as $encomenda) {
            echo "<h2 class='mb-3'>Editando encomenda</h2>
        <form action='?i=dashboard/encomendas' method='POST' class='needs-validation' novalidate>

            <input type='hidden' name='id_encomenda' value='" . $encomenda['id_encomenda'] . "'> 
            <div class='form-group mb-3'>
                <label for='edit-rastreador' class='form-label'>Rastreador</label>
                <input type='text' name='edit-rastreador' id='edit-rastreador' class='form-control' placeholder='Insira o rastreador...' value='" . $encomenda["rastreador"] . "' required>
                <div class='invalid-feedback'>
                    Este campo é de preenchimento obrigatório
                </div>
            </div>

            <div class='form-group mb-3'>
                <label for='edit-cep' class='form-label'>CEP</label>
                <input type='text' class='form-control' name='edit-cep' id='edit-cep' placeholder='Insira o CEP...' value='" . $encomenda["cep"] . "' required>
                <div class='invalid-feedback'>
                    Este campo é de preenchimento obrigatório
                </div>
            </div>

            <div class='mb-3 text-center'>
                <input type='submit' class='btn btn-outline-primary mt-2' value='Editar'>
            </div>
        </form> ";
        }
        ?>
    </div>
</main>