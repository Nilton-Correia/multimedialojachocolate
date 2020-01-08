<?php

session_start();
require("config.php");

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

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->

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
                                <li><a  href="#">   Produto  </a>  </li>
                                <li ><a href = "#" > Promocões</a ></li >
                                <li ><a href = "login.html" > Login</a ></li >
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
                        <a href = "carinho.html" >
                            <i class="fa fa-shopping-cart" ></i >
                            <span > Carrinho</span >

                        </a >
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
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Advance Search Area Start ##### -->
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



    <!-- ##### Advance Search Area End ##### -->



    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50" >
        <div class="container" >
            <div class="row" >
                <div class="col-12" >
                    <div class="section-heading wow fadeInUp" >
                        <h2 > Novidades</h2 >
                        <p ></p >
                    </div >
                </div >
            </div >

            <div class="row" >

                <!--Single Featured Property-->
                <?php
                $sql = "SELECT * FROM produto";
                $result = $con->query($sql);
                $result->num_rows;
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {


                ?>
                <div class="col-12 col-md-6 col-xl-4" >
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay = "100ms" >
                        <!--Property Thumbnail-->
                        <div class="property-thumb" >
                            <a href = "#" >
                                <img src = "imagens/<?php echo ''.$row['imagens'].'';?>" alt = "" >
                            </a >
                            <div class="list-price" >
                            </div >
                        </div >
                        <!--Property Content-->
                        <div class="property-content" >
                            <h5 > <?php echo ''.$row['nome'].'';?> </h5 >

                        </div >
                    </div >
                </div >
<?php
                }
                }

?>

                <!--Single Featured Property-->

                <!--Single Featured Property-->


                <!--Single Featured Property-->

            </div >
        </div >
    </section >

     <section class="featured-properties-area section-padding-100-50" >
        <div class="container" >
            <div class="row" >
                <div class="col-12" >
                    <div class="section-heading wow fadeInUp" >
                        <h2 > Top Vendas </h2 >
                        <p ></p >
                    </div >
                </div >
            </div >

            <div class="row" >

                <!--Single Featured Property-->
                <div class="col-12 col-md-6 col-xl-4" >
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay = "100ms" >
                        <!--Property Thumbnail-->
                        <div width = "10" class="property-thumb" >
                            <a href = "#" >
                                <img src = "imagens/claudio.png" alt = "" >
                            </a >
                        </div >
                        <!--Property Content-->
                        <div class="property-content" >
                            <a href = "#" >
                                <h5 align = "center" > Claudio Corallo </h5 >
                            </a >
                        </div >
                    </div >
                </div >

                <!--Single Featured Property-->



                <!--Single Featured Property-->

                                </div >
                            </div >
                        </div >

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
