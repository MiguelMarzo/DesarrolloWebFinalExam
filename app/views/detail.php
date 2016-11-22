<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/EmpleoDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Empleo.php');


//Compruebo que me llega por GET el parámetro
if (isset($_GET["id"])) {
    $word = $_GET["id"];
    //Creamos un objeto EmpleoDAO para hacer las llamadas a la BD
    $empleoDAO = new EmpleoDAO();
    $empleo = $empleoDAO->selectById($word);
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
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Model LOGIN CSS -->
        <link href="../../assets/css/clean-modal-login-form.css"  rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../../assets/less/namespaces.less" rel="stylesheet/less" type="text/css" >
        <link href="../../assets/less/reglas-anidadas.less" rel="stylesheet/less" type="text/css" >
        <link href="../../assets/less/funciones-operadores.less" rel="stylesheet/less" type="text/css" >
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
                    <a class="navbar-brand" href="../../index.php">Busqueda de empleo en 4v</a>
                </div>              
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="../../app/views/insert.php" class="claro btn btn-block btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Sugierenos un empleo</a> </li>
                    </ul>
                    <!-- FORMULARIO DE BÚSQUEDA -->
                    <form class="navbar-form navbar-right" role="search" method="post" action="index.php">
                        <div class="form-group">
                            <input type="text" name="searchJob" class="form-control" placeholder="Buscar..." value="">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                    <!-- FIN FORMULARIO DE BÚSQUEDA -->
                </div>
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div class="container table-responsive">
            <table class="table table-sm table-borderless">
                <thead>
                    <tr> <th>Oferta de empleo</th> </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><h3><?php echo $empleo->getPosition(); ?></h3></th>
                        <td colspan="2"><h5><?php echo $empleo->getDescription(); ?></h5></td>
                        <td colspan="2"></td>
                    <tr>
                        <th scope="row"><img src="<?php echo $empleo->getLogo(); ?>" target="_blank" class="logo"/></th>
                        <td><h4>Salario: </h4> <?php echo $empleo->getSalary(); ?></td>
                        <td ><h4> Empresa </h4><?php echo $empleo->getCompany(); ?> </td>
                    </tr>
                    </td>
                    </tr>
                </tbody>
            </table>
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
    </body>

</html>
