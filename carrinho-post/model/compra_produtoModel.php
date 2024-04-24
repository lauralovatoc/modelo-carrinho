<?php
require_once '../model/ConexaoMysql.php';
class compra_produtoModel{
    protected $id;
    protected $id_produto;
    protected $id_compra;
    protected $quantidade;

    public function __construct(){
    }
    public function getId() {
        return $this->id;
    }

    public function getId_produto() {
        return $this->id_produto;
    }

    public function getId_compra() {
        return $this->id_compra;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setId_produto($id_produto): void {
        $this->id_produto = $id_produto;
    }

    public function setId_compra($id_compra): void {
        $this->id_compra = $id_compra;
    }

    public function setQuantidade($quantidade): void {
        $this->quantidade = $quantidade;
    }

    public function insereProduto($produtosList, $quantidadesProdutos, $id_compra){
        $db = new ConexaoMysql();
        $db->Conectar();
        for ($i = 0; $i < count($produtosList); $i++) {            
            $sql = "INSERT INTO produto_in_compra (id_compra, id_produto, quantidade) values (".$id_compra.", ".$produtosList[$i].", ".$quantidadesProdutos[$i].");";
            $db->Executar($sql);
        }
        $db->Desconectar();
        return $db->total;
    }
}
