<?php

 function loadAll() {
    require_once './model/produtoModel.php';
    $produtos = new produtoModel();
    $produtosList = $produtos->loadAll();

    return $produtosList;
}

function loadById($id_produto) {
    require_once './model/velasModel.php';
    $produtos = new velasModel();

    $produtos->loadById($id_produto);

    return $produtos;
}
