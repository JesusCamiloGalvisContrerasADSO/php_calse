<?php
include_once("Persona.php");

class Aprendiz extends Persona{

  protected $cuenta;
  protected $promedio;

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


  public function setCuenta($cuenta){
    $this->cuenta = $cuenta;
  }

  public function setPromedio($promedio){
    $this->promedio = $promedio;
  }


}