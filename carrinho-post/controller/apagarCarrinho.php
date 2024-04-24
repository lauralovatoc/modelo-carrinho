<?php
session_start();
$_SESSION['carrinho']=null;
$_SESSION['carrinho']=[];
header('location:../carrinho.php');
//consertar
?>