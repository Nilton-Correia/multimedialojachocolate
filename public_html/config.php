
<?php
//Dados do banco de dados
define("DB_HOST", "localhost");
define("DB_NAME", "dbmultimedia(1jc)");
define("DB_USER", "root");
define("DB_PASS", "");


$con = mysqli_connect("localhost","root","","dbmultimedia(1jc)");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

//Conexao com Banco de Dados
return new PDO(sprintf("mysql:host=%s;dbname=%s", DB_HOST, DB_NAME), DB_USER, DB_PASS);


?>
