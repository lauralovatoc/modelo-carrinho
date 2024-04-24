<?php
 
if($_POST){
    
    require_once '../model/usuarioModel.php';

    $email_registrado = $_POST['email'];
    $senha_registrada = $_POST['senha'];
    
    $usuario = new usuarioModel();
    $usuario->cadastrar($email_registrado,$senha_registrada);
}
?>