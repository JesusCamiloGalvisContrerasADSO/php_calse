<?php 


// conexion a la base de datos por medio de PDO, con esto podemos conectarlos a cualquier gestor de base de datos
// se retorna la conexciony se cierra la conexcion

class Database{

  private $connection;

  public function __construct()
  {
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
      PDO::ATTR_DEFAULT_STR_PARAM =>PDO::FETCH_ASSOC
    ];

    $this->connection = new PDO("mysql:host=127.0.0.1;dbname=jesus", "Jesus_2696521", "2696521", $options);

    $this->connection->exec("SET CHARACTER SET UTF8");
  }

  public function getConnection(){
    return $this->connection;
  }

  public function closeConnection(){
    $this->connection = null;
  }
}