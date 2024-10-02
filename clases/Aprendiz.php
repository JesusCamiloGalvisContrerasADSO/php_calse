<?php
include_once("Persona.php");

class Aprendiz extends Persona{

  protected $cuenta;
  protected $promedio;
  protected $fechaNacimiento;

  public function __construct(PDO $connection)
  {
    echo("constructor de aprendiz <br>" );
    parent::__construct("id", "users", $connection);
  }

  public function getCuenta(){
    return $this->cuenta;
  }

  public function getPromedio(){
    return $this->promedio;
  }

  public function getFechaNacimiento() { // Getter para fecha de nacimiento
    return $this->fechaNacimiento;
  }

  public function setCuenta($cuenta){
    $this->cuenta = $cuenta;
  }

  public function setPromedio($promedio){
    $this->promedio = $promedio;
  }

  public function setFechaNacimiento($fechaNacimiento) { // Setter para fecha de nacimiento
      $this->fechaNacimiento = $fechaNacimiento;
  }


}