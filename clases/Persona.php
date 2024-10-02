<?php
class Persona extends Modelo
{
  protected $id; // Agregar la propiedad id
  protected $nombre;
  protected $apellido;
  protected $edad;
  protected $telefono;
  protected $correo;
  protected $documento;
  protected $direccion;

  public function __construct($id, $table, $connection)
  {
    $this->id = $id;
    parent::__construct($id, $table, $connection);
  }

  // Getter para id
  public function getId()
  {
    return $this->id;
  }

  // Setter para id
  public function setId($id)
  {
    $this->id = $id;
  }

  // Otros getters y setters
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
}
