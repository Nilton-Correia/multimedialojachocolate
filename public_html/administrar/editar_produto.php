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
    $produto = $_GET['ID_Produto'];
    $editarr ="Select * FROM produto WHERE ID_Produto = $produto";

    if ($resultado=$con->query($editarr)) {
        $row=$resultado->fetch_assoc();
    } else {


        echo "Infelizmente não foi possivel Editar";
    }
}

if($_POST){
    $id=$_POST['ID_Produto'];
    $nome=$_POST['nome'];
    $editarr ="Update produto  set nome='$nome' WHERE ID_Produto = $id";

    if ($resultado=$con->query($editarr)) {
        header( "location: produto.php");
    } else {


        echo "Infelizmente não foi possivel Editar";
    }
}

?>

<form action="editar_produto.php" method="post" enctype="multipart/form-data">
    <div class="field">
        <div class="control">
            <input name="nome" type="text" class="input is-large" value="<?php echo ''.$row['nome'].''; ?>" autofocus>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="preco" type="text" class="input is-large" value="<?php echo ''.$row['preco'].''; ?>">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="Descricao" class="input is-large" type="text"value="<?php echo ''.$row['Descricao'].''; ?>">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="desconto"  class="input is-large" type="text"value="<?php echo ''.$row['desconto'].''; ?>" >
        </div>
    </div>
    <div class="field">
        <div class="control">
            <input name="Categoria_ID_Categoria"  class="input is-large" type="text"value="<?php echo ''.$row['Categoria_ID_Categoria'].''; ?>">
        </div>
    </div>

    <div class="field">
        <div class="control">
            <input name="imagens" type="text" class="input is-large" value="<?php echo ''.$row['imagens'].''; ?>">
        </div>
    </div>
    <input name="id" type="hidden" class="input is-large" value="<?php echo ''.$row['ID_Produto'].''; ?>">
    <br>
    <button type="submit" class="button is-block is-link is-large is-fullwidth">Registar Produto</button>
</form>

</body>
</html>