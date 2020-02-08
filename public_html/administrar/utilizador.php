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
        <th>Email</th>
        <th>Telefone</th>
        <td><a href="eliminar-utilizador.php"> Adicionar</a></td>
    </tr>
    </thead>
    <?php
    require ("../config.php");
    $utilizador="Select * from users";
    if($resultado=$con->query($utilizador)){
        while ($row=$resultado->fetch_assoc()){
            echo'<tr> 
            <td>'.$row['nome'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone'].'</td>
            <td><a href="eliminar-utilizador.php?id='.$row['id'].'"> Eliminar</a></td>
            <td><a href="eliminar-utilizador.php?id='.$row['id'].'"> Editar</a></td>
            </tr>';
        }
    }


    ?>
</table>

</body>
</html>
