<?php
session_start();
require ("../config.php");


$utilizador = $_GET['id'];
$deleta ="DELETE FROM users WHERE id = $utilizador";
$resultado=$con->query($deleta);

if ($resultado=$con->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: utilizador.php");
} else {


    echo "Infelizmente não foi possivel excluir";
}

?>
