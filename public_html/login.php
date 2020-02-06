<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_user"]=="admin") {
        header("location: administrar/indexadmin.php");
    }else{
        header("location: welcome.php");
    }
}

// Check if the user is
if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
}
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username  = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Digite o nome de utilizador.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT users.id, username, password, tipo FROM users  inner join tipo_user on users.id_tipo = tipo_user.id_tipo  WHERE username = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $tipo);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["tipo_user"] = $tipo;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            if($tipo=="admin") {

                                header("location: administrar/indexadmin.php");
                            }else{
                                header("location:welcome.php");
                            }

                        }


                        else{
                            // Display an error message if password is not valid
                            $password_err = "A senha que você digitou não era válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Nenhuma conta encontrada com esse nome de utilizador.";
                }
            } else{
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
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

<!-- Preloader -->
<div id="preloader">
    <div class="south-load"></div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="h-100 d-md-flex justify-content-between align-items-center">
            <div class="email-address">
                <a href="mailto:santolacandy@gmail.com">santolacandy@gmail.com</a>
            </div>
            <ul class="header-links fa-pull-left">
                <li><a href="#"> Moeda: Euro</a></li>
            </ul >
            <div class="phone-number d-flex" >
                <div class="icon" >
                    <img src = "img/icons/phone-call.png" alt = "" >
                </div >
                <div class="number" >
                    <a href = "tel:+351 966705783" > +351 966705783 </a >
                </div >
            </div >
        </div >
    </div >

    </div>
    <!--Main Header Area-->
    <div class="main-header-area" id = "stickyHeader" >
        <div class="classy-nav-container breakpoint-off" >
            <!--Classy Menu-->
            <nav class="classy-navbar justify-content-between" id = "southNav" >

                <!--Logo -->
                <a class="nav-brand" href = "index.php" > SANTOLA - CANDY</a >

                <!--Navbar Toggler-->
                <div class="classy-navbar-toggler" >
                    <span class="navbarToggler" ><span ></span ><span ></span ><span ></span ></span >
                </div >

                <!--Menu -->
                <div class="classy-menu" >

                    <!--close btn-->
                    <div class="classycloseIcon" >
                        <div class="cross-wrap" ><span class="top" ></span ><span class="bottom" ></span ></div >
                    </div >

                    <!--Nav Start-->
                    <div class="classynav" >
                        <ul >
                            <li ><a href = "index.php" > Pagina Inicial </a ></li >
                            <li ><a href = "novidades.php" > Novidades</a ></li >
                            <li><a  href="produto.php">   Produto  </a>  </li>
                            <li ><a href = "#" > Promocões</a ></li >
                            <li ><a href = "login.php"> Aderir/Iniciar Sessação</a ></li >
                            <!--<li><a href = "registar.html" > registar</a ></li > -->
                        </ul >
                        <!--Search Form-->
                        <div class="south-search-form" >
                            <form action = "#" method = "post" >
                                <input type = "search" name = "search" id = "search" placeholder = "Search Anything ..." >
                                <button type = "submit" ><i class="fa fa-search" aria-hidden = "true" ></i ></button >
                            </form >
                        </div >

                        <!--Search Button-->
                        <a href = "#" class="searchbtn" ><i class="fa" aria-hidden = "true" ></i ></a >
                    </div >
                    <!--Nav End-->
                </div >
                <!-- /Wishlist-->

                <!--Cart -->

                <div class="dropdown" >
                    <div class="card-img" >
                        <a href = "carrinho.php" >
                            <i class="fa fa-shopping-cart" ></i >
                            <span >Carrinho</span >
                            <div class="card-img-top">
                                <?php echo count($_SESSION['carrinho'])?>
                        </a>
                    </div>
                </div>
            </nav >
        </div >
    </div >
</header >


<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->
<section class="hero-area" >
    <div class="hero-slides" >
        <!--Single Hero Slide-->
        <div class="single-hero-slide bg-img" style = "background-image: url(imagens/32-Diogo-Vaz.jpg);" >
            <div class="container h-100" >
                <div class="row h-100 align-items-center" >
                    <div class="col-12" >

                    </div >
                </div >
            </div >
        </div >
        <!--Single Hero Slide-->
        <div class="single-hero-slide bg-img" style = "background-image: url(imagens/cac.jpg);" >
            <div class="container h-100" >
                <div class="row h-100 align-items-center" >
                    <div class="col-12" >

                    </div >
                </div >
            </div >
        </div >
        <!--Single Hero Slide-->
        <div class="single-hero-slide bg-img" style = "background-image: url(imagens/cafe-de-chocolate-2-1024x683.jpeg);" >
            <div class="container h-100" >
                <div class="row h-100 align-items-center" >
                    <div class="col-12" >

                    </div >
                </div >
            </div >
        </div >
    </div >
</section >


<div class="wrapper">
    <h2>Entrar</h2>
    <p>Preencha suas credenciais para fazer login.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Utilizador</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p>Não possui uma conta? <a href="register.php">Inscreva-se agora</a>.</p>
    </form>
</div>
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
