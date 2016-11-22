<?php

/* Clase UserDAO.php
 * Clase que aplica el Patrón de Diseño DAO para manejar toda la información de un objeto Usuario.
 * author Eugenia Pérez
 * mailto eugenia_perez@cuatrovientos.org
 */
require_once(dirname(__FILE__) . '/../../persistence/conf/PersistentManager.php');

class UserDAO {

    //Se define una constante con el nombre de la tabla
    const USER_TABLE = 'user';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    /* Función de login de usuario */

    public function login($username, $password) {
        $query = "SELECT * FROM " . UserDAO::USER_TABLE .
                " WHERE username = '" . $username . "' AND password='" .
                $password . "'";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $userBD = mysqli_fetch_array($result);
              require_once(dirname(__FILE__) . '/../../app/models/User.php');
            $user = new User();
            $user->setIdUser($userBD['iduser']);
            $user->setUsername($userBD['username']);
            $user->setPassword($userBD['password']);

            return $user;
            
        } 
        return null;
    }

    /*
     * Inserta un usuario en la base de datos. Como la clave primaria es 
     * autogenerada, no es necesario insertarla.
     * Es importante que a los valores a insertar que pongas dentro del 
     * paréntesis VALUES, los encierres en comillas simples.
     */

    public function insert($username, $password) {
        $query = "INSERT INTO " . UserDAO::USER_TABLE .
                " (username, password) VALUES('" . $username . "', '" .
                $password . "')";
        mysqli_query($this->conn, $query);
    }

}

?>
