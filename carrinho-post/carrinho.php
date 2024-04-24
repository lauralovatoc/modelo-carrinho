<?php
require_once './controller/autenticationController.php';
require_once './shared/header.php';

echo '<main class="container">';
echo '<br>';

@$cod = $_REQUEST['cod'];
            if (isset($cod)) {
                if ($cod == 'success') {  
                    echo ('<br><div class="alert alert-success">');
                    echo ('Compra realizada com sucesso.');
                    echo ('</div>');
                }
            }


$valorTotal = 0;
foreach ($_SESSION['carrinho'] as $produto) {
    $valorTotal += $produto['quantidade'] * $produto['valor'];
}

if (empty($_SESSION['carrinho'])) {
    echo '<p>Seu carrinho está vazio!</p>';
} else if (!empty($_SESSION['carrinho'])) {
    echo ('<div class="row">');
    foreach ($_SESSION['carrinho'] as $produto) {
        echo('<div class="col-md-3">');
        echo ('<img style="width:280px;height:230px;" src="./' . $produto['img'] . '">');
        echo'<br>';
        echo'<p><strong>' . $produto['nome'] . '</strong></p>';

        echo ('<p>Quantidade: ' . $produto['quantidade'] . '</p>');
        echo '<p>Valor individual: R$' . $produto['valor'] . ',00</p>';
        $valorprodutos = $produto['quantidade'] * $produto['valor'];
        echo '<p>Total: R$' . $valorprodutos . ',00</p>';
        
        echo '<a class="btn btn-dark" href="controller/carrinhoController.php?cod=delete&id='.$produto['id_produto'].'">Excluir</a>';
        echo('</div>');
    }
    echo('</div>');
}
echo('<div>');
echo('<hr>');
echo('<p>Valor da compra: R$' . $valorTotal . ',00</p>');

echo('<form method="post" action="controller/fecharPedido.php">');

foreach ($_SESSION['carrinho'] as $produto) {
    echo ('<input type="hidden" name="produtos[]" value="' . $produto['id_produto'] . '">');
    echo ('<input type="hidden" name="quantidades[]" value="' . $produto['quantidade'] . '">');
}
echo ('<input type="hidden" name="valorTotal" value="' . $valorTotal . '">');
echo ('<input type="hidden" name="email" value="' . $_SESSION['login'] . '">');

if(empty($_SESSION['carrinho'])){
    echo ('<a class="btn btn-dark" href="produtos.php">Comprar</a>');
} else {
    echo('<button class="btn btn-dark" type="submit">Comprar</button>');
}
?>

<a class="btn btn-light" href="controller/apagarCarrinho.php">Apagar carrinho</a>
</form> 
</div>
</main>

<?php
require_once 'shared/footer.php';
?>