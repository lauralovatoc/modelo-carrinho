<?php
if($_POST){
    $valorTotal = $_POST["valorTotal"];
    $email = $_POST["email"];

    $produtosList = $_POST["produtos"];
    $quantidadesProdutos = $_POST["quantidades"];

    if(isset($valorTotal, $email, $produtosList, $quantidadesProdutos)){
        require_once '../model/compraModel.php';
        $compra = new compraModel();
        $compra->setEmail($email);
        $compra->setValor_total($valorTotal);
        $emailCompra = $compra->realizarCompra();

        require_once '../model/compra_produtoModel.php';
        $compraProduto = new compra_produtoModel();
        $compraProduto->insereProduto($produtosList, $quantidadesProdutos, $emailCompra);
        session_start();
        $_SESSION['carrinho'] = null;
        $_SESSION['carrinho'] = [];
        header('location:../carrinho.php?cod=success');
    }
}