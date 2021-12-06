<!doctype html>
<html>

<head>
    <title>betabase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonte do google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/bootstrap-theme.min.css">

    <!-- CSS Aplicação -->
    <link rel="stylesheet" href="public/css/style.css">


    <link rel="shortcut icon" href="public/img/favicon.png" sizes="32x32" type="image/png">


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container" id="navbar">

                <div class="navbar-header navbar-collapse">
                    <a href="?i=home" class="navbar-brand">
                        <img src="public/img/logo.svg" alt="home">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menu-list" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse col-md-2 offset-4" id="menu-list">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="?i=home" class="nav-link">Home</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastros
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="?i=cadastro/entregador">Entregadores</a></li>
                                <li><a class="dropdown-item" href="?i=cadastro/encomenda">Encomendas</a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Listagem
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="?i=dashboard/entregadores">Entregadores</a></li>
                                <li><a class="dropdown-item" href="?i=dashboard/encomendas">Encomendas</a></li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administração
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Entregas</a></li>
                                <li><a class="dropdown-item" href="#">Atribuições</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
    </header>