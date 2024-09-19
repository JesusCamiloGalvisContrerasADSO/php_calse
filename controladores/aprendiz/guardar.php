<?php
echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");



$nombre = isset($_POST['first_name']) 
? ($_POST['first_name'] != "" ? $_POST['first_name'] : false) 
: false;

$apellido = isset($_POST['last_name']) 
? ($_POST['last_name'] != "" ? $_POST['last_name'] : false) 
: false;

$email = isset($_POST['email']) 
? ($_POST['email'] != "" ? $_POST['email'] : false) 
: false;

$telefono = isset($_POST['phone']) 
? ($_POST['phone'] != "" ? $_POST['phone'] : false) 
: false;

$dni = isset($_POST['dni']) 
? ($_POST['dni'] != "" ? $_POST['dni'] : false) 
: false;

if($nombre && $apellido && $email && $telefono && $dni){


  $datebase = new Database();
  $connection = $datebase->getConnection($datebase);
  $aprendiz = new Aprendiz($connection);

  $nombre     = $_POST["first_name"];
  $apellido   = $_POST["last_name"];
  $email      = $_POST["email"];
  $telefono   = $_POST["phone"];
  $dni        = $_POST["dni"];

  $valor = $aprendiz->store([
    // 'firts_name'  => $_POST["first_name"],
    // 'last_name'   => $_POST["last_name"],
    // 'email'       => $_POST["email"],
    // 'phone'       => $_POST["phone"],
    // 'dni'         => $_POST["dni"],
    'user_accounts' => isset($_POST['user_accounts']) ? $_POST['user_accounts'] : '',
    'average' => isset($_POST["average"]) ? $_POST["average"] : ''
    
  ]);


  if($valor != null){
    return header('Location: '. "listar.php");
  }

  
}else{
  var_dump("error al cargar los datos");
}


