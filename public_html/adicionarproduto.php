
<?php
require_once("config.php");


if(isset($_POST['nome'])){
    if(!empty($_POST['nome'])||!empty($_POST['preco'])||!empty($_POST['imagens'])||!empty($_POST['desconto'])||!empty($_POST['Descricao'])||!empty($_POST['Categoria_ID_Categoria'])) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['Descricao'];
        $desconto = $_POST['desconto'];
        $Categoria_ID_Categoria = $_POST['Categoria_ID_Categoria'];
        print_r($_FILES);
        $imagens = $_FILES['imagens'];

        $imagensName = $_FILES['imagens']['name'];
        $imagensTmpName = $_FILES['imagens']['tmp_name'];
        $imagensSize = $_FILES['imagens']['size'];
        $imagensError = $_FILES['imagens']['error'];
        $imagensType = $_FILES['imagens']['type'];

        $imagensExt = explode('.', $imagensName);
        $imagensActualExt = strtolower(end($imagensExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        $sql = "INSERT INTO produto(nome, preco, Descricao, Categoria_ID_Categoria , desconto, imagens) VALUES ('$nome','$preco','$descricao','$Categoria_ID_Categoria','$desconto','".$imagens['name']."')";
        if (!mysqli_query($con, $sql)) {
            print_r(mysqli_error($con));

            $result = mysqli_query($con, "SELECT * FROM produto inner join Categoria on  produto.Categoria_ID_Categoria= Categoria.Categoria_ID_Categoria  ");

            if (in_array($imagensActualExt, $allowed)) {
                if ($imagensError === 0) {
                    if ($imagensSize < 1000000) {
                        $imagensNameNew = uniqid('', true) . "." . $imagensActualExt;
                        $imagensDestination = 'imagens/' . $imagensNameNew;
                        move_uploaded_file($imagensTmpName, $imagensDestination);
                        //header("Location:cadastro_produtos.php");
                    } else {
                        echo "Sua imagens e muito grande";
                    }
                } else {
                    echo " Houve um erro ao fazer o upload";
                }
            } else {
                echo "Não podes fazer upload deste tipo de imagens";
            }

        }
    }
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
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

</head>
<body>

<section class="hero is-success is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <br class="box">
                <p><a href="index.php" class="btn btn-black rounded-0">Pagina Inicial</a></p>
                <br>

                <h3 class="title has-text-grey">Coloque o seu produto a venda aqui</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="field">
                        <div class="control">
                            <input name="nome" type="text" class="input is-large" placeholder="nomeproduto" autofocus>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="preco" type="text" class="input is-large" placeholder="preco">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="Descricao" class="input is-large" type="text" placeholder="Descricao do Produto">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="desconto" type="text" class="input is-large"  placeholder="desconto">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input name="Categoria_ID_Categoria" type="text" class="input is-large" placeholder="id_categoria">
                        </div>
                    </div>

                    <div>
                        <input type="file" name="imagens">
                    </div>
                    <br>
                    <button type="submit" class="button is-block is-link is-large is-fullwidth">Registar Produto</button>
                </form>
            </div>
        </div>
    </div>

</section>
<footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style = "background-image: url(imagens/foot.jpeg);" >
    <!--Main Footer Area-->
    <div class="main-footer-area" >
        <div class="container" >
            <div class="row" >

                <!--Single Footer Widget-->
                <div class="col-12 col-sm-6 col-xl-3" >
                    <div class="footer-widget-area mb-100" >
                        <!--Widget Title-->
                        <div class="widget-title" >
                            <h6 > Sobre Nós </h6 >
                        </div >

                        <img src = "imagens/foot.jpeg" alt = "" >
                        <div class="footer-logo my-4" >
                            <img src = "img/core-img/logo.png" alt = "" >
                        </div >
                        <p > O melhor chocolate do país para o mundo .</p >
                    </div >
                </div >

                <!--Single Footer Widget-->
                <div class="col-12 col-sm-6 col-xl-3" >
                    <div class="footer-widget-area mb-100" >
                        <!--Widget Title-->
                        <div class="widget-title" >
                            <h6 > Horas</h6 >
                        </div >
                        <!--Office Hours-->
                        <div class="weekly-office-hours" >
                            <ul >
                                <li class="d-flex align-items-center justify-content-between" ><span > Segunda Feira - Sexta Feira </span > <span > 09 H - 19 H </span ></li >
                                <li class="d-flex align-items-center justify-content-between" ><span > Sabado</span > <span > 09 H - 14 H </span ></li >
                                <li class="d-flex align-items-center justify-content-between" ><span > Domingo</span > <span > Fechado</span ></li >
                            </ul >
                        </div >
                        <!--Address -->
                        <div class="address" >
                            <h6 ><img src = "img/icons/phone-call.png" alt = "" > +351 677 8993000 223 </h6 >
                            <h6 ><img src = "img/icons/envelope.png" alt = "" > santolacandy@gmail . com </h6 >
                            <h6 ><img src = "img/icons/location.png" alt = "" > Avenida Sá Carneiro 21 RC, 5300 - 220 </h6 >
                        </div >
                    </div >
                </div >

                <!--Single Footer Widget-->
                <div class="col-12 col-sm-6 col-xl-3" >
                    <div class="footer-widget-area mb-100" >
                        <!--Widget Title-->
                        <div class="widget-title" >
                            <h6 > link útil </h6 >
                        </div >
                        <!--Nav -->
                        <ul class="useful-links-nav d-flex align-items-center" >
                            <li ><a href = "index.php" > Pagina Inicial </a ></li >
                            <li ><a href = "novidades.html" > Novidades</a ></li >
                            <li ><a href = "categorias.html" > Promocões</a ></li >
                        </ul >
                    </div >
                </div >

                <!--Single Footer Widget-->

            </div >
        </div >
    </div >

    </div >
    </div >
    </div >

    <!--Copywrite Text-->
    <div class="copywrite-text d-flex align-items-center justify-content-center" >
        <p ><!--Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed . Template is licensed under CC BY 3.0 . -->
    </div >
</footer >

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