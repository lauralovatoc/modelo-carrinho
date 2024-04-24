<?php

require_once 'ConexaoMysql.php';

class produtoModel {
    
    protected $id_produto;
    protected $nome;
    protected $valor;
    protected $img;
    
    public function getId_produto() {
        return $this->id_produto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getImg() {
        return $this->img;
    }

    public function setId_produto($id_produto): void {
        $this->id_produto = $id_produto;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setValor($valor): void {
        $this->valor = $valor;
    }

    public function setImg($img): void {
        $this->img = $img;
    }
    
    
    //Métodos especialistas
    public function loadAll() {

        $db = new ConexaoMysql();
        $db->Conectar();

        $sql = 'SELECT * FROM produto';
        $resultList = $db->Consultar($sql);

        $db->Desconectar();

        return $resultList;
    }

    public function loadById($id_produto) {

        $db = new ConexaoMysql();
        $db->Conectar();

        $sql = 'SELECT * FROM produto where id_produto =' . $id_produto;
        $resultList = $db->Consultar($sql);

        if ($db->total == 1) {
            foreach ($resultList as $value) {
                $this->id_produto = $value['id_produto'];
                $this->nome = $value['nome'];
                $this->valor = $value['valor'];
                $this->img = $value['img'];
            }
        }
        $db->Desconectar();

        return $resultList;
    }

}

?>