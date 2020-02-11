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
    $encomenda = $_GET['id'];
    $editar ="Select * FROM  WHERE ID_Encomenda= $encomenda";

    if ($resultado=$con->query($editar)) {
        $row=$resultado->fetch_assoc();
    } else {


        echo "Infelizmente não foi possivel Editar";
    }
}

if($_POST){
    $id=$_POST['ID_Encomenda'];
    $nome=$_POST[''];
    $editarr ="Update encomenda  set nome='$nome' WHERE ID_Encomenda = $id";

    if ($resultado=$con->query($editarr)) {
        header( "location: encomenda.php");
    } else {


        echo "Infelizmente não foi possivel Editar";
    }
}

?>

<form action="editar_produto.php" method="post" enctype="multipart/form-data">
    <div class="field">
        <div class="control">
            <input name="ID_Encomenda" type="text" class="input is-large" value="<?php echo ''.$row['ID_Encomenda'].''; ?>" autofocus>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="data_encomenda" type="text" class="input is-large" value="<?php echo ''.$row['data_encomenda'].''; ?>">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="Preco_Total" class="input is-large" type="text"value="<?php echo ''.$row['Preco_Total'].''; ?>">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="Estado"  class="input is-large" type="text"value="<?php echo ''.$row['Estado'].''; ?>" >
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="Tipo_pagamento_ID_Tipo_pagamento"  class="input is-large" type="text"value="<?php echo ''.$row['Tipo_pagamento_ID_Tipo_pagamento'].''; ?>">
        </div>
    </div>

    <div class="field">
        <div class="control">
            <input name="Tipo_envio_id_tipo_envio" type="text" class="input is-large" value="<?php echo ''.$row['Tipo_envio_id_tipo_envio'].''; ?>">
        </div>
    </div>
    <input name="users_id" type="hidden" class="input is-large" value="<?php echo ''.$row['users_id'].''; ?>">
    <br>
    <button type="submit" class="button is-block is-link is-large is-fullwidth">Registar Encomenda</button>
</form>

</body>
</html>