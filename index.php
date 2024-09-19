
<?php 

echo __DIR__;
require_once(__DIR__."/libs/Database.php");
require_once(__DIR__."/libs/Modelo.php");
include_once("clases/Aprendiz.php");


$datebase = new Database();
$connection = $datebase->getConnection($datebase);
$aprendiz = new Aprendiz($connection);




// var_dump($nombre, $apellido, $email, $telefono, $dni);

if (!isset($_POST["first_name"]) && !isset($_POST["last_name"]) && !isset($_POST["email"])&& !isset($_POST["phone"])&& !isset($_POST["dni"])) {
  
  $nombre     = $_POST["first_name"];
  $apellido   = $_POST["last_name"];
  $email      = $_POST["email"];
  $telefono   = $_POST["phone"];
  $dni        = $_POST["dni"];


  $aprendiz->store([
    'firts_name'  => $_POST["first_name"],
    'last_name'   => $_POST["last_name"],
    'email'       => $_POST["email"],
    'phone'       => $_POST["phone"],
    'dni'         => $_POST["dni"],
    'user_accounts' => isset($_POST['user_accounts']) ? $_POST['user_accounts'] : '',
    'average' => isset($_POST["average"]) ? $_POST["average"] : ""
  ]);
}else{
  echo("no llenaron todos los campos");
}


// $aprendiz->update(2, [
//   'firts_name' => "pepito",
//   'adress' => "Sena Giron",
//   'user_accounts' => 2696521
// ]);


// $aprendiz->delete(2);

// $results = $aprendiz->getAll();
// $resultsId = $aprendiz->getById(1);

// var_dump($results);
// var_dump($resultsId);
