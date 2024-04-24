
<html>
    <head>
        <title>Teste Carrinho</title>
        <meta charset="UTF-8">

        <script src="js/jquery-3.7.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        
        <style>
            h2, .form-group{
                text-align:left;
            }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrinho.php">Carrinho</a>
                    </li>
                    <?php
                    if (isset($_SESSION['login'])) {
                        echo('<li class="nav-item">
                        <a class="nav-link" 
                        style="text-decoration: none;"
                        href="controller/logoutController.php?cod=logout">Logout</a>
                        </li>');
                    }
                    ?>
                </ul>
            </div>
        </nav>
