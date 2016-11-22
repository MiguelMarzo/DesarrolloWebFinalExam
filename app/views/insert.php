<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Desarrollo web - PHP</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../../assets/less/reglas-anidadas.less" rel="stylesheet/less" type="text/css" >
        <link href="../../assets/less/namespaces.less" rel="stylesheet/less" type="text/css" >
        <script type="text/javascript" src="../../assets/js/less.min.js"></script>

        <!-- Custom CSS -->
        <link href="../../assets/css/shop-homepage.css" rel="stylesheet">

    </head>
    <body>
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

                    <!-- FORMULARIO DE BÚSQUEDA -->
                    <form class="navbar-form navbar-right" role="search" method="post" action="index.php">
                        <div class="form-group">
                            <input type="text" name="trip" class="form-control" placeholder="Buscar..." value="">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                    <!-- FIN FORMULARIO DE BÚSQUEDA -->


                </div>

            </div>
            <!-- /.container -->
        </nav>
        <div id="header" class="col-md-offset-2 col-md-10">
            <h2>
                Proponer un empleo
            </h2>

        </div>

        <!-- FORMULARIO DE INSERCIÓN -->
        <div class="container">
            <form class="form-horizontal" method="post" action="../controllers/insertController.php">
                <div class="form-group">
                    <label for="position" class="col-sm-2 control-label">Posición</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="position" id="position" placeholder="Posición">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company" class="col-sm-2 control-label">Compañia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="company" id="company" placeholder="Compañia">
                    </div>
                </div>
                <div class="form-group">
                    <label for="logo" class="col-sm-2 control-label">URL logo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="logo" name="logo" placeholder="Imagen">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Descripción</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Descripción"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="salary" class="col-sm-2 control-label">Salario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="salary" name="salary" placeholder="Salario">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <!-- IMP! Debes de corregir el tipo de boton para que se visualize el mensaje de agradecimiento, TIPO BUTTON-->
                        <button  type="button" class="btn  btn-main btn-success">Crear</button>
                        <img id="thanksMsg" src="http://www.clipartkid.com/images/533/comments-0-category-uncategorized-7M9WxH-clipart.png" width="300"/>
                    </div>
                </div>
            </form>
            <!-- FIN DEL FORMULARIO  -->

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
        <script src="../../assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $("button").click(function (event) {
                event.preventDefault();
                $("#thanksMsg").fadeIn("slow", function () {
                    $(this).show().delay(5000).fadeOut("slow");
                });
                $("#thanksMsg").fadeOut(function () {
                    event.preventDefault();
                    $('form').submit();//  $(location).attr('href','http://localhost:8000/index.php');
                });
            });

            $(document).ready(function () {
                $("#thanksMsg").hide();
            });

        </script>



    </body>

</html>
