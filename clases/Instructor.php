<?php
include_once("Persona.php");

class Instructor extends Persona {

  protected $sueldo;
  protected $horario;

  public function getSueldo(){
    return $this->sueldo;
  }

  public function getHorario(){
    return $this->horario;
  }


  public function setSueldo($sueldo){
    $this->sueldo = $sueldo;
  }

  public function setHorario($horario){
    $this->horario = $horario;
  }


}