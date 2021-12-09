<?php
include_once('app/database/connection.php');
include_once('app/functions/delete.php');

if (isset($_POST['id'])) {
    echo "<h5 class='msg'>Encomenda excluída com sucesso!</h5>";

    $id_encomenda = $_POST["id"] ?? "";

    deletEncomenda($id_encomenda);
}

?>
<main class="container">
    <div id="search-container" class="col-md-112">
        <h1>Busque uma encomenda</h1>
        <form action="" method="GET">
            <input type="text" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>" id=" search" name="search" class="form-control" placeholder="Rastreador da encomenda...">
        </form>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-container-packages">

        <?php
        if (!isset($_GET['search'])) {
        ?>

            <tr>
                <td colspan="3">Digite algo para buscar...</td>
            </tr>

            <?php
        } else {
            $search = $_GET['search'];
            $selection = $conn->prepare("SELECT enc.id_encomenda as id_encomenda, 
            enc.rastreador as rastreador,enc.cep as cep, enc.bairro as bairro, ent.nome as entregador
            FROM encomenda enc, entregador ent WHERE enc.entregador_id = id_entregador AND rastreador LIKE '%$search%';");

            $selection->execute();
            $encomendas = $selection->fetchAll();

            if (count($encomendas) == 0 || !$search) {
            ?>

                <p>Nenhum resultado encontrado...</p>

                <?php
            } else {
                foreach ($encomendas as $i => $encomenda) {
                ?>


                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Rastreador</th>
                                <th scope='col'>CEP</th>
                                <th scope='col'>Bairro</th>
                                <th scope='col'>Entregador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope='row'><?php echo $i + 1; ?></td>
                                <td><?php echo $encomenda['rastreador']; ?></td>
                                <td><?php echo $encomenda['cep']; ?></td>
                                <td><?php echo $encomenda['bairro']; ?></td>
                                <td><?php echo $encomenda['entregador']; ?></td>
                            </tr>
                        </tbody>
                    </table>


            <?php
                }
            }
            ?>
        <?php
        }
        ?>

    </div>

</main>