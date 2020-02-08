
<?php
session_start();
require("../config.php");


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
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Santola-Candy</title>
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="indexadmin.php">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                             <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li>
                        <!-- User Profile-->
                        <div class="user-profile d-flex no-block dropdown m-t-20">
                            <div class="user-pic"><img src="assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                            <div class="user-content hide-menu m-l-10">
                                <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5 class="m-b-0 user-name font-medium">Steave Jobs <i class="fa fa-angle-down"></i></h5>
                                    <span class="op-5 user-email">varun@gmail.com</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                </div>
                            </div>
                        </div>

                        <!-- End User Profile-->
                    </li>
                    <li class="p-15 m-t-10"><a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Create New</span> </a></li>
                    <!-- User Profile-->
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="indexadmin.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.php" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="table-basic." aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Table</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adicionarproduto.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Adicionar Produto</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="removerproduto.php." aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Remover Produto</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="editar-utilizador.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">Editar Utilizador</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="eliminar-utilizador.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu">eliminar Utilizador</span></a></li>




                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div class="container has-text-centered">
                        <br class="box">
                        <p><a href="index.php" class="btn btn-black rounded-0">Pagina Inicial</a></p>
                        <br>
                        <form action="adicionarproduto.php" method="post" enctype="multipart/form-data">
                            <div class="field">
                                <div class="control">
                                    <input name="nome" type="text" class="input is-large" placeholder="Nome Produto" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="preco" type="text" class="input is-large" placeholder="Preço">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="Descricao" class="input is-large" type="text" placeholder="Descrição do Produto">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="desconto" type="text" class="input is-large"  placeholder="Desconto">
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
            <script src="assets/libs/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="dist/js/app-style-switcher.js"></script>
            <!--Wave Effects -->
            <script src="dist/js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="dist/js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="dist/js/custom.js"></script>
            <!--This page JavaScript -->
            <!--chartis chart-->
            <script src="assets/libs/chartist/dist/chartist.min.js"></script>
            <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
            <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
