<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
session_start();
require ("../config.php");

if($_GET){
    $codigo_postal = $_GET['id'];
    $editar ="Select * FROM codigo_postal WHERE codigo_postal = $codigo_postal";

    if ($resultado=$con->query($editar)) {
        $row=$resultado->fetch_assoc();
    } else {


        echo "Infelizmente não foi possivel Editar";
    }
}

if($_POST){
    $id=$_POST['id'];
    $nome=$_POST['nome'];
    $editarrr ="Update codigo_postal set nome='$nome' WHERE ID_Produto = $id";

    if ($resultado=$con->query($editarrr)) {
        header( "location: produto.php");
    } else {


        echo "Infelizmente não foi possivel Editar";
    }
}

?>

<form action="editar_produto.php" method="post" enctype="multipart/form-data">
    <div class="field">
        <div class="control">
            <input name="codigo_postal"  class="input is-large" type="text" value="<?php echo ''.$row['_Codigo_postal'].''; ?>" >
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="Localidade" type="text" class="input is-large" value="<?php echo ''.$row['Localidade'].''; ?>">
        </div>
    </div>

    <input name="id" type="hidden" class="input is-large" value="<?php echo ''.$row['codigo_postal'].''; ?>">
    <br>
    <button type="submit" class="button is-block is-link is-large is-fullwidth">Registar Codigo_Postal</button>
</form>

</body>
</html>