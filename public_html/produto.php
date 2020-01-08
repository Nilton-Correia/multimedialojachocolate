<?php

session_start();
require("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Santola Candy</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
.button {
    background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {border-radius: 2px;}
.button2 {border-radius: 4px;}
.button3 {border-radius: 8px;}
.button4 {border-radius: 50%; background-color: black}
.button5 {border-radius: 50%;}
</style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->


        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.html">Santola Candy</a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="index.php">Pagina Inicial</a></li>
                                <li><a href="novidades.php">Novidades</a></li>
                                <li><a href="categorias.php">Promocões</a>
                                </li>
                                <li><a href="Criar_Anuncio.html">Criar Anuncio</a></li>
                                <li><a href="#">Top Vendas</a></li>
                                <li><a href="login.html">Login</a></li>
                                <!--<li><a href="registar.html">registar</a></li>-->
                            </ul>

                                    <div><br></div>
                            <!-- Search Form -->
                            <div class="south-search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Search Anything ...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Search Button -->
                            <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End #####
    <img src="img/bg-img/apple.jpg" alt=""/>
    <img src="img/bg-img/hero1.jpg" alt=""/>-->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(imagens/cafe-de-chocolate-2-1024x683.jpeg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <!-- <h3 class="breadcumb-title">IPhone XS Max</h3>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Advance Search Area Start ##### -->


    <!-- ##### Advance Search Area End ##### -->

    <!-- ##### About Content Wrapper Start ##### -->
    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Novidades</h2>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="samsungs7edge.html">
                                <img src="imagens/rafaelo.jpg" alt="">
                            </a>
                            <div class="tag">
                                <span>Venda</span>
                            </div>
                            <div class="list-price">
                                <p>15€</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>Caixa de Bombom Rafzaello</h5>
                            <p>Coco Ralado (25,5%), Gorduras Vegetais, Açúcar, Amêndoa Inteira (8%), Leite Desnatado em Pó, Soro de Leite em Pó, Farinha de Trigo, Amido de Tapioca, Baunilha, Sal, Emulsificante Lecitinas, Aromatizantes, Fermento Químico Bicarbonato de Sódio.</p>

                        </div>
                    </div>
                </div>

                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="200ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                           <a href="iphonexs.html">
                            <img src="imagens/favas-chocolate.jpg" alt="">
                                </a>
                            <div class="tag">
                                <span>Venda</span>
                            </div>
                            <div class="list-price">
                                <p>17.77€</p>
                            </div>
                        </div>

                        <!-- Property Content -->
                        <div class="property-content" href="iphonexs.html">
                            <h5>Favas de cacau torrado - 130g</h5>
                            <p>Para saborear uma fava de cacau torrada, segure-a entre o polegar e o indicador. Empurre-a suavemente contra uma superfície dura. Ouvira um pequeno click e a casca começa a separar-se da semente. Uma vez tirada a casca, na parte mais redonda do grão, vesse um pontinho redondo. Este e a radicula, mais dura e ligeiramente amarga. Deite a casca fora, assim como a raiz amarga. Agora pode saboreá-lo e descobrir a toda a sua doçura.</p>
                        </div>
                    </div>
                </div>

                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="300ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="xiaomia2.html">
                                <img src="imagens/bara-corallo.jpg" alt="">
                            </a>
                            <div class="tag">
                                <span>Troca</span>
                            </div>
                            <div class="list-price">
                                <p>179.50€</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>Chocolate 70% com casca de laranja cristalizada - 160g</h5>
                            <p>Chocolate com pequenos pedaços da melhor casca de laranja cristalizada. Os dois sabores distintos complementam-se antes de se misturarem num só.</p>


                        </div>
                    </div>
                </div>

                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="samsungs10.html">
                                <img src="img/bg-img/s10plus.png" alt="">
                            </a>
                            <div class="tag">
                                <span>Venda</span>
                            </div>
                            <div class="list-price">
                                <p>1 029.99€</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>Samsung S10+</h5>
                            <p class="location"><img src="img/icons/location.png" alt="">Dual SIM 128 GB Branco</p>
                            <p>Tipo Telemóvel  Smartphone Dual SIM</p>
                            <p>Dimensão do Ecrã  6,4 ''</p>
                            <p>Memória Interna  128 GB</p>
                        </div>
                    </div>
                </div>

                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="oneplus6t.html">
                                <img src="img/bg-img/oneplus6t.jpg" alt="">
                            </a>
                            <div class="tag">
                                <span>Venda | Troca</span>
                            </div>
                            <div class="list-price">
                                <p>579€</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>OnePlus 6T</h5>
                            <p class="location"><img src="img/icons/location.png" alt="">Dual SIM 128 GB Midnight Black</p>
                            <p>Tipo Telemóvel  Smartphone Dual SIM</p>
                            <p>Dimensão do Ecrã  6,41 ''</p>
                            <p>Memória Interna  128 GB</p>
                        </div>
                    </div>
                </div>

                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="600ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="samsunga6.html">
                                <img src="img/bg-img/galaxya6.jpg" alt="">
                            </a>
                            <div class="tag">
                                <span>Troca</span>
                            </div>
                            <div class="list-price">
                                <p>234€</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>Galaxy A6+</h5>
                            <p class="location"><img src="img/icons/location.png" alt="">Dual SIM A605f Cinzento Orquídea</p>
                            <p>Tipo Telemóvel  Smartphone Dual SIM</p>
                            <p>Dimensão do Ecrã  6 ''</p>
                            <p>Memória Interna  32 GB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div align="center" >
            <button class="button button5"> < </button>
            <button class="button button4"> 1 </button>
            <button class="button button5"> 2 </button>
            <button class="button button5"> 3 </button>
            <button class="button button5"> > </button>
        </div>



    </section>
    <!-- ##### About Content Wrapper End ##### -->

    <!-- ##### Call To Action Area Start ##### -->

 <footer>
        <!-- Copywrite Text -->
        <div class="copywrite-text d-flex align-items-center justify-content-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
< Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
< Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <script src="js/classy-nav.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>