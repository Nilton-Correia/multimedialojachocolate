<?php
session_start();
require ("../config.php");


$produto = $_GET['id'];
$deleta ="DELETE FROM codigo_postal WHERE codigo_postal = $codigo_postal";
$resultado=$con->query($deleta);

if ($resultado=$con->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: Codigo_postal.php");
} else {


    echo "Infelizmente não foi possivel excluir";
}

?>
