<?php

/**
 * Description of empleo
 *
 * @author Miguel
 */
class Empleo {
    private $id;
    private $position;
    private $company;
    private $logo;
    private $description;
    private $salary;

    /**
     * Constructor by default
     */
    public function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getPosition() {
        return $this->position;
    }

    function getCompany() {
        return $this->company;
    }

    function getLogo() {
        return $this->logo;
    }

    function getDescription() {
        return $this->description;
    }

    function getSalary() {
        return $this->salary;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPosition($position) {
        $this->position = $position;
    }

    function setCompany($company) {
        $this->company = $company;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setSalary($salary) {
        $this->salary = $salary;
    }


//Función para pintar cada criatura
    function empleo2HTMLPrivate() {
        $result = '<div class="col-sm-4 col-lg-4 col-md-4"><div class="thumbnail">';
        $result .= '<a href="app/views/detail.php?id='.$this->getId().'"><h3>' . $this->getPosition() . '</h3></a>';
        $result .= '<h4>Salary: ' . $this->getSalary() . '</h4>';
        $result .= '<a href="app/controllers/deleteController.php?id='.$this->getId().'"><span class="glyphicon glyphicon-trash"></span></a> ';
        $result .= '<a href="app/views/edit.php?id='.$this->getId().'"><span class="glyphicon glyphicon-edit"></span></a> ';
        $result .= '<p class="description">'.$this->getDescription().'</p>';
        $result .= '<h4>Company: ' . $this->getCompany() . '</h4>';
        $result .= '<a href="assets/img/'.$this->getPosition().'"><img src="'.$this->getLogo().'" class="photo" width="100"/></a>';
        
        $result .= ' </div>';
        $result .= '</div>';
        
        return $result;
    }
    
    function empleo2HTMLPublic() {
        $result = '<div class="col-sm-4 col-lg-4 col-md-4"><div class="thumbnail">';
        $result .= '<a href="app/views/detail.php?id='.$this->getId().'"><h3>' . $this->getPosition() . '</h3></a>';
        $result .= '<h4>Salary: ' . $this->getSalary() . '</h4>';
        $result .= '<a data-toggle="modal" data-target=".modal-login"><span class="glyphicon glyphicon-cog"></span></a>';
        $result .= '<p class="description">'.$this->getDescription().'</p>';
        $result .= '<h4>Company: ' . $this->getCompany() . '</h4>';
        $result .= '<a href="assets/img/'.$this->getPosition().'"><img src="'.$this->getLogo().'" class="photo" width="100"/></a>';
        
        $result .= ' </div>';
        $result .= '</div>';
        
        return $result;

}
}