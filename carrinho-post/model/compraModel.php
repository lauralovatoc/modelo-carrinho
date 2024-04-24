<?php

require_once '../model/ConexaoMysql.php';

class compraModel{
    
    protected $id_compra;
    protected $data_compra;
    protected $data_aprovacao;
    protected $valor_total;
    protected $email;

    public function __construct(){
    }
    public function getId_compra() {
        return $this->id_compra;
    }

    public function getData_compra() {
        return $this->data_compra;
    }

    public function getData_aprovacao() {
        return $this->data_aprovacao;
    }

    public function getValor_total() {
        return $this->valor_total;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId_compra($id_compra): void {
        $this->id_compra = $id_compra;
    }

    public function setData_compra($data_compra): void {
        $this->data_compra = $data_compra;
    }

    public function setData_aprovacao($data_aprovacao): void {
        $this->data_aprovacao = $data_aprovacao;
    }

    public function setValor_total($valor_total): void {
        $this->valor_total = $valor_total;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

   public function realizarCompra(){
        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = 'INSERT INTO compra (email, valor_total) values ("'.$this->email.'", "'.$this->valor_total.'");';

        $emailCompra = $db->Executar($sql);
        $db->Desconectar();
        
        return $emailCompra;
    }
}