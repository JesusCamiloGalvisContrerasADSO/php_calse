<?php

echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");

$database = new Database();
$connection = $database->getConnection($database);
$aprendiz = new Aprendiz($connection);

// Obtenemos el ID del aprendiz desde la solicitud
$id = $_REQUEST['id'];
$usuario = $aprendiz->getById($id);

// Verificamos que se haya recuperado el usuario
if ($usuario) {
    // Usamos setters para establecer los valores en el objeto aprendiz
    $aprendiz->setId($usuario['id']);
    $aprendiz->setNombre($usuario['nombre']);
    $aprendiz->setApellido($usuario['apellido']);
    $aprendiz->setEdad($usuario['edad']); // Asumimos que hay un método para establecer la edad
    $aprendiz->setTelefono($usuario['telefono']);
    $aprendiz->setCorreo($usuario['correo']);
    $aprendiz->setDocumento($usuario['documento']);
    $aprendiz->setDireccion($usuario['direccion']);
} else {
    echo "Usuario no encontrado.";
    exit;
}
?>

<form action="actualizar.php" method="POST">
  <input type="hidden" name="id_person" value="<?= $aprendiz->getId() ?>" required>
  <div>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $aprendiz->getNombre() ?>" required>
  </div>
  <div>
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" value="<?= $aprendiz->getApellido() ?>" required>
  </div>
  <div>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" value="<?= $aprendiz->getEdad() ?>" required>
  </div>
  <div>
    <label for="correo">Correo:</label>
    <input type="email" name="correo" value="<?= $aprendiz->getCorreo() ?>" required>
  </div>
  <div>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" value="<?= $aprendiz->getTelefono() ?>" required>
  </div>
  <div>
    <label for="documento">Documento:</label>
    <input type="text" name="documento" value="<?= $aprendiz->getDocumento() ?>" readonly>
  </div>
  <div>
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" value="<?= $aprendiz->getDireccion() ?>" required>
  </div>
  <button type="submit">Actualizar</button>
</form>
