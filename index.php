<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/app/controllers/indexController.php');
require_once(dirname(__FILE__) . '/persistence/DAO/UserDAO.php');
$empleos = indexAction();
if (isset($_POST["searchJob"])) {
    $word = $_POST["searchJob"];
    //Creamos un objeto EmpleoDAO para hacer las llamadas a la BD
    $empleoDAO = new EmpleoDAO();
    $empleos = $empleoDAO->searchByWords($word);
}

if (isset($_POST["loginForm"])) {
    $_SESSION["username"] = $_POST["user"];
    $_SESSION["password"] = $_POST["pass"];
    
    $userDAO = new UserDAO();
    $user = $userDAO->login($_SESSION["username"], $_SESSION["password"]);
    if ($user != null) {
        header('Location: ../../index.php');
    } else {
        echo "<script type='text/javascript'>alert('Error');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Desarrollo web PHP</title>

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Model LOGIN CSS -->
        <link href="assets/css/clean-modal-login-form.css"  rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/less/namespaces.less" rel="stylesheet/less" type="text/css" >
        <link href="assets/less/reglas-anidadas.less" rel="stylesheet/less" type="text/css" >
        <link href="assets/less/funciones-operadores.less" rel="stylesheet/less" type="text/css" >
        <script type="text/javascript" src="assets/js/less.min.js"></script>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button  type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Busqueda de empleo en 4v</a>
                </div>              
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="app/views/insert.php" class="claro btn btn-block btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Sugierenos un empleo</a> </li>
                    </ul>
                    <!-- FORMULARIO DE BÚSQUEDA -->
                    <form class="navbar-form navbar-right" role="search" method="post" action="">
                        <div class="form-group">
                            <input type="text" name="searchJob" id="searchJob" class="form-control" placeholder="Buscar..." value="">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                    <!-- FIN FORMULARIO DE BÚSQUEDA -->
                </div>
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Jumbotron -->
                <div class="jumbotron">
                    <div class="row-fluid">
                        <div id="header" class="col-md-offset-4 col-md-4">
                            <h2>
                                Tu web para la busqueda de empleo!
                            </h2>
                            <!-- Login modal -->
                            <div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="loginmodal-container">
                                            <h1>Accede a tu cuenta</h1><br>
                                            <form id="loginForm" method="POST" >
                                                <input type="text" name="user" placeholder="Username">
                                                <input type="password" name="pass" placeholder="Password">

                                                <input type="submit"  name="login" class="login loginmodal-submit" value="Login">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6" id="minamespace">
                            <a href="app/views/insert.php" class="claro btn btn-block btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Sugierenos un empleo</a>        
                        </div>  
                    </div>
                </div>    
                

                <!-- Content Row 
                Genera la función job2HTMLPublic dentro de la clase Job-->

               <?php for ($i = 0; $i < sizeof($empleos); $i+=3) { ?>                 
                        <?php
                        for ($j = $i; $j < ($i + 3); $j++) {
                            if (isset($empleos[$j])) {
                                echo $empleos[$j]->empleo2HTMLPublic();
                            }
                        }
                        ?>
                    </div>
                    <!-- /.row -->
                <?php } ?>
                <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /.container -->
    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row pie">
                <div class="col-lg-12">
                    <p>Copyright &copy; Eugenia Pérez 2015 - eugeniaperez.es</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".navbar-nav > li:first").hide();

            $(".navbar-header button").click(function () {
                if ($('.navbar-nav > li:first').is(":visible")) {
                    $('.navbar-nav > li:first').hide();
                } else {
                    $('.navbar-nav > li:first').show();
                }
            });
            $("a#btnBorrar").click(function () {
                alert("Elemento eliminado de la base de datos");
            });
        });
        $(window).resize(function () {
            $(".navbar-nav > li:first").hide();
        });

    </script>

</body>

</html>
