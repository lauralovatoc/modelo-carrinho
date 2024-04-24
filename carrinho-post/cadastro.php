<?php
require_once './shared/header.php';
?>

<br><br>
<main class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align:center;">


            <form method="post" action="controller/cadastroController.php">
               
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Digite seu email" id="email" name="email">
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" placeholder="Digite sua senha" id="senha" name="senha">
                </div>

                <br>

                <button type="submit" class="btn btn-dark">Cadastrar</button>
                    <br><br>
                   <a class="btn btn-light" href="index.php">Login</a>
                <?php
                @$cod = $_REQUEST['cod'];
                if (isset($cod)) {
                    if ($cod == '175') { //email ja foi utilizado
                        echo('<br><div class="alert alert-danger">');
                        echo('Este email já está sendo utilizado!');
                        echo('</div>');
                    }
                }
                ?>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</main>

<?php
require_once './shared/footer.php';
?>
