<?php

/* Clase RecetaDAO.php
 * Clase que aplica el Patrón de Diseño DAO para manejar toda la información de un objeto Receta.
 */
//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '/../conf/PersistentManager.php');

class EmpleoDAO {

    //Se define una constante con el nombre de la tabla
    const EMPLEO_TABLE = 'job';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    /**
     * Retorna todos los empleos
     */
    public function selectAll() {
        $query = "SELECT * FROM " . EmpleoDAO::EMPLEO_TABLE;
        $result = mysqli_query($this->conn, $query);
        $empleos = array();
        while ($empleoBD = mysqli_fetch_array($result)) {

            $empleo = new Empleo();
            $empleo->setId($empleoBD["idJob"]);
            $empleo->setPosition($empleoBD["position"]);
            $empleo->setCompany($empleoBD["company"]);
            $empleo->setLogo($empleoBD["logo"]);
            $empleo->setDescription($empleoBD["description"]);
            $empleo->setSalary($empleoBD["salary"]);

            array_push($empleos, $empleo);
        }
        return $empleos;
    }

    /*
     * Inserta un empleo en la base de datos. Como la clave primaria es 
     * autogenerada, no es necesario insertarla.
     */

    public function insert($empleo) {
        $query = "INSERT INTO " . EmpleoDAO::EMPLEO_TABLE .
                " (position, company, logo, description, salary) VALUES(?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $position = $empleo->getPosition();
        $company = $empleo->getCompany();
        $logo = $empleo->getLogo();
        $description = $empleo->getDescription();
        $salary = $empleo->getSalary();
        mysqli_stmt_bind_param($stmt, 'ssssd', $position, $company, $logo, $description, $salary);
        return $stmt->execute();
    }

    /**
     * Selecciona el empleo por ID
     * @param type $id
     * @return empleo
     */
    public function selectById($id) {
        $query = "SELECT position, company, logo, description, salary FROM " . EmpleoDAO::EMPLEO_TABLE . " WHERE idJob=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $position, $company, $logo, $description, $salary);

        $empleo = new Empleo();
        while (mysqli_stmt_fetch($stmt)) {
            $empleo->setId($id);
            $empleo->setPosition($position);
            $empleo->setCompany($company);
            $empleo->setLogo($logo);
            $empleo->setDescription($description);
            $empleo->setSalary($salary);
        }

        return $empleo;
    }

    /*
     * Actualiza un empleo en la base de datos. 
     * Es importante utilizar PreparedStatements para evitar ataques de SQL Injection.
     */

    public function update($empleo) {
        $query = "UPDATE " . EmpleoDAO::EMPLEO_TABLE .
                " SET position=?, company=?, logo=?, description=?, salary=?"
                . " WHERE idJob=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $position = $empleo->getPosition();
        $company = $empleo->getCompany();
        $logo = $empleo->getLogo();
        $description = $empleo->getDescription();
        $salary = $empleo->getSalary();
        $id = $empleo->getId();
        mysqli_stmt_bind_param($stmt, 'ssssdi', $position, $company, $logo, $description, $salary, $id);
        return $stmt->execute();
    }

    /**
     * Elimina un empleo de la BD pasándole el ID
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $query = "DELETE FROM " . EmpleoDAO::EMPLEO_TABLE . " WHERE idJob=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }

    public function searchByWords($word) {
        $query = "SELECT idJob, position, company, logo, description, salary FROM " . EmpleoDAO::EMPLEO_TABLE . " WHERE position LIKE '%{$word}%' OR company LIKE '%{$word}%' OR description LIKE '%{$word}%' OR salary LIKE '%{$word}%'";
        //
        $stmt = mysqli_prepare($this->conn, $query);
        
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $position, $company, $logo, $description, $salary);
        
        $empleos = array();
        while (mysqli_stmt_fetch($stmt)) {

            $empleo = new Empleo();
            $empleo->setId($id);
            $empleo->setPosition($position);
            $empleo->setCompany($company);
            $empleo->setLogo($logo);
            $empleo->setDescription($description);
            $empleo->setSalary($salary);
            
            array_push($empleos, $empleo);
        }
        
        return $empleos;
    }

}

?>
