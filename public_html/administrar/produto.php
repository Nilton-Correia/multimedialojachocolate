<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />
</head>
<body>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Preco</th>
        <th>Imagem</th>
        <td><a href="adicionarproduto.php"> Adicionar</a></td>
    </tr>
    </thead>
    <?php
    require ("../config.php");
    $utilizador="Select * from produto";
    if($resultado=$con->query($utilizador)){
        while ($row=$resultado->fetch_assoc()){
            echo'<tr> 
            <td>'.$row['nome'].'</td>
            <td>'.$row['preco'].'</td>
            <td>'.$row['imagens'].'</td>
            <td><a href="eliminar-produto.php?id='.$row['ID_Produto'].'"> Eliminar</a></td>
            <td><a href="editar_produto.php?id='.$row['ID_Produto'].'"> Editar</a></td>
            </tr>';
        }
    }


    ?>
</table>

</body>
</html>
