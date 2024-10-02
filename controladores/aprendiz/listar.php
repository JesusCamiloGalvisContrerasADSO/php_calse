<?php 
echo __DIR__;
require_once(__DIR__."/../../libs/Database.php");
require_once(__DIR__."/../../libs/Modelo.php");
include_once("../../clases/Aprendiz.php");

$database = new Database();
$connection = $database->getConnection($database);
$aprendiz = new Aprendiz($connection);

$lista = $aprendiz->getAll();
?>

<Table border="1">
  <thead>
    <th>Id</th>
    <th>nombre</th>
    <th>apellidos</th>
    <th>Fecha nacimiento</th>
    <th>correo</th>
    <th>telefono</th>
    <th>dni</th>
    <th>cuenta</th>
    <th>promedio</th>
    <th>Acciones</th>
  </thead>
  <tbody>
    <?php
    for ($i=0; $i < count($lista); $i++) {
      // Crear instancia de Aprendiz usando los datos
      $aprendiz = new Aprendiz($connection);
      $aprendiz->setId($lista[$i]['id']);
      $aprendiz->setNombre($lista[$i]['firts_name']);
      $aprendiz->setApellido($lista[$i]['last_name']);
      $aprendiz->setTelefono($lista[$i]['phone']);
      $aprendiz->setCorreo($lista[$i]['email']);
      $aprendiz->setDocumento($lista[$i]['dni']);
      $aprendiz->setCuenta($lista[$i]['user_accounts']);
      $aprendiz->setPromedio($lista[$i]['average']);

      ?>
      <tr>
        <td><?php echo $aprendiz->getId(); ?></td>
        <td><?php echo $aprendiz->getNombre(); ?></td>
        <td><?php echo $aprendiz->getApellido(); ?></td>
        <td><?php echo $lista[$i]['birthdate']; ?></td> <!-- Asegúrate de que birthdate tenga un getter si es parte del objeto -->
        <td><?php echo $aprendiz->getCorreo(); ?></td>
        <td><?php echo $aprendiz->getTelefono(); ?></td>
        <td><?php echo $aprendiz->getDocumento(); ?></td>
        <td><?php echo $aprendiz->getCuenta(); ?></td>
        <td><?php echo $aprendiz->getPromedio(); ?></td>
        <td>
          <div>
            <a href="editar.php?id=<?= $aprendiz->getId() ?>">Editar</a>
            <form action="eliminar.php" method="post">
              <input type="hidden" name="id" value="<?= $aprendiz->getId() ?>">
              <button type="submit">Eliminar</button>
            </form>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</Table>
