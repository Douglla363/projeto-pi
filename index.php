<?php
/* Define a página atual pela URL */

$pagina = 'home';

if (isset($_GET['i'])) {
    $pagina = addslashes($_GET['i']);
}

/* Carrega o header.php */
include 'app/views/layouts/header.php';

/* Carrega a página escolhida pelo usuário */
switch ($pagina) {
    case 'home':
        include 'app/views/home.php';
        break;

    case 'cadastro/entregador':
        include 'app/views/registration/create-entregador.php';
        break;

    case 'cadastro/encomenda':
        include 'app/views/registration/create-encomenda.php';
        break;

    case 'dashboard/entregadores':
        include 'app/views/show/dashboard-entregadores.php';
        break;

    case 'dashboard/encomendas':
        include 'app/views/show/dashboard-encomendas.php';
        break;

    case 'edit/entregador':
        include 'app/views/edit/edit-entregador.php';
        break;

    case 'edit/encomenda':
        include 'app/views/edit/edit-encomenda.php';
        break;

    default:
        include 'app/views/home.php';
        break;
}

/* Carrega o footer.php */
include 'app/views/layouts/footer.php';
