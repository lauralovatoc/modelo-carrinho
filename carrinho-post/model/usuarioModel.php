<?php

require_once 'ConexaoMySql.php';

class usuarioModel {
    protected $nome;
    protected $senha;
    
    public function __construct() {
        //vazio
    }
    
    //getters and setters
    public function getNome() {
        return $this->nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }

    //métodos especialistas
    public function login($email,$senha){
        $db = new ConexaoMysql();
        $db->Conectar();
        
        $sql = "SELECT * FROM usuario where email ='$email'and senha ='$senha'";
        
        $db->Consultar($sql);
        $result = $db->total;
        
        if($result>=1){
                            
            session_start();
            
            $_SESSION['login']=$email;
            
            header('location:../produtos.php');
            
        }else{
            header('location:../index.php?cod=171');
        }
        $db->Desconectar();
    }
    
    public function cadastrar($email,$senha){        
        $dbemail = new ConexaoMysql();
        $dbemail->Conectar();
        
        $verificarEmail = "SELECT * FROM usuario WHERE email='$email'";
        
        $dbemail->Consultar($verificarEmail);
        $result = $dbemail -> total;
        
        if ($result>=1){
            header('location:../cadastro.php?cod=175');
        } else{
            $db = new ConexaoMySql();
            $db->Conectar();

            $sql = "INSERT INTO usuario (email,senha) values ('$email','$senha')";
            $db->Executar($sql);
            header('location:../index.php');
        
            $db->Desconectar();
        }
    }

}
