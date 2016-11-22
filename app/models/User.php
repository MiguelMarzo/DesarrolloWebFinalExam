<?php

/**
 * Description of user
 *
 * @author Miguel
 */
class User {

    private $id;
    private $username;
    private $password;

    /**
     * Constructor by default
     */
    public function __construct() {
        
    }

    function getIdUser() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setIdUser($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}
