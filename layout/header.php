<!doctype html>
<html lang="es">

<head>
<title>BOLSAS JULI</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS v5.2.1 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <style> 
        <?php require('./css/styles.css')?>
    </style>

</head>

<body>
<header>
<!-- Barra de Navegación-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="./index.php">Tienda</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="./acercade.php">Acerda de nosotros</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./productos.php">Todos los productos</a></li>
                                <li><hr class="dropdown-divider" /></li>
                            <!--       <li><a class="dropdown-item" href="#!">Populares</a></li>
                            <li><a class="dropdown-item" href="#!">Producto Nuevos</a></li> -->
                            </ul>
                        </li>
                    </ul>

                    <div class="conteiner-cart-productos">
                    <div class="row-productos">
                    <div class="cart-productos">
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Carrito
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>    
                    </div>    
                    
                    </form>
                    </div>
                    </div>

                </div>
            </div>
        </nav>

</header> 