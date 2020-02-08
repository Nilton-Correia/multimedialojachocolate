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
        <th>Codigo_Postal</th>
        <th>Localidade</th>

        <td><a href="adicionarCodigo_postal.php"> Adicionar</a></td>
    </tr>
    </thead>
    <?php
    require ("../config.php");
    $postal="Select * from codigo_postal";
    if($resultado=$con->query($postal)){
        while ($row=$resultado->fetch_assoc()){
            echo'<tr> 
            <td>'.$row['Codigo_Postal'].'</td>
            <td>'.$row['Localidade'].'</td>
           
            </tr>';
        }
    }


    ?>
</table>

</body>
</html>
