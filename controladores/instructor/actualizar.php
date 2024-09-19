<?php  

echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Instructor.php");


$nombre = isset($_POST['firts_name']) 
? ($_POST['firts_name'] != "" ? $_POST['firts_name'] : false) 
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

$user_accounts = isset($_POST['salary']) 
? ($_POST['salary'] != "" ? $_POST['salary'] : false) 
: false;

$average = isset($_POST['adress']) 
? ($_POST['adress'] != "" ? $_POST['adress'] : false) 
: false;


if($nombre && $apellido && $email && $telefono && $dni && $user_accounts && $average){


  $datebase = new Database();
  $connection = $datebase->getConnection($datebase);
  $aprendiz = new Aprendiz($connection);

  $id     = $_POST["id_person"];
  $nombre     = $_POST["firts_name"];
  $apellido   = $_POST["last_name"];
  $fechaNacimiento   = $_POST["birthdate"];
  $email      = $_POST["email"];
  $telefono   = $_POST["phone"];
  $dni        = $_POST["dni"];
  $salario        = $_POST["salary"];
  $direccion        = $_POST["adress"];

  $valor = $aprendiz->update($id ,[
    'firts_name'  => $nombre,
    'last_name'   => $apellido,
    'birthdate'   => $fechaNacimiento,
    'email'       => $email,
    'phone'       => $telefono,
    'dni'         => $dni,
    'user_accounts' => $salario ,
    'average' => $direccion 
  ]);

  if($valor != null){
    return header('Location: '. "listar.php");
  }

  
}else{
  var_dump("error al cargar los datos");
}


