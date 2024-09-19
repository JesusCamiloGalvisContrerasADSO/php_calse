<?php
class Persona extends Modelo
{
  protected $nombre;
  protected $apellido;
  protected $edad;
  protected $telefono;
  protected $correo;
  protected $documento;
  protected $direccion;

  public function __construct($id, $table, $connection)
  {
    parent::__construct($id, $table, $connection);
  }

  public function getNombre(){
    return $this->nombre;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function getEdad(){
    return $this->edad;
  }
  public function getTelefono(){
    return $this->telefono;
  }
  public function getCorreo(){
    return $this->correo;
  }
  public function getDocumento(){
    return $this->documento;
  }
  public function getDireccion(){
    return $this->direccion;
  }


  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  public function setApellido($apellido){
    $this->apellido = $apellido;
  }

  public function setEdad($edad){
    $this->edad = $edad;
  }
  public function setTelefono($telefono){
    $this->telefono = $telefono;
  }
  public function setCorreo($correo){
    $this->correo = $correo;
  }
  public function setDocumento($documento){
    $this->documento = $documento;
  }
  public function setDireccion($direccion){
    $this->direccion = $direccion;
  }




  public function getFullName()
  {
    return "el nombre completo es: " . $this->nombre . " " . $this->apellido . " y su edad es " . $this->edad ;
  }
}