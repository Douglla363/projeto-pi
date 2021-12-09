<main class="container">
    <div id="search-container" class="col-md-112">
        <h1>Busque uma encomenda</h1>
        <form action="" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Rastreador da encomenda...">
        </form>
    </div>

    <div id="events-container" class="container col-md-12">
        <?php
        /*
        if (isset($_GET['search'])) {
            header("Location: ?i=home");
            exit;
        }

        $rastreador = "%" . trim($_GET['search']) . "%";

        include_once('app/database/connection.php');
        $search = $conn->PREPARE("SELECT * FROM ecomenda WHERE restreador LIKE :restreador");
        $search->bindParam(':restreador', $rastreador, PDO::PARAM_STR);
        $search->execute();

        $resultados = $search->fetchAll(PDO::FETCH_ASSOC);

        print_r($resultados);
        exit;

        
        if ($search) {
            echo "<h2>Buscando por: " . $search['restreador'] . "</h2>";
        } else {
            echo "<h2>Encomendas</h2>";
            echo "<p class='subtitle'>Veja todas as encomendas</p>";
        }
        echo "<div id='cards-container' class='row'>";
        foreach ($encomendas as $encomenda) {
            echo "<div class='card col-md-3'>
                <div class='card-body'>
                    <p class='card-restreador'>" . $encomenda['rastreador'] . "</p>
                    <p class='card-cep'>" . $encomenda['cep'] . "</p>
                    <p class='card-bairro'>" . $encomenda['bairro'] . "</p>
                    <p class='card-entregador'>" . $encomenda['entregador'] . "</p>
                </div>
            </div>";
        }
        if (count($encomendas) == 0 && $search) {
            echo "<p>Não foi possível encontrar nenhuma ecomenda com rastreador:" . $search['restreador'] . "! <a href='?i=dashboard/encomendas'> Ver todas!</a></p>";
        } elseif (count($encomendas) == 0) {
            echo "<p>Não há eventos disponíveis</p>";
        }
        echo "</div>
        </div>";
        */
        ?>
    </div>

</main>