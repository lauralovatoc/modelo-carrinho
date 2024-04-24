<?php
require_once '../model/usuarioModel.php';
if ($_POST) {
    $email = $_POST['email']; 
    $senha = $_POST['senha'];
      
    
    $usuario = new usuarioModel();
    $usuario->login($email,$senha);
} else {
    header('location:../index.php');
}

?>
