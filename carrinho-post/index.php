<?php
require_once './shared/header.php';
?>

<br><br>
<main class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align:center;">
            <?php
            @$cod=$_REQUEST['cod'];
             if (isset($cod)) {

                if ($cod == '171') {  
                    echo ('<br><div class="alert alert-danger">');
                    echo ('Email ou senha incorretos.');
                    echo ('</div>');
                } else if ($cod == '172'){
                    echo ('<br><div class="alert alert-danger">');
                    echo ('Sessão exspirou..');
                    echo ('</div>');
                }
            }
            ?>
            
                <form action="controller/loginController.php" method="post">
                    <h2>Login</h2>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" placeholder="Insira seu email" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" placeholder="Insira sua senha" id="senha" name="senha">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-dark">Login</button>
                    <br><br>
                    <a class="btn btn-light" href="cadastro.php">Cadastrar</a>

                </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</main>

<?php
require_once './shared/footer.php';
?>