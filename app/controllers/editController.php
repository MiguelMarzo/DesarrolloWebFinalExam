<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/EmpleoDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Empleo.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo que hace la edición contra BD
    editAction();
}

function editAction() {
    $id = $_POST["id"];
    $position = $_POST["position"];
    $company = $_POST["company"];
    $logo = $_POST["logo"];
    $description = $_POST["description"];
    $salary = $_POST["salary"];

    $empleo = new Empleo();
    $empleo->setId($id);
    $empleo->setPosition($position);
    $empleo->setCompany($company);
    $empleo->setLogo($logo);
    $empleo->setDescription($description);
    $empleo->setSalary($salary);

    //Creamos un objeto EmpleoDAO para hacer las llamadas a la BD
    $empleoDAO = new EmpleoDAO();
    $empleoDAO->update($empleo);

    header('Location: ../../index.php');
}

?>

