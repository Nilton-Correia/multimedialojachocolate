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
        <th>ID_Encomenda</th>
        <th>data_encomenda</th>
        <th>Preco_Total</th>
        <th>Estado</th>
        <th>Tipo_pagamento_ID_Tipo_pagamento</th>
        <th>tipo_Envio_idtipo_envio</th>
        <th>users_id</th>
        <td><a href="adicionarencomenda.php"> Adicionar</a></td>
    </tr>
    </thead>
    <?php
    require ("../config.php");
    $encomenda="Select * from encomenda";
    if($resultado=$con->query($encomenda)){
        while ($row=$resultado->fetch_assoc()){
            echo'<tr> 
            <td>'.$row['ID_Encomenda'].'</td>
            <td>'.$row['data_encomenda'].'</td>
            <td>'.$row['Preco_Total'].'</td>
             <td>'.$row['Estado'].'</td>
        <td>'.$row['Tipo_pagamento_ID_Tipo_pagamento'].'</td>
        <td>'.$row['tipo_Envio_idtipo_envio'].'</td>
        <td>'.$row['users_id'].'</td>
            <td><a href="eliminar_encomenda.php?id='.$row['ID_Encomenda'].'"> Eliminar</a></td>
            <td><a href="editar_encomenda.php?id='.$row['ID_Encomenda'].'"> Editar</a></td>
            </tr>';
        }
    }


    ?>
</table>

</body>
</html>
