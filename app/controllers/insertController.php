<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/EmpleoDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Empleo.php');
require_once(dirname(__FILE__) . '/../../app/models/validations/ValidationsRules.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo a la función en cuanto se redirija el action a esta página
    createAction();
}

function createAction() {
    $error = false;
    $position = ValidationsRules::test_input($_POST["position"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $position)) {
        $error = true;
    }

    $company = ValidationsRules::test_input($_POST["company"]);
    $logo = ValidationsRules::test_input($_POST["logo"]);
    $description = ValidationsRules::test_input($_POST["description"]);
    $salary = ValidationsRules::test_input($_POST["salary"]);

    $empleo = new Empleo();
    $empleo->setPosition($position);
    $empleo->setCompany($company);
    $empleo->setLogo($logo);
    $empleo->setDescription($description);
    $empleo->setSalary($salary);

    //Creamos un objeto EmpleoDAO para hacer las llamadas a la BD
    $EmpleoDAO = new EmpleoDAO();
    $EmpleoDAO->insert($empleo);

    if($error) {
        header('Location: ../views/insert.php?error=1');
    } else {
        header('Location: ../../index.php');
    }
}
?>

