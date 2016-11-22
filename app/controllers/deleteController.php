<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/EmpleoDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Empleo.php');


//Creamos un objeto EmpleoDAO para hacer las llamadas a la BD
$empleoDAO = new EmpleoDAO();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
//Llamo que hace la edición contra BD
    searchAction();
}

function searchAction() {
    $id = $_GET["id"];

    //Creamos un objeto EmpleoDAO para hacer las llamadas a la BD
    $empleoDAO = new EmpleoDAO();
    $empleoDAO->delete($id);

    header('Location: ../../index.php');
}
?>

