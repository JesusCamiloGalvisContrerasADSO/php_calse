<?php

echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");

$datebase = new Database();
$connection = $datebase->getConnection($datebase);
$aprendiz = new Aprendiz($connection);

$id = $_REQUEST['id'];
$usuario = $aprendiz->getById($id);

print_r($usuario);
?>

<form action="actualizar.php" method="POST">
  <input hidden type="text" name="id_person" value="<?= $id ?>" require>
  <div>
    <label for="firts_name">Nombre:</label>
    <input type="text" name="firts_name" value="<?= $usuario['firts_name'] ?>" require>
  </div>
  <div>
    <label for="last_name">Apellido:</label>
    <input type="text" name="last_name" value="<?= $usuario['last_name'] ?>" require>
  </div>
  <div>
    <label for="birthdate">Fecha nacimiento:</label>
    <input type="date" name="birthdate" value="<?= $usuario['birthdate'] ?>" require>
  </div>
  <div>
    <label for="email">Correo:</label>
    <input type="text" name="email" value="<?= $usuario['email'] ?>" require>
  </div>
  <div>
    <label for="phone">Telefono:</label>
    <input type="text" name="phone" value="<?= $usuario['phone'] ?>" require>
  </div>
  <div>
    <label for="dni">DNI:</label>
    <input type="text" name="dni" value="<?= $usuario['dni'] ?> " readonly>
  </div>
  <div>
    <label for="user_accounts">Ficha:</label>
    <input type="text" name="user_accounts" value="<?= $usuario['user_accounts'] ?>" require>
  </div>
  <div>
    <label for="average">Promedio:</label>
    <input type="text" name="average" value="<?= $usuario['average'] ?>" require>
  </div>
  <button type="submit">actualizar</button>
</form>