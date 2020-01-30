<?php
session_start();
// Include config file
require_once ("config.php");
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();

}
// Define variables and initialize with empty values
$username =  $password  = $nome = $email = $phone  = $codigo_postal  = $confirm_password = "";
$username_err = $password_err = $nome_err = $email_err = $phone_err  = $codigo_postal_err  = $confirm_password_err = "";



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor coloque um nome de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este nome de utilizador já está em uso.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate name
    if(empty(trim($_POST["nome"]))){
        $nome_err = "Por favor coloque um nome de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE   nome = ?";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_nome = trim($_POST["nome"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);


                    $nome = trim($_POST["nome"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor insira um nome.";

    } else {
        $sql = "SELECT id FROM users Where email = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            //set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This login is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "3";
            }
        }
        mysqli_stmt_close($stmt);
    }
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Por favor insira um nome.";

    } else {
        $sql = "SELECT id FROM users Where phone = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            //set parameters
            $param_phone = trim($_POST["phone"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $phone_err = "This login is already taken.";
                } else {
                    $phone = trim($_POST["phone"]);
                }
            } else {
                echo "4";
            }
        }
        mysqli_stmt_close($stmt);
    }

    //validar password

    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor insira uma senha.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não corresponde.";
        }
    }
//

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($email_err) && empty($phone_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, nome, email, phone) VALUES (?, ?, ?, ?,?)";

        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_username, $param_password, $param_nome, $param_email, $param_phone);

            // Set parameters

            $param_username = $username;
            $param_nome = $nome;
            $param_email = $email;
            $param_phone = $phone;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                //echo mysqli_errno($this->link);
                //echo "Algo deu errado. Por favor, tente novamente mais tarde.";
                printf("Error: %s.\n", mysqli_stmt_error($stmt));
                echo"6";
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
                            <div class="qty">
                                <?php echo count($_SESSION['cart'])?>
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

<div class="south-search-area" >
    <div class="container" >
        <div class="row" >
            <div class="col-12" >
                <div class="advanced-search-form" >
                    <!--Search Title-->

                    <!--Search Form-->
                    <form action = "#" method = "post" id = "advanceSearch" >
                        <div class="row" >
                            <div class="col-12 col-md-4 col-lg-3" >
                            </div >
                        </div >
                    </form >
                </div >
            </div >
        </div >
    </div >
</div >

<div class="wrapper">
    <h2>Inscrever-se</h2>
    <p>Por favor, preencha este formulário para criar uma conta.</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Utilizador</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
            <span class="help-block"><?php echo $nome_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
            <label>Telefone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
            <span class="help-block"><?php echo $phone_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirme a Senha</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>


        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Já tem uma conta? <a href="login.php">Entre aqui</a>.</p>
    </form>
</div>
</section >


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