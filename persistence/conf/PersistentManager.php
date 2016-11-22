<?php

/* Clase PersistentManager.php
 * Toda la información de la configuración de la BD está almacenada aquí.
 * Dado que solo queremos una instancia de PersistentManager, utilizaremos
 * el patrón Singleton (constructor privado).
 * author Eugenia Pérez
 * mailto eugenia_perez@cuatrovientos.org
 */

class PersistentManager {

    // Instancia privada de conexión.
    private static $instance = null;
    //Conexión a BD
    private static $connection = null;
    //Parámetros de conexión a la BD.
    private $userBD = "root";
    private $psswdBD = "";
    private $nameBD = "jobeet";
    private $hostBD = "localhost";

    //Get de la conexión
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    //Constructor de la clase privado: solo queremos construir una instancia
    //Se encarga de establecer una conexion con nuestro GBBDD.
    private function __construct() {
        PersistentManager::$connection = mysqli_connect($this->hostBD, $this->userBD, $this->psswdBD, $this->nameBD)
                or die("Could not connect to db: " . mysqli_error());
        mysqli_query(PersistentManager::$connection, "SET NAMES 'utf8'");
    }

    //Cierra la conexión.
    public function close_connection() {
        mysqli_close();
    }

    //Retorna la instancia de la conexión
    function get_connection() {
        return PersistentManager::$connection;
    }

    //Getters y Setters de los parámetros de configuración de BD.
    function get_hostBD() {
        return $this->hostBd;
    }

    function get_usuarioBD() {
        return $this->userBD;
    }

    function get_psswdBD() {
        return $this->psswdBD;
    }

    function get_nombreBD() {
        return $this->nameBD;
    }

}

?>
