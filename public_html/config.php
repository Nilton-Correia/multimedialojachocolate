<?php
$host="localhost";
$port= 3306;
$socket="";
$user="root";
$password="";
$dbaname="dbmultimedia";
$con = new mysqli($host, $user, $password, $dbaname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());
if ($con->connect_error){
    die ("Erro de Ligação de base de dados: ". $con->connect_error);

}
?>