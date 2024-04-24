<?php
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if($_REQUEST['cod'] && $_REQUEST['cod']=="delete"){
    $idproduto = $_REQUEST['id'];

            foreach ($_SESSION['carrinho'] as $indice => $produto) {
                if ($produto['id_produto'] == $idproduto) {
                    unset($_SESSION['carrinho'][$indice]);
                    break;
                }
            }
    header('location:../carrinho.php');
}

if ($_POST) {
    if(isset($_SESSION['login']) && isset($_POST['id_produto'])) {

        $carrinhoIdprodutos = $_POST['id_produto'];
        $carrinhoNome = $_POST['nome'];
        $carrinhoValor = $_POST['valor'];
        $carrinhoImg = $_POST['img'];
        $carrinhoQuantidade = $_POST['quantidade'];
        
        for ($i = 0; $i < count($carrinhoIdprodutos); $i++) {
            $produto = [
                'id_produto' => $carrinhoIdprodutos[$i],
                'nome' => $carrinhoNome[$i],
                'valor' => $carrinhoValor[$i],
                'img' => $carrinhoImg[$i],
                'quantidade' => $carrinhoQuantidade[$i],
            ];
            
            
            $produtoAtual = false;
            foreach ($_SESSION['carrinho'] as &$item) {
                if ($item['id_produto'] == $produto['id_produto']) {
                    $item['quantidade'] += $produto['quantidade'];
                    $produtoAtual = true;
                    break;
                }
            } if (!$produtoAtual) {
                $_SESSION['carrinho'][] = $produto;
            }
        }
        header('location:../carrinho.php');
    }
}
