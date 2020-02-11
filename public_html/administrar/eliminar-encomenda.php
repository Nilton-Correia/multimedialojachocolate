<?php
session_start();
require ("../config.php");


$encomenda = $_GET['ID_Encomenda'];
$deleta ="DELETE FROM encomenda WHERE encomenda = $encomenda";
$resultado=$con->query($deleta);

if ($resultado=$con->query($deleta)) {
    echo "O registro foi excluido";
    header( "location: encomenda.php");
} else {


    echo "Infelizmente não foi possivel excluir";
}

?>
