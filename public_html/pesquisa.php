<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "dbmultimedia";
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

$pesquisar = $_POST['pesquisa'];
$result_produt = "SELECT * FROM produto  WHERE nome   LIKE '%$pesquisar%' LIMIT 5";
$resultado_produto = mysqli_query($conn, $result_produt);

while($rows_produto = mysqli_fetch_array($resultado_produto)){
    echo "Nome do produto: ".$rows_produto['nome']."<br>";
     echo $rows_produto['imagens']."<br>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF - 8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE = edge">
    <meta name="viewport" content="width = device - width, initial - scale = 1, shrink - to - fit = no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Santola Candy</title>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

</head>

<body>
<div class="container">
    <div class="row">
        <?php foreach($products as $rows_produto) : ?>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <img src="imagens/<?php echo $rows_produto['imagens']?>" width="400px" height="400px" alt="">
                        <h4 class="card-title"><?php echo $rows_produto['nome']?></h4>
                        <h5 class="card-text"> <?php echo $rows_produto['Descricao']?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo number_format($rows_produto['preco'], 2, ',', '.')?>€
                        </h6>

                        <a class="btn btn-primary" href="carrinho.php?acao=add&id=<?php echo $rows_produto['ID_Produto']?>" class="card-link">Comprar</a>
                    </div>
                </div>
            </div>

        <?php endforeach;?>
    </div>
</div>


<jQuery(Necessary for All JavaScript Plugins) -->
<script src = "js/jquery/jquery-2.2.4.min.js" ></script >
<!--Popper js-->
<script src = "js/popper.min.js" ></script >
<!--Bootstrap js-->
<script src = "js/bootstrap.min.js" ></script >
<!--Plugins js-->
<script src = "js/plugins.js" ></script >
<script src = "js/classy-nav.min.js" ></script >
<script src = "js/jquery-ui.min.js" ></script >
<!--Active js-->
<script src = "js/active.js" ></script >
<script src = "js/CLOCK.js" type = "text/javascript" ></script >


</body>

</html>
