<?php
session_start();
require ("../config.php");


$produto = $_GET['id'];
$deleta ="DELETE FROM produto WHERE ID_Produto = $produto";
$resultado=$con->query($deleta);

if ($resultado=$con->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: produto.php");
} else {


    echo "Infelizmente não foi possivel excluir";
}

?>
